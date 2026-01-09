<?php
require_once __DIR__ . '/assets/includes/db_connect.php';
require_once __DIR__ . '/assets/libs/tcpdf/tcpdf.php';

// Include modular PDF page functions
require_once __DIR__ . '/pdf-pages/cover.php';
require_once __DIR__ . '/pdf-pages/summary.php';

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

// ================= FETCH CITY NAMES =================
function getCityNames($conn) {
    $sql = "SELECT id, name FROM cities";
    $stmt = $conn->query($sql);
    $cities = [];
    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cities[(string)$row['id']] = $row['name']; // cast to string
        }
    }
    return $cities;
}
$cityNames = getCityNames($conn);

// ================= DECODE JSON =================
$cover = json_decode($data['cover_page'], true);
$summaryDays = json_decode($data['day_city_details'], true); 

// ================= CREATE PDF =================
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(false);

// ================= GENERATE COVER PAGE =================
try {
    generateCoverPage($pdf, $cover);
} catch (Exception $e) {
    exit('Error generating cover page: ' . $e->getMessage());
}

// ================= GENERATE SUMMARY PAGE =================
if ($summaryDays && is_array($summaryDays)) {
    $overlayText = "Your Trip Adventure";
    addSummaryPage($pdf, $summaryDays, $overlayText, $cityNames);
}

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
