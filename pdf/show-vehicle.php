<?php
/** @var TCPDF $pdf */
/** @var array $cities */
/** @var array $data */
/** @var string $themeList */
/** @var string $assetRoot */

require_once __DIR__ . '/footer-details.php';

$pdf->SetTopMargin(10);
addNewStyledPage($pdf);

$pageWidth = $pdf->getPageWidth();

/* ======================
   Logo on top-right
====================== */
$logoPath = 'C:/xampp/htdocs/ev/assets/images/logo.png';
$logoWidth = 20;
$logoHeight = 0;
if (file_exists($logoPath)) {
    $pdf->Image($logoPath, $pageWidth - 15 - $logoWidth, 10, $logoWidth, $logoHeight);
}

/* ======================
   Title
====================== */
$pdf->SetFont('helvetica', 'B', 18);
$pdf->SetTextColor(0,153,218);
$pdf->Cell(0, 12, 'Your Transportation (Vehicle Details)', 0, 1, 'L');
$pdf->Ln(4);

/* ======================
   Selected Vehicle Section
====================== */
$pdf->SetFont('helvetica', 'B', 11);
$pdf->SetTextColor(44,93,153);
$pdf->Cell(0, 8, 'Selected Vehicle', 0, 1, 'L');

$pdf->SetFont('helvetica', '', 11);
$pdf->SetTextColor(60,60,60);

$marginLeft = 15;
$gap = 10;
$imageWidth = 60;
$imageHeight = 0; // Auto height
$yStart = $pdf->GetY();

if (!empty($data['vehicle'])) {

    // Resolve the vehicle image path
    $vehicleImagePath = !empty($data['image'])
        ? realpath(__DIR__ . '/../' . ltrim($data['image'], '/\\'))
        : null;

    // Draw image or placeholder
    if ($vehicleImagePath && file_exists($vehicleImagePath)) {
        $pdf->Image($vehicleImagePath, $marginLeft, $yStart, $imageWidth, $imageHeight);
        $imgHeightActual = $pdf->getImageRBY() - $yStart;
    } else {
        $imgHeightActual = 40; // Placeholder height
        $pdf->Rect($marginLeft, $yStart, $imageWidth, $imgHeightActual);
        $pdf->SetXY($marginLeft, $yStart + $imgHeightActual / 2 - 5);
        $pdf->Cell($imageWidth, 10, 'No Image', 0, 0, 'C');
    }

    // Text position: right of the image
    $textX = $marginLeft + $imageWidth + $gap;
    $textY = $yStart;
    $pdf->SetXY($textX, $textY);

    $pdf->Cell(0, 6, "Category: {$data['vehicle']}", 0, 1);
    $pdf->SetX($textX);
    $pdf->Cell(0, 6, "Seats: {$data['vehicle_passengers']}", 0, 1);

    // Move Y below the taller of image or text
    $pdf->SetY($yStart + max($imgHeightActual, 24) + 8); 

} else {
    $pdf->Cell(0, 6, 'No vehicle selected.', 0, 1);
    $pdf->Ln(8);
}

/* ======================
   Payment Options Section
====================== */

// Heading
$pdf->SetFont('helvetica', 'B', 16);
$pdf->SetTextColor(0, 102, 204); 
$pdf->Cell(0, 12, 'Multiple Payment Options', 0, 1, 'L');
$pdf->Ln(4);

// Subheading
$pdf->SetFont('helvetica', '', 12);
$pdf->SetTextColor(60, 60, 60);
$pdf->Cell(0, 6, 'We Accept These International Payment Systems', 0, 1, 'L');
$pdf->Ln(5);

// Payment logos
$paymentLogos = [
    $assetRoot . 'images/payments/google_pay.png',
    $assetRoot . 'images/payments/apple_pay.png',
    $assetRoot . 'images/payments/mastercard.png',
    $assetRoot . 'images/payments/visa.png',
];

$logoHeight = 15; // fixed height for all logos
$gap = 15; // space between logos
$logosCount = count($paymentLogos);

// Calculate total width for logos row
$totalWidth = 0;
$logoWidths = [];
foreach ($paymentLogos as $logoPath) {
    if (file_exists($logoPath)) {
        list($w, $h) = getimagesize($logoPath); 
        $scaledWidth = ($w / $h) * $logoHeight; 
        $logoWidths[] = $scaledWidth;
        $totalWidth += $scaledWidth;
    } else {
        $logoWidths[] = 0;
    }
}
$totalWidth += ($logosCount - 1) * $gap; // include gaps

// Start X to center logos
$xStart = ($pageWidth - $totalWidth) / 2;
$yStart = $pdf->GetY();

foreach ($paymentLogos as $i => $logoPath) {
    if (file_exists($logoPath)) {
        $pdf->Image($logoPath, $xStart, $yStart, $logoWidths[$i], $logoHeight);
        $xStart += $logoWidths[$i] + $gap;
    }
}

$pdf->Ln($logoHeight + 10); // space after logos

/* ======================
   Footer
====================== */
addFooter(
    $pdf,'+94 76 1414 554','info@explorevacations.lk','explore.vacations'
);
