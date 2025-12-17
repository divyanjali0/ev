<?php
/** @var TCPDF $pdf */
/** @var array $data */
/** @var string $assetRoot */

$pageWidth = $pdf->getPageWidth();
$marginLeft = 15;
$marginRight = 15;
$contentWidth = $pageWidth - $marginLeft - $marginRight;

// ======================
// Add a new page
// ======================
addNewStyledPage($pdf);

// ======================
// Logo top-right
// ======================
$logoPath = $assetRoot . 'images/logo.png';
$logoWidth = 25;
if (file_exists($logoPath)) {
    $pdf->Image($logoPath, $pageWidth - $marginRight - $logoWidth, 10, $logoWidth, 0);
}

// ======================
// Page Title: Customer Details
// ======================
$pdf->Ln(10);
$pdf->SetFont('helvetica', 'B', 18);
$pdf->SetTextColor(0,153,218);
$pdf->Cell(0, 12, "Customer Details", 0, 1, 'L');
$pdf->Ln(6);

// ======================
// Essential Customer Info Table
// ======================
$passengerChildren = 
    ($_POST['children_6_11'] ?? 0) + 
    ($_POST['children_above_11'] ?? 0) + 
    ($_POST['infants'] ?? 0);

$fields = [
    'Reference No' => $data['reference'] ?? '',
    'Name' => $data['name'] ?? '',
    'Phone / WhatsApp' => ($_POST['whatsappCode'] ?? '') . ' ' . ($_POST['whatsapp'] ?? ''),
    'Email' => $_POST['email'] ?? '',
    'Pickup Location' => $_POST['pickupLocation'] ?? '',
    'Dropoff Location' => $_POST['dropoffLocation'] ?? '',
    'Passengers' => "Adults: " . ($_POST['adults'] ?? 0) . " | Children: " . $passengerChildren,
    'Hotel Rating' => $_POST['hotelRating'] ?? '',
    'Meal Plan' => $_POST['mealPlan'] ?? '',
    'Allergy Issues' => $_POST['mealAllergy'] ?? '',
];

$pdf->SetFont('helvetica', '', 12);
$pdf->SetTextColor(60,60,60);
$pdf->SetDrawColor(200,200,200);
$pdf->SetLineWidth(0.3);
$pdf->SetFillColor(240, 240, 240);

$cellHeight = 8;

// Table layout
foreach ($fields as $label => $value) {
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(50, $cellHeight, $label, 1, 0, 'L', 1);

    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell($contentWidth - 50, $cellHeight, $value, 1, 'L', 0, 1);
}

$pdf->Ln(12);

// ======================
// Bold Thank You Message
// ======================
$pdf->SetFont('helvetica', 'BI', 12);      
$pdf->SetTextColor(50, 50, 50);             
$pdf->MultiCell(0, 8, "Thank you for choosing Explore Vacations! We look forward to making your trip unforgettable.", 0, 'C');


