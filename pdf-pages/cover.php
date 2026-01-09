<?php
require_once __DIR__ . '/../assets/libs/tcpdf/tcpdf.php';

function outputCoverPDF($cover) {
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetMargins(0, 0, 0);
    $pdf->SetAutoPageBreak(false);
    $pdf->AddPage();

    // Cover image
    $imagePath = !empty($cover['image']) 
        ? __DIR__ . '/../uploads/cover_images/' . $cover['image'] 
        : __DIR__ . '/../assets/images/default-cover.jpg';
    if (file_exists($imagePath)) {
        $pdf->Image($imagePath, 0, 0, 210, 297, '', '', '', false, 300);
    }

    // Light overlay
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetAlpha(0.3);
    $pdf->Rect(0, 0, 210, 297, 'F');
    $pdf->SetAlpha(1);

    // Logo
    $logoPath = __DIR__ . '/../assets/images/logo.png';
    if (file_exists($logoPath)) {
        $pdf->Image($logoPath, 165, 15, 30);
    }

    // Text
    $pdf->SetFont('times', 'I', 28);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(20, 35);
    $pdf->Cell(0, 12, $cover['trip_name'] ?? 'Explore', 0, 1, 'L');

    $pdf->SetFont('times', 'B', 56);
    $pdf->SetXY(20, 50);
    $pdf->Cell(0, 22, strtoupper($cover['heading'] ?? 'OSAKA'), 0, 1, 'L');

    $pdf->SetFont('times', 'I', 26);
    $pdf->SetXY(20, 80);
    $pdf->Cell(0, 12, $cover['sub_heading'] ?? 'In 4 Days', 0, 1, 'L');

    // Output PDF directly to browser
    $pdf->Output('cover.pdf', 'I'); // 'I' = inline display
}
