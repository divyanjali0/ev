<?php
require_once __DIR__ . '/assets/includes/db_connect.php';
require_once __DIR__ . '/vendor/autoload.php';

if (!isset($_GET['id'])) exit('Missing ID');
$id = $_GET['id'];

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

$mpdf = new \Mpdf\Mpdf([
    'margin_left' => 5,
    'margin_right' => 5,
    'margin_top' => 5,
    'margin_bottom' => 5
]);

function loadPage($file, $vars = []) {
    extract($vars);
    ob_start();
    include $file;
    return ob_get_clean();
}

// Footer
$mpdf->SetHTMLFooter('
<div style="text-align:center; font-size:10px;">
No. 371/5, Negombo Road, Seeduwa, Sri Lanka | Tel: +94 761 414 552 | Email: info@explorevacations.lk | Web: www.explorevacations.lk
</div>
');

// Main HTML wrapper
$html = '
<html>
<head>
<style>
@page { margin: 10mm; }

.full-page-border {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    border: 1.5px solid #000;
    box-sizing: border-box;
    z-index: -1;
}

.page-content { padding: 8mm 8mm 20mm 8mm; }

.page-logo { text-align: center; margin-bottom: 10px; }
.page-logo img { height: 30px; }

.cover-title { text-align: center; font-size: 28px; font-weight: bold; margin-top: 18px; }
.cover-heading { text-align: center; font-size: 18px; font-weight: bold; margin-top: 3px; }
.cover-subheading { text-align: center; font-size: 14px; font-style: italic; margin-top: 8px; }
.cover-image { text-align: center; margin-top: 30px; }
.cover-image img { width: 70%; height: auto; }
.cover-description { margin-top: 14px; font-size: 14px; text-align: justify; line-height: 22px; }

.section-title { font-size: 20px; font-weight: bold; margin-top: 10px; margin-bottom: 8px; color: #09498eff; }

table { border-collapse: collapse; width: 100%; font-size: 16px; margin-bottom: 8px; }
table, th, td { border: 1px solid black; padding: 3px; text-align: left; line-height: 1.4; }
</style>
</head>
<body>

<!-- Common logo for all pages -->
<div class="page-logo">
    <img src="'. __DIR__ . '/assets/images/pdf-logo.png" />
</div>
';

$html .= loadPage(__DIR__ . '/pdf-pages/cover.php', compact('cover'));
// $html .= loadPage(__DIR__ . '/pdf-pages/destinations.php', compact('days'));
// $html .= loadPage(__DIR__ . '/pdf-pages/hotels.php', compact('hotels'));
// $html .= loadPage(__DIR__ . '/pdf-pages/cost.php', compact('cost'));
// $html .= loadPage(__DIR__ . '/pdf-pages/terms.php', compact('terms'));

$html .= '</body></html>';

$mpdf->WriteHTML($html);

// Save PDF
$dir = __DIR__ . '/uploads/pdfs/';
if (!file_exists($dir)) mkdir($dir, 0777, true);

$fileName = 'itinerary_' . $id . '_v' . $data['version_number'] . '.pdf';
$filePath = $dir . $fileName;

$mpdf->Output($filePath, 'F');

// Update DB
$update = $conn->prepare("UPDATE itinerary_customer_history SET pdf_path = :pdf WHERE history_id = :vid");
$update->execute([
    'pdf' => 'uploads/pdfs/' . $fileName,
    'vid' => $data['history_id']
]);

header("Location: revised-itenary.php?pdf=created");
exit;
