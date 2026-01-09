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


// fetch city names once (pass $dbConn as your PDO/MySQLi connection)
function getCityNames($conn) {
    $sql = "SELECT id, name FROM cities";
    $stmt = $conn->query($sql);
    $cities = [];
    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cities[$row['id']] = $row['name'];
        }
    }
    return $cities;
}



// Decode JSON data
$cover = json_decode($data['cover_page'], true);
$summaryDays = json_decode($data['day_city_details'], true); // Make sure your DB has a 'days' JSON column

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
$cityNames = getCityNames($conn);
addSummaryPage($pdf, $days, $overlayText, $cityNames);}

// ================= ADD OTHER ITINERARY PAGES HERE =================
// You can add more pages here, e.g., day-by-day itinerary, maps, etc.
// Example:
// foreach ($itineraryPages as $page) {
//     addItineraryPage($pdf, $page);
// }

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
