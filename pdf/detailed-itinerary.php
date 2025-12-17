<?php
/** @var TCPDF $pdf */
/** @var array $cities */
/** @var string $assetRoot */

$pageWidth = $pdf->getPageWidth();
$marginLeft = 15;
$marginRight = 15;
$contentWidth = $pageWidth - $marginLeft - $marginRight;
$logoPath = $assetRoot . 'images/logo.png';
$logoWidth = 20; // logo width

foreach ($cities as $city) {

    // New page for each city
    addNewStyledPage($pdf);

    // ======================
    // Logo top-right
    // ======================
    if (file_exists($logoPath)) {
        $pdf->Image($logoPath, $pageWidth - $marginRight - $logoWidth, 10, $logoWidth, 0);
    }

    // ======================
    // Title
    // ======================
    $pdf->SetFont('helvetica', 'B', 18);
    $pdf->SetTextColor(0,153,218);
    $pdf->Cell(0, 12, 'Detailed Itinerary', 0, 1, 'L');
    $pdf->Ln(4);

    // ======================
    // City Name
    // ======================
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->SetTextColor(0,51,102);
    $pdf->Cell(0, 10, $city['name'], 0, 1, 'L');
    $pdf->Ln(2);

    // ======================
    // City Images: 1x6 + 2x3 stacked
    // ======================
    $images = json_decode($city['images'], true);
    if (!is_array($images)) $images = [];

    $firstImage = $images[0] ?? null;
    $secondImage = $images[1] ?? null;
    $thirdImage = $images[2] ?? null;

    $gap = 3;
    $col6Width = ($pageWidth - $marginLeft - $marginRight) * 0.5;
    $col3Width = ($pageWidth - $marginLeft - $marginRight) - $col6Width - $gap; // remaining width
    $imgH6 = 80; // first image height
    $imgH3 = ($imgH6 - $gap) / 2; // stacked image height

    // First image (left)
    if ($firstImage) {
        $path1 = $assetRoot . str_replace('/', DIRECTORY_SEPARATOR, ltrim($firstImage, '/'));
        if (file_exists($path1)) {
            $pdf->Image($path1, $marginLeft, $pdf->GetY(), $col6Width, $imgH6);
        } else {
            $pdf->Rect($marginLeft, $pdf->GetY(), $col6Width, $imgH6);
        }
    }

    // Second + third stacked (right)
    $col3X = $marginLeft + $col6Width + $gap;
    $currentY = $pdf->GetY();

    if ($secondImage) {
        $path2 = $assetRoot . str_replace('/', DIRECTORY_SEPARATOR, ltrim($secondImage, '/'));
        if (file_exists($path2)) {
            $pdf->Image($path2, $col3X, $currentY, $col3Width, $imgH3);
        } else {
            $pdf->Rect($col3X, $currentY, $col3Width, $imgH3);
        }
    }

    if ($thirdImage) {
        $path3 = $assetRoot . str_replace('/', DIRECTORY_SEPARATOR, ltrim($thirdImage, '/'));
        if (file_exists($path3)) {
            $pdf->Image($path3, $col3X, $currentY + $imgH3 + $gap, $col3Width, $imgH3);
        } else {
            $pdf->Rect($col3X, $currentY + $imgH3 + $gap, $col3Width, $imgH3);
        }
    }

    // Move Y to below the taller of images
    $pdf->SetY(max($currentY + $imgH6, $currentY + $imgH3 * 2 + $gap) + 6);

    // ======================
    // Key Activities (first 4) with line spacing
    // ======================
    $activities = json_decode($city['key_activities'], true);
    if (!is_array($activities)) $activities = [];
    $activities = array_slice($activities, 0, 4);

    if (!empty($activities)) {
        $pdf->SetFont('helvetica', 'B', 13);
        $pdf->SetTextColor(44,93,153);
        $pdf->Cell(0, 8, 'Key Activities', 0, 1, 'L');

        $pdf->SetFont('helvetica', '', 12);
        $pdf->SetTextColor(60,60,60);
        $pdf->SetCellHeightRatio(1.5);
        $activityText = implode("\n• ", $activities);
        $activityText = '• ' . $activityText;
        $pdf->MultiCell($contentWidth, 6, $activityText, 0, 'L');
        $pdf->Ln(4);
    }

    // ======================
    // City Highlights (first 5) with line spacing
    // ======================
    $highlights = json_decode($city['highlights'], true);
    if (!is_array($highlights)) $highlights = [];
    $highlights = array_slice($highlights, 0, 5);

    if (!empty($highlights)) {
        $pdf->SetFont('helvetica', 'B', 13);
        $pdf->SetTextColor(44,93,153);
        $pdf->Cell(0, 8, 'City Highlights', 0, 1, 'L');

        $pdf->SetFont('helvetica', '', 12);
        $pdf->SetTextColor(60,60,60);
        $pdf->SetCellHeightRatio(1.5);
        $highlightsText = implode("\n• ", $highlights);
        $highlightsText = '• ' . $highlightsText;
        $pdf->MultiCell($contentWidth, 6, $highlightsText, 0, 'L');
        $pdf->Ln(4);
    }
}
