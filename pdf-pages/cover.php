<?php
require_once __DIR__ . '/../assets/libs/tcpdf/tcpdf.php';

/**
 * Generate a cover page for a PDF.
 * 
 * @param TCPDF $pdf      TCPDF instance
 * @param array $cover    Cover page data ['trip_name', 'heading', 'sub_heading', 'image']
 */
function generateCoverPage($pdf, $cover = [])
{
    // ================= COVER IMAGE =================
    $imagePath = !empty($cover['image'])
        ? __DIR__ . '/../uploads/cover_images/' . $cover['image']
        : __DIR__ . '/../assets/images/default-cover.jpg';

    if (!file_exists($imagePath)) {
        throw new Exception('Cover image not found.');
    }

    // ================= NEW PAGE =================
    $pdf->AddPage();

    // ================= FULL SCREEN IMAGE =================
    $pdf->Image(
        $imagePath,
        0,
        0,
        210,
        297,
        '',
        '',
        '',
        false,
        300
    );

    // ================= SIMPLE LIGHT OVERLAY =================
    $pdf->SetFillColor(255, 255, 255); // white overlay
    $pdf->SetAlpha(0.20);              // light transparency
    $pdf->Rect(0, 0, 210, 297, 'F');
    $pdf->SetAlpha(1);                 // reset opacity

    // ================= LOGO (TOP RIGHT) =================
    $logoPath = __DIR__ . '/../assets/images/logo.png';
    if (file_exists($logoPath)) {
        $pdf->Image($logoPath, 165, 15, 30);
    }

    // ================= TEXT OVER IMAGE =================

    // --- Explore ---
    $pdf->SetFont('times', 'I', 28);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(20, 35);
    $pdf->Cell(0, 12, $cover['trip_name'] ?? 'Explore', 0, 1, 'L');

    // --- MAIN TITLE ---
    $pdf->SetFont('times', 'B', 56);
    $pdf->SetXY(20, 50);
    $pdf->Cell(0, 22, strtoupper($cover['heading'] ?? 'OSAKA'), 0, 1, 'L');

    // --- SUB TITLE ---
    $pdf->SetFont('times', 'I', 26);
    $pdf->SetXY(20, 80);
    $pdf->Cell(0, 12, $cover['sub_heading'] ?? 'In 4 Days', 0, 1, 'L');
}
