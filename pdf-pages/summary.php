<?php
require_once __DIR__ . '/../assets/libs/tcpdf/tcpdf.php';

function outputSummaryPDF($days, $overlayText = 'Your Trip Adventure') {
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetMargins(0, 0, 0);
    $pdf->SetAutoPageBreak(false);
    $pdf->AddPage();

    // Left column width
    $leftWidth = 70;

    // Left column background image
    $bgImagePath = $days[0]['images'][0] ?? '';
    $bgImagePath = $bgImagePath ? __DIR__ . '/../uploads/cover_images/' . $bgImagePath : __DIR__ . '/../assets/images/default-cover.jpg';
    if (file_exists($bgImagePath)) {
        $pdf->Image($bgImagePath, 0, 0, $leftWidth, 297, '', '', '', false, 300);
    }

    // Overlay text
    $pdf->SetAlpha(0.7);
    $pdf->SetFont('times', 'B', 18);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetXY(5, 50);
    $pdf->MultiCell($leftWidth - 10, 0, $overlayText, 0, 'L', 0, 1, '', '', true);
    $pdf->SetAlpha(1);

    // Right column
    $pdf->SetXY($leftWidth + 10, 20);
    $pdf->SetFont('times', 'B', 24);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(0, 10, 'Trip Summary', 0, 1, 'L');

    $pdf->SetFont('times', '', 14);
    $pdf->Ln(5);

    foreach ($days as $day) {
        $dayNumber = $day['day'];
        $date = $day['date'];
        $city = "City ID: " . $day['city_id']; // Replace with actual city name if needed

        $pdf->SetFont('times', 'B', 16);
        $pdf->Cell(0, 8, "Day {$dayNumber}: {$date} - {$city}", 0, 1);

        $pdf->SetFont('times', '', 12);
        $description = strip_tags($day['description']);
        $pdf->MultiCell(0, 6, $description, 0, 'L', 0, 1);
        $pdf->Ln(3);
    }

    // Output PDF directly to browser
    $pdf->Output('summary.pdf', 'I');
}
