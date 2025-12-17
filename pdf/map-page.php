<?php
/** @var TCPDF $pdf */
/** @var array $cities */
/** @var string $assetRoot */

addNewStyledPage($pdf);

// ======================
// Page Title
// ======================
$pdf->SetFont('helvetica', 'B', 18);
$pdf->SetTextColor(0,153,218);
$pdf->Cell(0, 12, 'Tour Map', 0, 1, 'L');
$pdf->Ln(6);

// ======================
// Helper function to get coordinates from city name
// ======================
function getCityCoordinates($cityName, $apiKey) {
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($cityName) . "&key=$apiKey";
    $response = file_get_contents($url);
    if(!$response) return null;

    $data = json_decode($response, true);
    if(!empty($data['results'][0]['geometry']['location'])){
        return $data['results'][0]['geometry']['location'];
    }
    return null;
}

// ======================
// Download map image using cURL
// ======================
function downloadMapImage($url, $savePath) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $imageData = curl_exec($ch);
    curl_close($ch);

    if ($imageData) {
        file_put_contents($savePath, $imageData);
        return true;
    }
    return false;
}

// ======================
// Collect city coordinates
// ======================
$googleApiKey = "AIzaSyBl50Q8W4ZF2_EkOJ1lnRoVxO1IdjIupjM"; 
$cityCoords = [];

foreach ($cities as $city) {
    $coord = getCityCoordinates($city['name'], $googleApiKey);
    if($coord){
        $cityCoords[] = $coord['lat'] . ',' . $coord['lng'];
    }
}

// ======================
// Generate Static Map URL
// ======================
if (!empty($cityCoords)) {
    $markers = implode('|', $cityCoords);
    $path = implode('|', $cityCoords);

    $mapUrl = "https://maps.googleapis.com/maps/api/staticmap?"
        . "size=600x400"
        . "&maptype=roadmap"
        . "&markers=color:red|" . urlencode($markers)
        . "&path=color:0x0000ff|weight:3|" . urlencode($path)
        . "&key=$googleApiKey";

    $mapImage = $assetRoot . 'temp_map.png';
    if(downloadMapImage($mapUrl, $mapImage) && file_exists($mapImage)){
        $pdf->Image($mapImage, 15, $pdf->GetY(), $pdf->getPageWidth() - 30, 0); // full width with 15px margin
        $pdf->Ln(6);
    } else {
        $pdf->SetFont('helvetica', 'I', 12);
        $pdf->SetTextColor(150,150,150);
        $pdf->MultiCell(0, 6, "Map could not be loaded.", 0, 'C');
    }
} else {
    $pdf->SetFont('helvetica', 'I', 12);
    $pdf->SetTextColor(150,150,150);
    $pdf->MultiCell(0, 6, "No city coordinates available to generate map.", 0, 'C');
}
