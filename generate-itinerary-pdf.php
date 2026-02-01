<?php
require_once __DIR__ . '/assets/includes/db_connect.php';
require_once __DIR__ . '/vendor/autoload.php';

if (!isset($_GET['id'])) exit('Missing ID');
$id = $_GET['id'];

/* ================= FETCH DATA ================= */
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

/* ================= TCPDF EXTEND (COMMON LAYOUT) ================= */
class PDF extends TCPDF {

    protected $outerWidth = 0.8; // ~3px
    protected $innerWidth = 0.4; // ~1.5px

    public function Header() {

        // Outer border
        $this->SetLineWidth($this->outerWidth);
        $this->SetDrawColor(32,72,154);
        $this->Rect(6, 6, 198, 285);

        // Inner border
        $this->SetLineWidth($this->innerWidth);
        $this->SetDrawColor(76,135,100);
        $this->Rect(9, 9, 192, 279);

        // Logo
        $this->Image(__DIR__.'/assets/images/logo.png', 168, 14, 26);
    }

    public function Footer() {
        $this->SetY(-14);
        $this->SetFont('helvetica','',8);
        $this->Cell(
            0, 6,
            'No. 371/5, Negombo Road, Seeduwa, Sri Lanka | Tel: +94 761 414 552 | www.explorevacations.lk',
            0, 0, 'C'
        );
    }
}

/* ================= INIT PDF ================= */
$pdf = new PDF('P','mm','A4',true,'UTF-8',false);
$pdf->SetCreator('Explore Vacations');
$pdf->SetAuthor('Explore Vacations');
$pdf->SetTitle('Itinerary');
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);

/* ================= COMMON HELPERS ================= */

function setupInnerPage($pdf) {
    $pdf->SetMargins(20, 35, 20);
    $pdf->SetAutoPageBreak(true, 25);
    $pdf->SetTextColor(0);
}

function sectionTitle($pdf, $title) {
    $pdf->Ln(2);
    $pdf->SetFont('helvetica','B',13);
    $pdf->SetTextColor(32,72,154);
    $pdf->Cell(0, 9, $title, 0, 1);
    $pdf->Ln(2);
    $pdf->SetTextColor(0);
}

/* ================= PAGE RENDERERS ================= */

function renderCoverPage($pdf, $cover, $nights = 0, $referenceNo = '', $fullName = '') {

    // Disable header & footer completely for cover
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->AddPage('P', 'A4');

    $pageWidth  = $pdf->getPageWidth();
    $pageHeight = $pdf->getPageHeight();
    $marginX    = 15;
    $days       = $nights + 1;

    /* Top color lines */
    $pdf->SetLineWidth(2);
    $pdf->SetDrawColor(0,153,218);
    $pdf->Line(0, 3, $pageWidth, 3);

    $pdf->SetDrawColor(130,200,70);
    $pdf->Line(0, 6, $pageWidth, 6);

    /* Logo */
    $logoWidth = 40;
    $pdf->Image(__DIR__ . '/assets/images/logo.png', ($pageWidth - $logoWidth) / 2, 12, $logoWidth);

    $pdf->Ln(30);

    /* Trip Title - ALL CAPS */
    $pdf->SetFont('dejavuserif', 'BI', 34);
    $pdf->SetTextColor(0,153,218);
    $pdf->SetX($marginX);
    $tripName = strtoupper($cover['trip_name'] ?? 'SRI LANKA');
    $pdf->Cell(0, 14, $tripName, 0, 1, 'L');

    /* Subtitle / Heading */
    $pdf->SetFont('dejavusans', 'I', 15);
    $pdf->SetTextColor(60,60,60);
    $pdf->SetX($marginX);
    $subtitle = $cover['heading'] ?? "Tailor Made Tour for {$nights} Nights & {$days} Days";
    $subtitle = ucwords(strtolower(strip_tags($subtitle)));
    $pdf->Cell(0, 9, $subtitle, 0, 1, 'L');

    /* Reference line */
    $pdf->SetFont('dejavusans', '', 10);
    $pdf->SetTextColor(80,80,80);
    $pdf->SetX($marginX);
    $pdf->Cell(0, 7, "Tour Ref No: {$referenceNo} | Tailor Made to: {$fullName} for {$nights} Nights / {$days} Days", 0, 1, 'L');

    /* Subheading */
    $pdf->Ln(5);
    $pdf->SetFont('dejavusans', 'I', 12);
    $pdf->SetTextColor(80,80,80);
    $pdf->SetX($marginX);
    $subHeading = ucwords(strtolower(strip_tags($cover['sub_heading'] ?? '')));
    $pdf->MultiCell($pageWidth - 2*$marginX, 7, $subHeading, 0, 'J');

    /* Description */
    $pdf->Ln(3);
    $pdf->SetFont('dejavusans', 'I', 11);
    $pdf->SetTextColor(150,150,150);
    $pdf->SetX($marginX);
    $description = ucwords(strtolower(strip_tags($cover['description'] ?? '')));
    $pdf->MultiCell($pageWidth - 2*$marginX, 8, $description, 0, 'J');

    $pdf->Ln(10);

    /* DID YOU KNOW Box */
    $boxY = $pdf->GetY();
    $pdf->SetFillColor(245,245,245);
    $pdf->RoundedRect($marginX, $boxY, $pageWidth - 30, 45, 3, '1111', 'F');

    $pdf->SetFont('dejavusans', 'B', 11);
    $pdf->SetTextColor(0,150,90);
    $pdf->SetXY($marginX + 4, $boxY + 5);
    $pdf->Cell(0, 6, 'DID YOU KNOW?', 0, 1, 'L');

    $pdf->SetFont('dejavusans', '', 10);
    $pdf->SetTextColor(60,60,60);
    $pdf->SetXY($marginX + 4, $pdf->GetY());

    $didYouKnowText = "Sri Lanka is a land of contrasts – from golden beaches to misty mountains, lush rainforests to ancient temples. It is home to 8 UNESCO World Heritage Sites and over 400 species of birds. Visitors can enjoy authentic cuisine, vibrant festivals, and warm hospitality.";
    $pdf->MultiCell($pageWidth - 38, 5.5, $didYouKnowText, 0, 'J');

    /* --- Place Bottom Image at page bottom --- */
    if (!empty($cover['image'])) {

        $img = __DIR__ . '/uploads/cover_images/' . $cover['image'];

        if (file_exists($img)) {

            // Disable auto page break temporarily
            $autoPageBreak = $pdf->getAutoPageBreak();
            $bMargin       = $pdf->getBreakMargin();
            $pdf->SetAutoPageBreak(false, 0);

            $pageWidth  = $pdf->getPageWidth();
            $pageHeight = $pdf->getPageHeight();

            $maxHeight = 95; // max image height you allow
            $imgHeight = $maxHeight;

            // Y position so image sits flush at bottom
            $y = $pageHeight - $imgHeight;

            // Draw image
            $pdf->Image(
                $img,
                0,          // X (full width)
                $y,          // Y (bottom aligned)
                $pageWidth,  // Width
                $imgHeight   // Height
            );

            // Restore auto page break
            $pdf->SetAutoPageBreak($autoPageBreak, $bMargin);
        }
    }

    // Restore headers & footers for next pages
    $pdf->setPrintHeader(true);
    $pdf->setPrintFooter(false);
}

