<?php
require_once __DIR__ . '/assets/includes/db_connect.php';
require_once __DIR__ . '/assets/libs/tcpdf/tcpdf.php';

if (!isset($_GET['id'])) exit('Missing ID');

$id = $_GET['id'];

// Fetch latest version
$stmt = $conn->prepare("
    SELECT * FROM itinerary_customer_history 
    WHERE itinerary_id = :id 
    ORDER BY version_number DESC 
    LIMIT 1
");
$stmt->execute(['id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) exit("No data found");

// Decode JSON
$days   = json_decode($data['day_city_details'], true);
$hotels = json_decode($data['hotels'], true);
$cost   = json_decode($data['tour_cost'], true);
$terms  = json_decode($data['terms_conditions'], true);
$cover  = json_decode($data['cover_page'], true);

// Create PDF
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Company');
$pdf->SetTitle($cover['trip_name'] ?? 'Itinerary');
$pdf->SetMargins(15, 15, 15);
$pdf->AddPage();

// Cover Page
$pdf->SetFont('helvetica', 'B', 20);
$pdf->Cell(0, 10, $cover['trip_name'], 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('helvetica', '', 12);
$pdf->MultiCell(0, 8, strip_tags($cover['description']), 0, 'C');

// New Page
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Day Wise Plan', 0, 1);

// Days
foreach ($days as $day) {
    $pdf->Ln(5);
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 8, 'Day ' . $day['day'], 0, 1);

    $pdf->SetFont('helvetica', '', 11);
    $pdf->writeHTML($day['description'], true, false, true, false, '');
}

// Hotels
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Hotels', 0, 1);

foreach ($hotels as $day => $hotel) {
    $pdf->SetFont('helvetica', '', 11);
    $pdf->MultiCell(0, 8, "Day $day: {$hotel['name']} - {$hotel['link']}", 0);
}

// Includes / Excludes
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(0, 10, 'Cost Includes', 0, 1);
$pdf->writeHTML($terms['includes']);

$pdf->Ln(5);
$pdf->Cell(0, 10, 'Cost Excludes', 0, 1);
$pdf->writeHTML($terms['excludes']);

// Folder to save
$dir = __DIR__ . '/uploads/pdfs/';
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

// File name
$fileName = 'itinerary_' . $id . '_v' . $data['version_number'] . '.pdf';
$filePath = $dir . $fileName;

// Save PDF
$pdf->Output($filePath, 'F');

// Save path in DB
$update = $conn->prepare("
    UPDATE itinerary_customer_history 
    SET pdf_path = :pdf 
    WHERE history_id = :vid
");

$update->execute([
    'pdf' => 'uploads/pdfs/' . $fileName,
    'vid' => $data['history_id']
]);

// Redirect
header("Location: itenary-request.php?pdf=created");
exit;
