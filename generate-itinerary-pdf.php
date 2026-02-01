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

        // Outer border – BLUE (same as cover)
        $this->SetLineWidth($this->outerWidth);
        $this->SetDrawColor(0,153,218);
        $this->Rect(6, 6, 198, 285);

        // Inner border – GREEN (same as cover)
        $this->SetLineWidth($this->innerWidth);
        $this->SetDrawColor(130,200,70);
        $this->Rect(9, 9, 192, 279);

        // Logo
        $this->Image(__DIR__.'/assets/images/logo.png', 168, 14, 26);
    }


    public function Footer() {

        // Skip cover page
        if ($this->page == 1) {
            return;
        }

        $this->SetY(-14);
        $this->SetFont('helvetica','',8);
        $this->SetTextColor(170,170,170);

        /* Footer text - centered */
        $this->Cell(
            0, 6,
            'No. 371/5, Negombo Road, Seeduwa, Sri Lanka | Tel: +94 761 414 552 | www.explorevacations.lk',
            0, 0, 'C'
        );

        /* Page number - right */
        $this->SetFont('helvetica','B',9);
        $this->SetX(-20);
        $this->Cell(
            15, 6,
            $this->getAliasNumPage(),
            0, 0, 'R'
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

function setupInnerPage($pdf, $top = 35) {
    $pdf->SetMargins(20, $top, 20);
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

    $pdf->setPrintHeader(true);
    $pdf->setPrintFooter(true);
}

function renderDestinationsPage($pdf, $days) {

    global $conn;
    $isFirstDay = true;

    foreach ($days as $day) {

        /* ================= NEW PAGE PER DAY ================= */
        $pdf->AddPage();
        setupInnerPage($pdf);
        $pdf->Ln(12);

        /* ================= PAGE TITLE (ONLY FIRST PAGE) ================= */
        if ($isFirstDay) {
            $pdf->SetFont('helvetica','B',14);
            $pdf->SetTextColor(0,153,218);
            $pdf->Cell(0, 10, strtoupper('Destinations'), 0, 1);
            $pdf->Ln(8);
            $pdf->SetTextColor(0);
            $isFirstDay = false;
        }

        /* ================= FETCH CITY NAME ================= */
        $cityName = '';
        if (!empty($day['city_id'])) {
            $stmt = $conn->prepare("SELECT name FROM cities WHERE id = ?");
            $stmt->execute([$day['city_id']]);
            $cityName = $stmt->fetchColumn() ?: '';
        }

        /* ================= DAY BADGE (PILL STYLE) ================= */
        $startY = $pdf->GetY();
        $badgeX = 20;

        $pdf->SetFillColor(0,153,218);
        $pdf->SetTextColor(255);
        $pdf->SetFont('helvetica','B',11);

        $pdf->RoundedRect($badgeX, $startY, 26, 10, 5, '1111', 'F');
        $pdf->SetXY($badgeX, $startY + 2);
        $pdf->Cell(26, 6, 'DAY '.$day['day'], 0, 0, 'C');

        $pdf->SetTextColor(0);

        /* ================= META TEXT (ALIGNED WITH BADGE) ================= */
        $pdf->SetXY($badgeX + 32, $startY - 1);
        $pdf->SetFont('helvetica','B',12);
        $pdf->Cell(0, 7, $cityName, 0, 1);

        $meta = [];
        if (!empty($day['date'])) {
            $meta[] = date('d M Y', strtotime($day['date']));
        }
        if (!empty($day['meal_plan'])) {
            $meta[] = $day['meal_plan'];
        }

        if (!empty($meta)) {
            $pdf->SetX($badgeX + 32);
            $pdf->SetFont('helvetica','',11);
            $pdf->SetTextColor(90,90,90);
            $pdf->Cell(0, 6, implode('  |  ', $meta), 0, 1);
            $pdf->SetTextColor(0);
        }

        $pdf->Ln(6);

        /* ================= DESCRIPTION ================= */
        if (!empty($day['description'])) {
            $pdf->SetX($badgeX);
            $pdf->SetFont('helvetica','',11);
            $pdf->writeHTML(
                $day['description'],
                true,
                false,
                true,
                false,
                ''
            );
        }

        $pdf->Ln(6);

        /* ================= IMAGES (4 COLUMN GRID) ================= */
        if (!empty($day['images']) && is_array($day['images'])) {

            $colWidth  = 38;
            $imgHeight = 25;
            $gap       = 4;

            $startX = $badgeX;
            $y      = $pdf->GetY();
            $col    = 0;

            foreach ($day['images'] as $img) {

                $path = __DIR__ . '/uploads/city_images/' . $img;
                if (!file_exists($path)) continue;

                if ($col === 4) {
                    $col = 0;
                    $y += ($imgHeight + 6);
                }

                if ($y + $imgHeight > ($pdf->getPageHeight() - 30)) {
                    $pdf->AddPage();
                    setupInnerPage($pdf);
                    $pdf->Ln(10);
                    $y = $pdf->GetY();
                }

                $x = $startX + ($col * ($colWidth + $gap));
                $pdf->Image($path, $x, $y, $colWidth, $imgHeight);

                $col++;
            }

            $pdf->SetY($y + $imgHeight + 10);
        }
    }
}

function renderHotelsPage($pdf, $hotels) {

    $pdf->AddPage();
    setupInnerPage($pdf, 28); // reduced top margin

    /* Page title */
    $pdf->SetFont('helvetica','B',14);
    $pdf->SetTextColor(0,153,218);
    $pdf->Cell(0, 10, strtoupper('Hotels'), 0, 1);
    $pdf->Ln(6);
    $pdf->SetTextColor(0);

    foreach ($hotels as $day => $hotel) {

        // Auto page break safety
        if ($pdf->GetY() > ($pdf->getPageHeight() - 50)) {
            $pdf->AddPage();
            setupInnerPage($pdf);
        }

        $startY = $pdf->GetY();
        $startX = 20;
        $boxW   = $pdf->getPageWidth() - 40;
        $boxH   = 28;

        /* Card background */
        $pdf->SetFillColor(245,248,250);
        $pdf->RoundedRect($startX, $startY, $boxW, $boxH, 4, '1111', 'F');

        /* Day badge */
        $pdf->SetFillColor(0,153,218);
        $pdf->SetTextColor(255);
        $pdf->SetFont('helvetica','B',11);
        $pdf->RoundedRect($startX + 4, $startY + 8, 22, 10, 5, '1111', 'F');
        $pdf->SetXY($startX + 4, $startY + 10);
        $pdf->Cell(22, 6, 'DAY '.$day, 0, 0, 'C');

        $pdf->SetTextColor(0);

        /* Hotel name */
        $pdf->SetXY($startX + 32, $startY + 6);
        $pdf->SetFont('helvetica','B',12);
        $pdf->Cell(0, 7, $hotel['name'] ?? '', 0, 1);

        /* Website */
        if (!empty($hotel['link'])) {
            $pdf->SetX($startX + 32);
            $pdf->SetFont('helvetica','',10);
            $pdf->SetTextColor(90,90,90);
            $pdf->Cell(0, 6, $hotel['link'], 0, 1);
            $pdf->SetTextColor(0);
        }

        $pdf->Ln(6);
    }
}


function renderCostPage($pdf, $cost) {

    $pdf->AddPage();
    setupInnerPage($pdf, 28);

    /* ===== PAGE TITLE ===== */
    $pdf->SetFont('helvetica','B',14);
    $pdf->SetTextColor(0,153,218);
    $pdf->Cell(0, 10, strtoupper('Tour Cost'), 0, 1);
    $pdf->Ln(6);

    $startX = 20;
    $cardW  = ($pdf->getPageWidth() - 60) / 2; // two cards per row
    $alt    = false;

    $count = 0;
    $totalItems = count($cost);

    foreach ($cost as $key => $value) {

        $isLast = (++$count === $totalItems);

        // Auto page break safety
        if ($pdf->GetY() > ($pdf->getPageHeight() - 45)) {
            $pdf->AddPage();
            setupInnerPage($pdf, 28);
        }

        $x = $startX + ($count % 2 === 0 ? $cardW + 20 : 0);
        $y = $pdf->GetY();

        /* Card height estimation */
        $textHeight = $pdf->getStringHeight($cardW - 16, strip_tags($value));
        $cardH = max($textHeight + 12, 20); // smaller padding, min height 20

        /* Background */
        $pdf->SetFillColor($alt ? 245 : 250);
        $pdf->RoundedRect($x, $y, $cardW, $cardH, 4, '1111', 'F');

        /* Accent bar */
        $pdf->SetFillColor(0,153,218);
        $pdf->Rect($x, $y, 4, $cardH, 'F');

        /* Title & Description */
        $pdf->SetXY($x + 8, $y + 4); // small top padding

        if ($isLast) {
            $pdf->SetFont('helvetica','B',12);
            $pdf->SetTextColor(220,50,50);
        } else {
            $pdf->SetFont('helvetica','B',11);
            $pdf->SetTextColor(32,72,154);
        }
        $label = ucwords(str_replace('_',' ', $key));
        $pdf->Cell(0, 6, $label, 0, 1);

        $pdf->SetX($x + 8);
        if ($isLast) {
            $pdf->SetFont('helvetica','',11);
            $pdf->SetTextColor(180,30,30);
        } else {
            $pdf->SetFont('helvetica','',11);
            $pdf->SetTextColor(60,60,60);
        }
        $pdf->MultiCell($cardW - 12, 6, strip_tags($value), 0, 'L');

        // Move to next row if needed
        if ($count % 2 === 0) {
            $pdf->SetY($y + $cardH + 6);
            $alt = !$alt;
        }
    }

    // If odd number of cards, move cursor down after last single card
    if ($count % 2 !== 0) {
        $pdf->SetY($y + $cardH + 6);
    }

}

function renderTermsPage($pdf, $terms) {

    $pdf->AddPage();
    setupInnerPage($pdf);
    // sectionTitle($pdf, 'Terms & Conditions');

    $pdf->SetFont('helvetica','B',14);
    $pdf->SetTextColor(0,153,218);
    $pdf->Cell(0, 10, strtoupper('Terms & Conditions'), 0, 1);

    // Define sections for easier reference
    $sections = [
        'Cost Includes'   => $terms['includes'] ?? '',
        'Cost Excludes'   => $terms['excludes'] ?? '',
        'Additional Info' => $terms['ps'] ?? ''
    ];

    $startX = 20;
    $boxW   = $pdf->getPageWidth() - 40; // page width minus margins

    foreach ($sections as $title => $text) {

        // Title styling
        $pdf->SetFont('helvetica','B',12);
        $pdf->SetTextColor(32,72,154); // Formal blue color for title
        $pdf->Cell(0, 10, strtoupper($title), 0, 1);
        
        // Add a line for separation
        $pdf->SetDrawColor(32,72,154);
        $pdf->Line($startX, $pdf->GetY(), $startX + $boxW, $pdf->GetY());
        $pdf->Ln(6); // space after the line

        // Text content styling
        $pdf->SetFont('helvetica','',11);
        $pdf->SetTextColor(60,60,60); // softer grey for text

        // Add a box around the section text
        $pdf->SetFillColor(245,245,245); // light grey background for readability
        $pdf->RoundedRect($startX, $pdf->GetY(), $boxW, 40, 4, '1111', 'F');
        
        // MultiCell for text content inside the box
        $pdf->SetXY($startX + 6, $pdf->GetY() + 6); // Padding for better alignment
        $pdf->MultiCell($boxW - 12, 6, strip_tags($text)); // Adjust text box width

        // Space after each section
        $pdf->Ln(6);
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