function renderDestinationsPage($pdf, $days) {

    $pdf->AddPage();
    setupInnerPage($pdf);
    sectionTitle($pdf, 'Destinations');

    foreach ($days as $day) {

        $pdf->SetFont('helvetica','B',12);
        $pdf->Cell(0, 8, 'Day '.$day['day'], 0, 1);

        $pdf->SetFont('helvetica','',11);
        $pdf->MultiCell(0, 6, strip_tags($day['description']));
        $pdf->Ln(3);

        if (!empty($day['images'])) {
            foreach ($day['images'] as $img) {
                $path = __DIR__.'/uploads/city_images/'.$img;
                if (file_exists($path)) {
                    $pdf->Image($path, '', '', 110);
                    $pdf->Ln(5);
                }
            }
        }
    }
}

function renderHotelsPage($pdf, $hotels) {

    $pdf->AddPage();
    setupInnerPage($pdf);
    sectionTitle($pdf, 'Hotels');

    $html = '<table border="1" cellpadding="6" width="100%">
        <tr style="background-color:#20489A;color:#fff;">
            <th width="15%">Day</th>
            <th width="45%">Hotel</th>
            <th width="40%">Website</th>
        </tr>';

    foreach ($hotels as $day => $hotel) {
        $html .= '<tr>
            <td>Day '.$day.'</td>
            <td>'.htmlspecialchars($hotel['name'] ?? '').'</td>
            <td>'.(!empty($hotel['link']) ? '<a href="'.$hotel['link'].'">'.$hotel['link'].'</a>' : '').'</td>
        </tr>';
    }

    $html .= '</table>';
    $pdf->writeHTML($html);
}

function renderCostPage($pdf, $cost) {

    $pdf->AddPage();
    setupInnerPage($pdf);
    sectionTitle($pdf, 'Tour Cost');

    $html = '<table border="1" cellpadding="6" width="100%">';
    foreach ($cost as $k => $v) {
        $html .= '<tr>
            <th width="40%" style="background-color:#20489A;color:#fff;">'
            .ucwords(str_replace('_',' ',$k)).
            '</th>
            <td width="60%">'.$v.'</td>
        </tr>';
    }
    $html .= '</table>';

    $pdf->writeHTML($html);
}

function renderTermsPage($pdf, $terms) {

    $pdf->AddPage();
    setupInnerPage($pdf);
    sectionTitle($pdf, 'Terms & Conditions');

    $sections = [
        'Cost Includes'   => $terms['includes'] ?? '',
        'Cost Excludes'   => $terms['excludes'] ?? '',
        'Additional Info' => $terms['ps'] ?? ''
    ];

    foreach ($sections as $title => $text) {
        $pdf->SetFont('helvetica','B',11);
        $pdf->Cell(0, 8, $title, 0, 1);
        $pdf->SetFont('helvetica','',11);
        $pdf->MultiCell(0, 6, strip_tags($text));
        $pdf->Ln(4);
    }
}

/* ================= BUILD PDF ================= */
$title = trim($data['title'] ?? $data['salutation'] ?? '');
$fullName = trim($title . ' ' . ($data['full_name'] ?? ''));

renderCoverPage(
    $pdf,
    $cover,
    $data['nights'] ?? 0,
    $data['reference_no'] ?? '',
    $fullName,
);
renderDestinationsPage($pdf, $days);
renderHotelsPage($pdf, $hotels);
renderCostPage($pdf, $cost);
renderTermsPage($pdf, $terms);

/* ================= SAVE PDF ================= */

$dir = __DIR__.'/uploads/pdfs/';
if (!file_exists($dir)) mkdir($dir, 0777, true);

$fileName = 'itinerary_'.$id.'_v'.$data['version_number'].'.pdf';
$pdf->Output($dir.$fileName, 'F');

/* Update DB */
$update = $conn->prepare("
    UPDATE itinerary_customer_history
    SET pdf_path = :pdf
    WHERE id = :vid
");
$update->execute([
    'pdf' => 'uploads/pdfs/'.$fileName,
    'vid' => $data['id']
]);

header("Location: revised-itenary.php?pdf=created");
exit;
