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

$pdf->SetFont('helvetica', 'B', 18);
$pdf->SetTextColor(0,153,218);
$pdf->Cell(0, 12, 'Your Transportation (Vehicle Details)', 0, 1, 'L');

$pdf->Ln(4);
$pdf->SetFont('helvetica', 'B', 11);
$pdf->SetTextColor(44,93,153);
$pdf->Cell(0, 8, 'Selected Vehicle', 0, 1, 'L');

$pdf->SetFont('helvetica', '', 11);
$pdf->SetTextColor(60,60,60);

if (!empty($data['vehicle'])) {
    $vehicleImagePath = $data['image'] 
        ? realpath(__DIR__ . '/../' . $data['image'])
        : null;

    if ($vehicleImagePath && file_exists($vehicleImagePath)) {
        $pdf->Image($vehicleImagePath, 15, $pdf->GetY(), 60, 0); 
    } else {
        $pdf->Rect(15, $pdf->GetY(), 40, 35);
        $pdf->SetXY(15, $pdf->GetY() + 15);
        $pdf->Cell(40, 10, 'No Image', 0, 0, 'C');
    }

    $pdf->SetXY(60, $pdf->GetY());
    $pdf->Cell(0, 6, "Category: {$data['vehicle']}", 0, 1);
    $pdf->SetX(60);
    $pdf->Cell(0, 6, "Seats: {$data['vehicle_passengers']}", 0, 1);
} else {
    $pdf->Cell(0, 6, 'No vehicle selected.', 0, 1);
}


$pdf->Ln(8);

addFooter(
    $pdf,'+94 76 1414 554','info@explorevacations.lk','explore.vacations'
);