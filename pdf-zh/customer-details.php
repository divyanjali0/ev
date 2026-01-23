<?php
/** @var TCPDF $pdf */
/** @var array $data */
/** @var string $assetRoot */

require_once __DIR__ . '/footer-details.php';

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
$logoPath = 'assets/images/logo.png';
$logoWidth = 25;
if (file_exists($logoPath)) {
    $pdf->Image($logoPath, $pageWidth - $marginRight - $logoWidth, 10, $logoWidth, 0);
}

// ======================
// Page Title: Customer Details
// ======================
$pdf->Ln(10);
$pdf->SetFont('stsongstdlight', '', 18);
$pdf->SetTextColor(0,153,218);
$pdf->Cell(0, 12, "客户详情", 0, 1, 'L');
$pdf->Ln(6);


$pdf->Ln(6);
$pdf->SetFont('stsongstdlight', '', 12);
$pdf->SetTextColor(0,153,218);
$pdf->Cell(0, 12, '旅游概览', 0, 1, 'L');
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

$pdf->SetFont('stsongstdlight', '', 12);
$pdf->SetTextColor(60,60,60);
$pdf->SetDrawColor(200,200,200);
$pdf->SetLineWidth(0.3);
$pdf->SetFillColor(240, 240, 240);

$cellHeight = 8;

// Table layout
foreach ($fields as $label => $value) {
    $pdf->SetFont('stsongstdlight', 'B', 12);
    $pdf->Cell(50, $cellHeight, $label, 1, 0, 'L', 1);

    $pdf->SetFont('stsongstdlight', '', 12);
    $pdf->MultiCell($contentWidth - 50, $cellHeight, $value, 1, 'L', 0, 1);
}

$pdf->Ln(12);

// ======================
// Bold Thank You Message
// ======================
$pdf->SetFont('stsongstdlight', '', 12);      
$pdf->SetTextColor(50, 50, 50);             
$pdf->MultiCell(0, 8, "感谢您选择 Explore Vacations 我们期待为您打造难忘的旅程。", 0, 'C');

$pdf->Ln(6); // small space before note

$pdf->SetFont('stsongstdlight', 'I', 10);
$pdf->SetTextColor(200,0,0);
$pdf->SetFillColor(245, 245, 245); 
$pdf->SetDrawColor(200,200,200);  
$pdf->SetLineWidth(0.2);

$pdf->MultiCell(
    0,          
    8,         
    "**请注意：以上提到的图片和地点仅供参考，实际情况可能有所不同。我们的团队成员将尽快与您联系以确认具体细节", 
    1,         
    'C',        
    1,        
    1           
);

$pdf->Ln(4); 

addFooter(
    $pdf,'+94 76 1414 554','info@explorevacations.lk','explore.vacations'
);

