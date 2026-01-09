<?php
require_once __DIR__ . '/assets/includes/db_connect.php';
require_once __DIR__ . '/assets/libs/tcpdf/tcpdf.php';

if (!isset($_GET['id'])) {
    exit('Missing itinerary ID');
}

$id = $_GET['id'];

// ================= FETCH LATEST ITINERARY =================
$stmt = $conn->prepare("
    SELECT * FROM itinerary_customer_history
    WHERE itinerary_id = :id
    ORDER BY version_number DESC
    LIMIT 1
");
$stmt->execute(['id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    exit('No itinerary found');
}

$cover = json_decode($data['cover_page'], true);

// ================= COVER IMAGE =================
$imagePath = !empty($cover['image'])
    ? __DIR__ . '/uploads/cover_images/' . $cover['image']
    : __DIR__ . '/assets/images/default-cover.jpg';

if (!file_exists($imagePath)) {
    exit('Cover image not found');
}

// ================= CREATE PDF =================
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

// ================= FULL SCREEN IMAGE =================
$pdf->Image(
    $imagePath,
    0,
    0,
    210,
    297,
    '',
    '',
    '',
    false,
    300
);

// ================= LOGO (TOP RIGHT) =================
$logoPath = __DIR__ . '/assets/images/logo.png';
if (file_exists($logoPath)) {
    $pdf->Image($logoPath, 165, 15, 30);
}

// --- Explore ---
$pdf->SetFont('times', 'I', 28);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(20, 35);
$pdf->Cell(0, 12, $cover['trip_name'] ?? 'Explore', 0, 1, 'L');

// --- MAIN TITLE ---
$pdf->SetFont('times', 'B', 56);
$pdf->SetXY(20, 50);
$pdf->Cell(
    0,
    22,
    strtoupper($cover['heading'] ?? 'OSAKA'),
    0,
    1,
    'L'
);

// --- SUB TITLE ---
$pdf->SetFont('times', 'I', 26);
$pdf->SetXY(20, 80);
$pdf->Cell(
    0,
    12,
    $cover['sub_heading'] ?? 'In 4 Days',
    0,
    1,
    'L'
);

// ================= SAVE PDF =================
$pdfDir = __DIR__ . '/uploads/pdfs/';
if (!file_exists($pdfDir)) {
    mkdir($pdfDir, 0777, true);
}

$fileName = 'itinerary_' . $id . '_v' . $data['version_number'] . '.pdf';
$filePath = $pdfDir . $fileName;

$pdf->Output($filePath, 'F');

// ================= UPDATE DATABASE =================
$update = $conn->prepare("
    UPDATE itinerary_customer_history
    SET pdf_path = :path
    WHERE history_id = :hid
");
$update->execute([
    'path' => 'uploads/pdfs/' . $fileName,
    'hid'  => $data['history_id']
]);

// ================= REDIRECT =================
header("Location: revised-itenary.php?pdf=created");
exit;
