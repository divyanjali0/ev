<?php
require_once __DIR__ . '/../assets/libs/tcpdf/tcpdf.php';

function addSummaryPage($pdf, $days, $overlayText = 'Your Trip Adventure', $cityNames = []) {
    $pdf->AddPage();

    $pageWidth = 210;
    $pageHeight = 297;
    $margin = 10;

    $leftWidth = $pageWidth * 2 / 3;
    $rightWidth = $pageWidth - $leftWidth;

    // ---------------- LEFT COLUMN ----------------
    $pdf->SetXY($margin, $margin);

    // Heading
    $pdf->SetFont('times', 'B', 24);
    $pdf->SetTextColor(0, 102, 204);
    $pdf->Cell($leftWidth - $margin, 12, 'Trip Summary', 0, 1, 'L');
    $pdf->Ln(5);

    foreach ($days as $day) {
        $dayNumber = $day['day'];
        $date = $day['date'];

        // Lookup city name if available
        $cityId = $day['city_id'];
        $cityName = $cityNames[$cityId] ?? "City ID: $cityId";

        // Meal plan and description
        $mealPlan = trim($day['meal_plan'] ?? '');
        $descriptionHtml = $day['description'] ?? '';

        // Save Y for consistent box height
        $startY = $pdf->GetY();

        // Day Box
        $pdf->SetFillColor(0, 102, 204);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('times', 'B', 14);
        $pdf->MultiCell(15, 15, "Day {$dayNumber}", 1, 'C', 1, 0);

        // Details next to box
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('times', '', 12);
        $pdf->SetXY($margin + 20, $startY);

        // Date and City Name
        $pdf->MultiCell($leftWidth - 25, 6, "{$date} - {$cityName}", 0, 'L', 0, 1);

        // Meal plan bullets
        if ($mealPlan !== '') {
            $pdf->SetFont('times', '', 11);
            $pdf->SetX($margin + 25);
            $pdf->Cell(3, 5, chr(149), 0, 0);
            $pdf->MultiCell(0, 5, " Meal Plan: {$mealPlan}", 0, 'L', 0, 1);
        }

        // Description (render simple HTML to plain text)
        if ($descriptionHtml) {
            // convert small HTML lists/paragraphs into text
            $descriptionText = strip_tags(
                str_replace(['<li>', '</li>', '<ul>', '</ul>'], ["\n - ", "\n", "", ""], $descriptionHtml)
            );

            $pdf->Ln(2);
            $pdf->SetFont('times', '', 11);
            $pdf->MultiCell($leftWidth - 25, 5, trim($descriptionText), 0, 'L', 0, 1);
        }

        $pdf->Ln(8); // space before next day
    }

    // ---------------- RIGHT COLUMN (Image + Overlay + Logo) ----------------
    $rightX = $leftWidth;
    $rightY = 0;

    $bgImagePath = __DIR__ . '/../assets/images/summary.jpg';
    if (file_exists($bgImagePath)) {
        $pdf->Image($bgImagePath, $rightX, $rightY, $rightWidth, $pageHeight, '', '', '', false, 300);
    }

    $logoPath = __DIR__ . '/../assets/images/logo.png';
    if (file_exists($logoPath)) {
        $pdf->Image($logoPath, $rightX + 5, $rightY + 5, 30);
    }

    $pdf->SetAlpha(0.7);
    $pdf->SetFont('times', 'B', 18);
    $pdf->SetTextColor(255, 255, 255);
    $overlayY = ($pageHeight / 2) - 10;
    $pdf->SetXY($rightX + 5, $overlayY);
    $pdf->MultiCell($rightWidth - 10, 0, $overlayText, 0, 'C', 0, 1, '', '', true);
    $pdf->SetAlpha(1);

    $pdf->SetDrawColor(200, 200, 200);
    $pdf->SetLineWidth(0.3);
    $pdf->Line($leftWidth, 0, $leftWidth, $pageHeight);
}
