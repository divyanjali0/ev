<?php
/** @var TCPDF $pdf */

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage('P', 'A4');

$pageWidth  = $pdf->getPageWidth();
$pageHeight = $pdf->getPageHeight();
$marginX    = 15;
$days       = $nights + 1;
$pdf->SetFont('stsongstdlight', '', 12);

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
$pdf->SetFont('stsongstdlight', '', 12);
$pdf->SetTextColor(60,120,160);
$pdf->SetX($marginX);
$pdf->Cell(
    0,
    9,
    "为客户定制的旅行 {$nights} 晚数 & {$days} 天数",
    0,
    1,
    'L'
);

/* ======================
   Reference Line
====================== */
$pdf->SetFont('stsongstdlight', '', 12);
$pdf->SetTextColor(80,80,80);
$pdf->SetX($marginX);
$pdf->Cell(
    0,
    7,
    "行程编号 : {$referenceNo} | 定制行程给 : {$customerName}",
    0,
    1,
    'L'
);

/* ======================
   Paragraph (MORE MARGIN + MORE LINE HEIGHT)
====================== */
$pdf->Ln(10); // more space above paragraph

$pdf->SetFont('stsongstdlight', '', 12);
$pdf->SetTextColor(70,70,70);
$pdf->SetX($marginX);

$description = "美丽的海滩、郁郁葱葱的森林、巍峨的群山，以及一个拥有数千年丰富多彩文化的土地。这是描述斯里兰卡的天堂岛屿的绝佳方式。还有更多值得探索的风景。根据《孤独星球》的评选，斯里兰卡是2019年排名第一的旅游目的地，它确实是一个独一无二的天堂。这里拥有世界上一些最美丽的海滩，同时兼具雨林和干燥区森林、雄伟的山脉，更有悠久的历史遗产。";

// Disable page break so image stays at bottom
$autoPageBreak = $pdf->getAutoPageBreak();
$breakMargin   = $pdf->getBreakMargin();
$pdf->SetAutoPageBreak(false, 0);

$pdf->MultiCell(
    $pageWidth - ($marginX * 2),
    8,
    $description,
    0,
    'J'
);

$pdf->Ln(10); 

/* ======================
   DID YOU KNOW Box
====================== */
$boxY = $pdf->GetY();

$pdf->SetFillColor(245,245,245);
$pdf->RoundedRect($marginX, $boxY, $pageWidth - 30, 28, 3, '1111', 'F');

/* Title */
$pdf->SetFont('stsongstdlight', '', 12);
$pdf->SetTextColor(0,150,90);
$pdf->SetXY($marginX + 4, $boxY + 5);
$pdf->Cell(0, 6, '你知道吗', 0, 1, 'L');

/* Body text */
$pdf->SetFont('stsongstdlight', '', 12);
$pdf->SetTextColor(60,60,60);

/* IMPORTANT: use SetXY (not SetX) */
$pdf->SetXY($marginX + 4, $pdf->GetY());

$pdf->MultiCell(
    $pageWidth - 38, // width inside box
    5.5,
    "这个小镇是全国海拔最高的地方，也是世界著名锡兰红茶的主要产地。",
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
