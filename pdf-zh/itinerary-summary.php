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
$pdf->SetFont('stsongstdlight', '', 12);
$pdf->SetTextColor(0,153,218);
$pdf->Cell(0, 12, '旅游概览', 0, 1, 'L');

/* ======================
   Dates + Nights/Days
====================== */
$pdf->SetFont('stsongstdlight', '', 12);
$pdf->SetTextColor(60,60,60);
$pdf->Cell(0, 8, "{$data['start']} - {$data['end']}   |   {$data['nights']} 晚数 / {$data['days']} 天数", 0, 1, 'L');
$pdf->Ln(4);

/* ======================
   Themes
====================== */
$pdf->SetFont('stsongstdlight', '', 12);
$pdf->SetTextColor(44,93,153);
$pdf->Cell(0, 8, '主题', 0, 1, 'L');

$pdf->SetFont('stsongstdlight', '', 12);
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
        $pdf->SetFont('stsongstdlight', '', 12);
        $pdf->SetXY($startX, $startY + ($imgH/2) - 5);
        $pdf->Cell($imgW, 10, 'No Image', 0, 0, 'C');
    }

    // City name + activities
    $pdf->SetFont('stsongstdlight', '', 12);
    $pdf->SetTextColor(0,51,102);
    $cityX = $startX + $imgW + $gap;
    $cityY = $startY;
    $pdf->SetXY($cityX, $cityY);
    $pdf->Cell(0, 6, "{$city['name']}", 0, 1, 'L');

    $pdf->SetFont('stsongstdlight', '', 12);
    $pdf->SetTextColor(60,60,60);
    $pdf->SetXY($cityX, $cityY + 8);
    $pdf->MultiCell($pageWidth - $cityX - 15, 6, $activitiesText, 0, 'L');

    // Move Y to below the taller of image or activities
    $pdf->SetY(max($startY + $imgH, $pdf->GetY()) + 8);
}


$pdf->Ln(4);
$pdf->SetFont('stsongstdlight', '', 10);
$pdf->SetTextColor(200,0,0);
$pdf->MultiCell(0, 6, "**友情提示：以上地点和图片仅供参考。我们的工作人员将很快与您联系，协助您最终确定行程！", 0, 'L');

addFooter(
    $pdf,'+94 76 1414 554','info@explorevacations.lk','explore.vacations'
);
