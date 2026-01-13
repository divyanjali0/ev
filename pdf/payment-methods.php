<?php
/** @var TCPDF $pdf */
/** @var array $data */

$assetRoot = realpath(__DIR__ . '/../assets') . DIRECTORY_SEPARATOR;

require_once __DIR__ . '/footer-details.php';

$pdf->SetTopMargin(10);
addNewStyledPage($pdf);

$pageWidth = $pdf->getPageWidth();
$marginLeft = 15;   
$gap = 10;          

$logoPath = 'assets/images/logo.png';
$logoWidth = 20;
$logoHeight = 0;
if (file_exists($logoPath)) {
    $pdf->Image($logoPath, $pageWidth - 15 - $logoWidth, 10, $logoWidth, $logoHeight);
}

$pdf->Ln(15); 

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

$pdf->Ln($logoHeight + 5);


addFooter(
    $pdf,'+94 76 1414 554','info@explorevacations.lk','explore.vacations'
);