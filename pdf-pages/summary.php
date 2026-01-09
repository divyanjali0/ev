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
    $pdf->SetFont('roboto', 'B', 24);
    $pdf->SetTextColor(0, 102, 204);
    $pdf->Cell($leftWidth - $margin, 12, 'Trip Summary', 0, 1, 'L');
    $pdf->Ln(5);

    foreach ($days as $day) {
        $dayNumber = $day['day'];
        $date = $day['date'];
        $cityId = $day['city_id'];
        $cityName = $cityNames[(string)$cityId] ?? "City ID: $cityId";
        $mealPlan = trim($day['meal_plan'] ?? '');
        $descriptionHtml = $day['description'] ?? '';
        $images = $day['images'] ?? [];

        $startY = $pdf->GetY();

        // ---------------- Day Box ----------------
        $pdf->SetFillColor(0, 102, 204);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('roboto', 'B', 14);
        $pdf->MultiCell(15, 15, "Day {$dayNumber}", 1, 'C', 1, 0);

        // ---------------- Details ----------------
        $pdf->SetXY($margin + 20, $startY);

        // Date bold - City italic
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('roboto', 'B', 12);
        $pdf->Write(6, $date);
        $pdf->SetFont('roboto', 'I', 12);
        $pdf->Write(6, " - {$cityName}");
        $pdf->Ln(7);

        // Meal plan
        if ($mealPlan !== '') {
            $pdf->SetFont('roboto', '', 11);
            $pdf->Cell(3, 5, "•", 0, 0, '', false, '', 0, false, 'T', 'M');
            $pdf->MultiCell(0, 5, " Meal Plan: {$mealPlan}", 0, 'L', 0, 1);
            $pdf->Ln(2);
        }

        // Description
        if ($descriptionHtml) {
            $descriptionText = strip_tags(
                str_replace(['<li>', '</li>', '<ul>', '</ul>'], ["\n - ", "\n", "", ""], $descriptionHtml)
            );
            $pdf->SetFont('roboto', '', 11);
            $pdf->MultiCell($leftWidth - 25, 5, trim($descriptionText), 0, 'L', 0, 1);
            $pdf->Ln(2);
        }

        // ---------------- Images (max 3, 2 per row, left aligned) ----------------
        if (!empty($images)) {
            $thumbWidth = 45;
            $thumbHeight = 30;
            $thumbX = $margin + 20;
            $thumbY = $pdf->GetY() + 2;
            $count = 0;

            foreach ($images as $img) {
                if ($count >= 3) break;
                $imgPath = __DIR__ . '/../uploads/city_images/' . $img;
                if (file_exists($imgPath)) {
                    $pdf->Image($imgPath, $thumbX, $thumbY, $thumbWidth, $thumbHeight);
                    $count++;
                    // Two per row
                    if ($count % 2 == 0) {
                        $thumbX = $margin + 20;
                        $thumbY += $thumbHeight + 5;
                    } else {
                        $thumbX += $thumbWidth + 5;
                    }
                }
            }
            $pdf->SetY($thumbY + $thumbHeight + 2);
        }

        $pdf->Ln(8); // Space before next day
    }

    // ---------------- RIGHT COLUMN (Background + Overlay + Logo) ----------------
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
    $pdf->SetFont('roboto', 'B', 18);
    $pdf->SetTextColor(255, 255, 255);
    $overlayY = ($pageHeight / 2) - 10;
    $pdf->SetXY($rightX + 5, $overlayY);
    $pdf->MultiCell($rightWidth - 10, 0, $overlayText, 0, 'C', 0, 1, '', '', true);
    $pdf->SetAlpha(1);

    // Vertical separator
    $pdf->SetDrawColor(200, 200, 200);
    $pdf->SetLineWidth(0.3);
    $pdf->Line($leftWidth, 0, $leftWidth, $pageHeight);
}
