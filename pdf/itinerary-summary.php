<?php
/** @var TCPDF $pdf */
/** @var array $cities */
/** @var array $data */
/** @var string $themeList */

$assetRoot = realpath(__DIR__ . '/../assets') . DIRECTORY_SEPARATOR;

require_once __DIR__ . '/footer-details.php';

$pdf->SetTopMargin(10);
addNewStyledPage($pdf);

$pageWidth = $pdf->getPageWidth();

/* ======================
   Logo on top-right
====================== */
$logoPath = 'assets/images/logo.png';
$logoWidth = 20;
$logoHeight = 0;
if (file_exists($logoPath)) {
    $pdf->Image($logoPath, $pageWidth - 15 - $logoWidth, 10, $logoWidth, $logoHeight);
}

/* ======================
   Title
====================== */
$pdf->Ln(6);
$pdf->SetFont('helvetica', 'B', 18);
$pdf->SetTextColor(0,153,218);
$pdf->Cell(0, 12, 'Tour Summary', 0, 1, 'L');

/* ======================
   Dates + Nights/Days
====================== */
$pdf->SetFont('helvetica', '', 11);
$pdf->SetTextColor(60,60,60);
$pdf->Cell(0, 8, "{$data['start']} - {$data['end']}   |   {$data['nights']} Nights / {$data['days']} Days", 0, 1, 'L');
$pdf->Ln(4);

/* ======================
   Themes
====================== */
$pdf->SetFont('helvetica', 'B', 11);
$pdf->SetTextColor(44,93,153);
$pdf->Cell(0, 8, 'Theme', 0, 1, 'L');

$pdf->SetFont('helvetica', '', 11);
$pdf->SetTextColor(70,70,70);
$pdf->MultiCell(0, 7, $themeList, 0, 'L');
$pdf->Ln(6);

/* ======================
   Cities Section with Images & Activities
====================== */
// $assetRoot = 'C:/xampp/htdocs/ev/assets/';
$imgW = 40;
$imgH = 35;
$gap = 6;

foreach ($cities as $city) {

    /* Decode activities */
    $activities = json_decode($city['key_activities'], true);
    if (!is_array($activities)) $activities = [];
    $activities = array_slice($activities, 0, 4); // first 4 only
    $activitiesText = implode("\n• ", $activities);
    if (!empty($activitiesText)) $activitiesText = '• ' . $activitiesText;

    /* City image */
    $images = json_decode($city['images'], true);
    if (!is_array($images)) $images = [];
    $imagePath = !empty($images[0]) ? $assetRoot . str_replace('/', DIRECTORY_SEPARATOR, ltrim($images[0], '/')) : null;

    $startX = 15;
    $startY = $pdf->GetY();

    // Estimate the height needed for this city block
    $estimatedHeight = max($imgH, 8 + 6 * (substr_count($activitiesText, "\n") + 1)) + 8; // 8 = extra gap

    // Check if enough space left on page
    if ($startY + $estimatedHeight > $pdf->getPageHeight() - $pdf->getBreakMargin()) {
        $pdf->AddPage();
        $startY = $pdf->GetY(); // reset startY after new page
    }

    // Draw image or placeholder
    if ($imagePath && file_exists($imagePath)) {
        $pdf->Image($imagePath, $startX, $startY, $imgW, $imgH);
    } else {
        $pdf->Rect($startX, $startY, $imgW, $imgH);
        $pdf->SetFont('helvetica', 'I', 10);
        $pdf->SetXY($startX, $startY + ($imgH/2) - 5);
        $pdf->Cell($imgW, 10, 'No Image', 0, 0, 'C');
    }

    // City name + activities
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->SetTextColor(0,51,102);
    $cityX = $startX + $imgW + $gap;
    $cityY = $startY;
    $pdf->SetXY($cityX, $cityY);
    $pdf->Cell(0, 6, "{$city['name']}", 0, 1, 'L');

    $pdf->SetFont('helvetica', '', 11);
    $pdf->SetTextColor(60,60,60);
    $pdf->SetXY($cityX, $cityY + 8);
    $pdf->MultiCell($pageWidth - $cityX - 15, 6, $activitiesText, 0, 'L');

    // Move Y to below the taller of image or activities
    $pdf->SetY(max($startY + $imgH, $pdf->GetY()) + 8);
}


$pdf->Ln(4);
$pdf->SetFont('helvetica', 'I', 10);
$pdf->SetTextColor(200,0,0);
$pdf->MultiCell(0, 6, "**Just a heads-up: The places and images above are for reference only. One of our team member will get in touch with you soon to help finalize your trip!!", 0, 'L');

addFooter(
    $pdf,'+94 76 1414 554','info@explorevacations.lk','explore.vacations'
);
