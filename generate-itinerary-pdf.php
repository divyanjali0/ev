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

/* =========================
   EXTEND TCPDF
========================= */
class PDF extends TCPDF {

    public function Footer() {
        $this->SetY(-10);
        $this->SetFont('helvetica', '', 8);
        $this->Cell(0, 5,
            'No. 371/5, Negombo Road, Seeduwa, Sri Lanka | Tel: +94 761 414 552 | www.explorevacations.lk',
            0, 0, 'C'
        );
    }

    public function Header() {
        if ($this->page > 1) {
            // Logo top-right
            $this->Image(__DIR__ . '/assets/images/pdf-logo.png', 175, 10, 25);
            // Thin page border
            $this->Rect(7, 7, 196, 283);
        }
    }
}

/* =========================
   INIT PDF
========================= */
$pdf = new PDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator('Explore Vacations');
$pdf->SetAuthor('Explore Vacations');
$pdf->SetTitle('Itinerary');
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);

/* =========================
   COVER PAGE
========================= */
$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(false, 0);
$pdf->AddPage();

// Full page image
if (!empty($cover['image'])) {
    $imgPath = __DIR__ . '/uploads/cover_images/' . $cover['image'];
    if (file_exists($imgPath)) {
        $pdf->Image($imgPath, 0, 0, 210, 297);
    }
}

// Light dark overlay for readability
$pdf->SetAlpha(0.35);
$pdf->Rect(0, 0, 210, 297, 'F');
$pdf->SetAlpha(1);

// Logo top-right
$pdf->Image(__DIR__ . '/assets/images/pdf-logo.png', 110, 20, 35);

// Text
$pdf->SetTextColor(255);
$pdf->SetFont('helvetica', 'B', 24);
$pdf->SetXY(20, 40);
$pdf->Cell(0, 12, $cover['trip_name'] ?? '', 0, 1); // 1 = move to next line

// Heading with left margin
$pdf->SetFont('helvetica', 'B', 11);
$pdf->SetX(30); // 30mm from left
$pdf->Cell(0, 10, $cover['heading'] ?? '', 0, 1);

// Subheading with same left margin
$pdf->SetFont('helvetica', 'I', 12);
$pdf->SetX(30); // same left margin
$pdf->Cell(0, 10, $cover['sub_heading'] ?? '', 0, 1);

/* =========================
   NORMAL PAGES
========================= */
$marginLeft = 15;
$marginRight = 15;
$marginTop = 25;
$marginBottom = 20;

$pdf->SetMargins($marginLeft, $marginTop, $marginRight);
$pdf->SetAutoPageBreak(true, $marginBottom);
$pdf->SetTextColor(0);

/* =========================
   DESTINATIONS
========================= */
$pdf->AddPage();
$pdf->SetX($marginLeft);
$pdf->SetFont('helvetica', 'B', 11);
$pdf->Cell(0, 12, 'Destinations', 0, 1);

foreach ($days as $day) {
    $pdf->SetX($marginLeft);
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 8, 'Day '.$day['day'].' – '.$day['city_name'], 0, 1);

    $pdf->SetX($marginLeft);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->MultiCell(0, 6, strip_tags($day['description']));
    $pdf->Ln(3);

    if (!empty($day['images'])) {
        foreach ($day['images'] as $img) {
            $imgPath = __DIR__ . '/uploads/city_images/' . $img;
            if (file_exists($imgPath)) {
                $pdf->SetX($marginLeft);
                $pdf->Image($imgPath, '', '', 120);
                $pdf->Ln(5);
            }
        }
    }
}

/* =========================
   HOTELS TABLE
========================= */
$pdf->AddPage();
$pdf->SetX($marginLeft);
$pdf->SetFont('helvetica', 'B', 11);
$pdf->Cell(0, 11, 'Hotels', 0, 1);

$html = '<table border="1" cellpadding="6" width="100%">
<tr style="font-weight:bold;">
<th width="15%">Day</th>
<th width="45%">Hotel Name</th>
<th width="40%">Website</th>
</tr>';

foreach ($hotels as $day => $hotel) {
    $html .= '<tr>
        <td>Day '.$day.'</td>
        <td>'.$hotel['name'].'</td>
        <td>'.$hotel['link'].'</td>
    </tr>';
}
$html .= '</table>';
$pdf->SetX($marginLeft);
$pdf->writeHTML($html, true, false, true, false, '');

/* =========================
   TOUR COST
========================= */
$pdf->AddPage();
$pdf->SetX($marginLeft);
$pdf->SetFont('helvetica', 'B', 11);
$pdf->Cell(0, 11, 'Tour Cost', 0, 1);

$html = '<table border="1" cellpadding="6" width="100%">
<tr style="font-weight:bold;">
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
$pdf->SetX($marginLeft);
$pdf->writeHTML($html, true, false, true, false, '');

/* =========================
   TERMS & CONDITIONS
========================= */
$pdf->AddPage();
$sections = [
    'Cost Includes' => $terms['includes'] ?? '',
    'Cost Excludes' => $terms['excludes'] ?? '',
    'Additional Info' => ($terms['ps'] ?? '') . ($terms['dress_code'] ?? '') . ($terms['notice'] ?? '')
];

foreach ($sections as $title => $content) {
    $pdf->SetX($marginLeft);
    $pdf->SetFont('helvetica', 'B', 11);
    $pdf->Cell(0, 10, $title, 0, 1);

    $pdf->SetX($marginLeft);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->MultiCell(0, 6, strip_tags($content));
    $pdf->Ln(5);
}

/* =========================
   SAVE PDF
========================= */
$dir = __DIR__ . '/uploads/pdfs/';
if (!file_exists($dir)) mkdir($dir, 0777, true);

$fileName = 'itinerary_'.$id.'_v'.$data['version_number'].'.pdf';
$pdf->Output($dir.$fileName, 'F');

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
