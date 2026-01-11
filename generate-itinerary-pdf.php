<?php
require_once __DIR__ . '/assets/includes/db_connect.php';
require_once __DIR__ . '/vendor/autoload.php'; // TCPDF

if (!isset($_GET['id'])) exit('Missing ID');
$id = $_GET['id'];

/* Fetch latest version */
$stmt = $conn->prepare("
    SELECT * FROM itinerary_customer_history 
    WHERE itinerary_id = :id 
    ORDER BY version_number DESC 
    LIMIT 1
");
$stmt->execute(['id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$data) exit("No data found");

/* Decode JSON */
$days   = json_decode($data['day_city_details'], true);
$hotels = json_decode($data['hotels'], true);
$cost   = json_decode($data['tour_cost'], true);
$terms  = json_decode($data['terms_conditions'], true);
$cover  = json_decode($data['cover_page'], true);

/* =========================================
   INIT TCPDF
========================================= */

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator('Explore Vacations');
$pdf->SetAuthor('Explore Vacations');
$pdf->SetTitle('Itinerary');

/* Disable default header */
$pdf->setPrintHeader(false);

/* Footer */
$pdf->setPrintFooter(true);
$pdf->setFooterFont(['helvetica', '', 8]);
$pdf->setFooterMargin(10);

/* =========================================
   COVER PAGE – FULL BLEED
========================================= */

/* ZERO margins */
$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(false, 0);
$pdf->AddPage();

/* Full-page background image */
if (!empty($cover['image'])) {
    $imgPath = __DIR__ . '/uploads/cover_images/' . $cover['image'];
    if (file_exists($imgPath)) {
        $pdf->Image(
            $imgPath,
            0,
            0,
            210,
            297,
            '',
            '',
            '',
            false,
            300,
            '',
            false,
            false,
            0
        );
    }
}

/* LOGO */
$pdf->Image(
    __DIR__ . '/assets/images/pdf-logo.png',
    160,
    15,
    35
);

/* TEXT */
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('helvetica', 'B', 20);
$pdf->SetXY(20, 30);
$pdf->Cell(0, 10, $cover['trip_name'] ?? '', 0, 1);

$pdf->SetFont('helvetica', 'B', 14);
$pdf->SetX(20);
$pdf->Cell(0, 8, $cover['heading'] ?? '', 0, 1);

$pdf->SetFont('helvetica', 'I', 11);
$pdf->SetX(20);
$pdf->Cell(0, 8, $cover['sub_heading'] ?? '', 0, 1);

/* DESCRIPTION */
$pdf->SetFont('helvetica', '', 11);
$pdf->SetXY(20, 240);
$pdf->MultiCell(170, 0, $cover['description'] ?? '', 0);

/* =========================================
   RESTORE NORMAL PAGES
========================================= */

$pdf->SetMargins(10, 15, 10);
$pdf->SetAutoPageBreak(true, 15);
$pdf->SetTextColor(0, 0, 0);

/* =========================================
   DESTINATIONS
========================================= */

$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Destinations', 0, 1);

$pdf->SetFont('helvetica', '', 11);

foreach ($days as $day) {
    $pdf->Ln(2);
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 8, 'Day '.$day['day'].': '.$day['city_name'], 0, 1);

    $pdf->SetFont('helvetica', '', 11);
    $pdf->MultiCell(0, 6, $day['description'], 0);

    if (!empty($day['images'])) {
        foreach ($day['images'] as $img) {
            $imgPath = __DIR__ . '/uploads/city_images/' . $img;
            if (file_exists($imgPath)) {
                $pdf->Ln(2);
                $pdf->Image($imgPath, '', '', 120);
                $pdf->Ln(5);
            }
        }
    }
}

/* =========================================
   HOTELS
========================================= */

$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Hotels', 0, 1);

$pdf->SetFont('helvetica', '', 11);

foreach ($hotels as $day => $hotel) {
    $pdf->Cell(0, 7, "Day $day: {$hotel['name']} - {$hotel['link']}", 0, 1);
}

/* =========================================
   TOUR COST
========================================= */

$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Tour Cost', 0, 1);

$pdf->SetFont('helvetica', '', 11);

$html = '
<table border="1" cellpadding="6">
<tr>
<th>Title</th><th>Pax</th><th>Vehicle</th><th>Meal</th>
<th>Hotel</th><th>Room</th><th>Currency</th><th>Total</th>
</tr>
<tr>
<td>'.$cost['title'].'</td>
<td>'.$cost['pax'].'</td>
<td>'.$cost['vehicle'].'</td>
<td>'.$cost['meal_plan'].'</td>
<td>'.$cost['hotel_category'].'</td>
<td>'.$cost['room_type'].'</td>
<td>'.$cost['currency'].'</td>
<td>'.$cost['total'].'</td>
</tr>
</table>';

$pdf->writeHTML($html);

/* =========================================
   TERMS & CONDITIONS
========================================= */

$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Cost Includes', 0, 1);
$pdf->SetFont('helvetica', '', 11);
$pdf->writeHTML($terms['includes'] ?? '');

$pdf->Ln(5);
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Cost Excludes', 0, 1);
$pdf->SetFont('helvetica', '', 11);
$pdf->writeHTML($terms['excludes'] ?? '');

$pdf->Ln(5);
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Additional Info', 0, 1);
$pdf->SetFont('helvetica', '', 11);
$pdf->writeHTML(
    ($terms['ps'] ?? '') .
    ($terms['dress_code'] ?? '') .
    ($terms['notice'] ?? '')
);

/* =========================================
   SAVE PDF
========================================= */

$dir = __DIR__ . '/uploads/pdfs/';
if (!file_exists($dir)) mkdir($dir, 0777, true);

$fileName = 'itinerary_'.$id.'_v'.$data['version_number'].'.pdf';
$filePath = $dir.$fileName;

$pdf->Output($filePath, 'F');

/* Update DB */
$update = $conn->prepare("
    UPDATE itinerary_customer_history 
    SET pdf_path = :pdf 
    WHERE history_id = :vid
");
$update->execute([
    'pdf' => 'uploads/pdfs/'.$fileName,
    'vid' => $data['history_id']
]);

header("Location: revised-itenary.php?pdf=created");
exit;
