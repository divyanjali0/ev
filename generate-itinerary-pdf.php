<?php
require_once __DIR__ . '/assets/includes/db_connect.php';
require_once __DIR__ . '/vendor/autoload.php'; 

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
        if ($this->page > 1) {
            $this->SetY(-15); 
            $this->SetFont('helvetica', '', 8);
            $this->Cell(0, 5,
                'No. 371/5, Negombo Road, Seeduwa, Sri Lanka | Tel: +94 761 414 552 | www.explorevacations.lk',
                0, 0, 'C'
            );
        }
    }

    public function Header() {
        if ($this->page > 1) {
            $this->SetDrawColor(32, 72, 154); 
            $this->Rect(5, 5, 200, 287); 

            $this->SetDrawColor(76, 135, 100); 
            $this->Rect(7, 7, 196, 283); 

            $this->Image(__DIR__ . '/assets/images/pdf-logo.png', 175, 10, 25);
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

// Full page background image
if (!empty($cover['image'])) {
    $imgPath = __DIR__ . '/uploads/cover_images/' . $cover['image'];
    if (file_exists($imgPath)) {
        $pdf->Image($imgPath, 0, 0, 210, 297);
    }
}

// Dark overlay for readability
$pdf->SetAlpha(0.5); // 50% opacity
$pdf->SetFillColor(0, 0, 0); // Black color
$pdf->Rect(0, 0, 210, 297, 'F'); // F = fill
$pdf->SetAlpha(1); // Reset alpha to 100%

// Logo top-right
$pdf->Image(__DIR__ . '/assets/images/pdf-logo.png', 170, 15, 30);

// Trip title (different font)
$pdf->SetTextColor(255); // White text
$pdf->SetFont('times', 'B', 28); // Bold Times New Roman
$pdf->SetXY(20, 60); // Position below logo
$pdf->Cell(0, 12, $cover['trip_name'] ?? '', 0, 1);

// Heading
$pdf->SetFont('helvetica', 'B', 14);
$pdf->SetX(20);
$pdf->Cell(0, 10, $cover['heading'] ?? '', 0, 1);

// Subheading
$pdf->SetFont('helvetica', 'I', 12);
$pdf->SetX(20);
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
$pdf->Cell(0, 14, 'Destinations', 0, 1);

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
$pdf->Cell(0, 14, 'Hotels', 0, 1);

$html = '<table border="1" cellpadding="6" width="100%" style="border-collapse: collapse;">';

$costItems = [
    'Title'          => $cost['title'] ?? '',
    'Pax'            => $cost['pax'] ?? '',
    'Vehicle'        => $cost['vehicle'] ?? '',
    'Meal Plan'      => $cost['meal_plan'] ?? '',
    'Hotel Category' => $cost['hotel_category'] ?? '',
    'Room Type'      => $cost['room_type'] ?? '',
    'Currency'       => $cost['currency'] ?? '',
    'Total'          => $cost['total'] ?? ''
];

foreach ($costItems as $label => $value) {
    $html .= '<tr>
        <th width="40%" style="text-align:left; font-weight:bold;">'.$label.'</th>
        <td width="60%" style="text-align:left; font-weight:normal;">'.$value.'</td>
    </tr>';
}

$html .= '</table>';

// Render table
$pdf->SetX($marginLeft);
$pdf->writeHTML($html, true, false, true, false, '');

/* =========================
   TOUR COST (Two-column Table)
========================= */
$pdf->AddPage();
$pdf->SetX($marginLeft);
$pdf->SetFont('helvetica', 'B', 11);
$pdf->Cell(0, 14, 'Tour Cost', 0, 1);

// Table HTML: label → value
$html = '<table border="1" cellpadding="6" width="100%" style="border-collapse: collapse;">';

$costItems = [
    'Title'          => $cost['title'] ?? '',
    'Pax'            => $cost['pax'] ?? '',
    'Vehicle'        => $cost['vehicle'] ?? '',
    'Meal Plan'      => $cost['meal_plan'] ?? '',
    'Hotel Category' => $cost['hotel_category'] ?? '',
    'Room Type'      => $cost['room_type'] ?? '',
    'Currency'       => $cost['currency'] ?? '',
    'Total'          => $cost['total'] ?? ''
];

foreach ($costItems as $label => $value) {
    $html .= '<tr>
        <th width="40%" style="text-align:left;">'.$label.'</th>
        <td width="60%">'.$value.'</td>
    </tr>';
}

$html .= '</table>';

// Render table
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
