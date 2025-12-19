<?php
/** @var TCPDF $pdf */
/** @var array $data */
/** @var string $assetRoot */

require_once __DIR__ . '/footer-details.php';

$pdf->SetTopMargin(10);
addNewStyledPage($pdf);

$pageWidth = $pdf->getPageWidth();
$marginLeft = 15;   
$gap = 10;          


$logoPath = $assetRoot . 'images/logo.png';
$logoWidth = 20;
$logoHeight = 0;
if (file_exists($logoPath)) {
    $pdf->Image($logoPath, $pageWidth - 15 - $logoWidth, 10, $logoWidth, $logoHeight);
}

function addSection($pdf, $title, $items, $titleColor = [0, 102, 204]) {
    // Header
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->SetTextColor($titleColor[0], $titleColor[1], $titleColor[2]);
    $pdf->Cell(0, 10, $title, 0, 1);

    // Content
    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetTextColor(0, 0, 0);

    foreach ($items as $item) {
        if ($pdf->GetY() + 12 > $pdf->getPageHeight() - $pdf->getMargins()['bottom']) {
            $pdf->AddPage();
        }
        $pdf->MultiCell(0, 6, "• " . $item, 0, 'L', 0, 1, '', '', true);
    }

    $pdf->Ln(5);
}

// Inclusions
$inclusions = [
    "Airport pick up",
    "Assistance at the Airport",
    "Accommodation on dinner & breakfast basis on mentioned hotels below",
    "Private semi-luxury car (air-conditioned)",
    "Private English Speaking Chauffeur for the entire journey",
    "Ceylon Gem Factory visit",
    "Sri Lanka Handicraft factory visit",
    "Tea plantation visit & factory visit – Free tea tasting",
    "All government taxes related to the traveling destination are included",
    "Fuel & local insurance for the vehicle",
    "Airport drop off",
    "*Note: All rooms and tickets are subjected to availability.",
    "*Note: Travel durations listed in this itinerary are subjected to change, due to road, traffic & weather conditions. These suggested durations are estimated point to point without any stops. This is only a guideline for your understanding.",
];

addSection($pdf, 'Inclusions', $inclusions, [0, 102, 204]);

// Exclusions
$exclusions = [
    "Air tickets NOT included",
    "Meals not mentioned in the itinerary",
    "Camera & video permits",
    "Travel Insurance",
    "Guide/Driver tips",
    "Personal expenses",
    "Late check-outs & early check-in charges",
    "Early check in or late check out at all hotels based on availability"
];

addSection($pdf, 'Exclusions', $exclusions, [204, 0, 0]);

// Cancellation Policy
$cancellation = [
    "In case of cancellation, the following cancellation charges will be applicable:",
    "• Cancellations made prior 30 days from the scheduled start of a tour, 70% of total tour fee will be refunded.",
    "• Cancellations made with less than 30 days from the start of a tour - Zero refund.",
    "• No Show - Zero refund."
];

addSection($pdf, 'Cancellation Policy at Explore Vacations', $cancellation, [0, 102, 102]);

addFooter(
    $pdf,'+94 76 1414 554','info@explorevacations.lk','explore.vacations'
);