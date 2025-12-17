<?php
/** @var TCPDF $pdf */

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage('P', 'A4');

$pageWidth  = $pdf->getPageWidth();
$pageHeight = $pdf->getPageHeight();
$marginX    = 15;
$days       = $nights + 1;

/* ======================
   Top Color Lines
====================== */
$pdf->SetLineWidth(2);
$pdf->SetDrawColor(0,153,218);
$pdf->Line(0, 3, $pageWidth, 3);

$pdf->SetDrawColor(130,200,70);
$pdf->Line(0, 6, $pageWidth, 6);

/* ======================
   Logo (BIGGER + CENTERED)
====================== */
$logoWidth = 40; // increased size
$pdf->Image(
    __DIR__ . '/../assets/images/logo.png',
    ($pageWidth - $logoWidth) / 2,
    12,
    $logoWidth
);

/* ======================
   Reduced space after logo
====================== */
$pdf->Ln(30); // was 40

/* ======================
   Sri Lanka Title
====================== */
$pdf->SetFont('dejavuserif', 'BI', 34);
$pdf->SetTextColor(0,153,218);
$pdf->SetX($marginX);
$pdf->Cell(0, 14, 'Sri Lanka', 0, 1, 'L');

/* ======================
   Subtitle
====================== */
$pdf->SetFont('dejavusans', 'I', 15);
$pdf->SetTextColor(60,120,160);
$pdf->SetX($marginX);
$pdf->Cell(
    0,
    9,
    "Tailor Made Tour for {$nights} Nights & {$days} Days",
    0,
    1,
    'L'
);

/* ======================
   Reference Line
====================== */
$pdf->SetFont('roboto', '', 10);
$pdf->SetTextColor(80,80,80);
$pdf->SetX($marginX);
$pdf->Cell(
    0,
    7,
    "Tour Ref No: {$referenceNo} | Tailor Made to: {$customerName}",
    0,
    1,
    'L'
);

/* ======================
   Paragraph (MORE MARGIN + MORE LINE HEIGHT)
====================== */
$pdf->Ln(10); // more space above paragraph

$pdf->SetFont('roboto', '', 11);
$pdf->SetTextColor(70,70,70);
$pdf->SetX($marginX);

$description = "Beautiful beaches, lush forests, mountains and a land blessed with a rich and vibrant culture that dates back thousands of years. This would be a good way to describe Sri Lanka, the paradise isle. That and so much more. Rated by Lonely Planet as the number one travel destination for 2019, Sri Lanka is truly a paradise like no other. Home to some of the world's most beautiful beaches, as well as both rainforests and dry zone forests and majestic mountain ranges, not forgetting the historical world heritage sites.";

// Disable page break so image stays at bottom
$autoPageBreak = $pdf->getAutoPageBreak();
$breakMargin   = $pdf->getBreakMargin();
$pdf->SetAutoPageBreak(false, 0);

// Increased line height from 6 → 7.5
$pdf->MultiCell(
    $pageWidth - ($marginX * 2),
    8,
    $description,
    0,
    'L'
);

$pdf->Ln(10); // more space below paragraph

/* ======================
   DID YOU KNOW Box
====================== */
$boxY = $pdf->GetY();

$pdf->SetFillColor(245,245,245);
$pdf->RoundedRect($marginX, $boxY, $pageWidth - 30, 28, 3, '1111', 'F');

/* Title */
$pdf->SetFont('roboto', 'B', 11);
$pdf->SetTextColor(0,150,90);
$pdf->SetXY($marginX + 4, $boxY + 5);
$pdf->Cell(0, 6, 'DID YOU KNOW?', 0, 1, 'L');

/* Body text */
$pdf->SetFont('roboto', '', 10);
$pdf->SetTextColor(60,60,60);

/* IMPORTANT: use SetXY (not SetX) */
$pdf->SetXY($marginX + 4, $pdf->GetY());

$pdf->MultiCell(
    $pageWidth - 38, // width inside box
    5.5,
    "The town is home to the highest point in the country and is the most important ground for the production of the world-famous Ceylon tea.",
    0,
    'L'
);

$imageHeight = 100; 

$pdf->Image(
    __DIR__ . '/../assets/images/sri-lanka.jpg',
    0,
    $pageHeight - $imageHeight,
    $pageWidth,
    $imageHeight
);

// Restore auto-page-break
$pdf->SetAutoPageBreak($autoPageBreak, $breakMargin);
