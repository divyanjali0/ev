<?php
/** @var TCPDF $pdf */
/** @var array $cities */
/** @var string $assetRoot */

require_once __DIR__ . '/footer-details.php';

addNewStyledPage($pdf);


$pdf->SetFont('helvetica', 'B', 18);
$pdf->SetTextColor(0,153,218);
$pdf->Cell(0, 12, 'Tour Map', 0, 1, 'L');
$pdf->Ln(6);


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

$googleApiKey = "AIzaSyBl50Q8W4ZF2_EkOJ1lnRoVxO1IdjIupjM"; 
$cityCoords = [];
$markers = [];

foreach ($cities as $index => $city) {
    $coord = getCityCoordinates($city['name'], $googleApiKey);
    if($coord){
        $latLng = $coord['lat'] . ',' . $coord['lng'];
        $cityCoords[] = $latLng;
        $label = ($index + 1) % 10; 
        $markers[] = "color:red|label:$label|$latLng";
    }
}


if (!empty($cityCoords)) {
    $path = implode('|', $cityCoords);
    $mapUrl = "https://maps.googleapis.com/maps/api/staticmap?"
        . "size=600x400"
        . "&maptype=roadmap"
        . "&markers=" . implode('&markers=', $markers)   
        . "&path=color:0x0000ff|weight:3|" . urlencode($path)
        . "&key=$googleApiKey";

    $mapImage = $assetRoot . 'temp_map.png';
    if(downloadMapImage($mapUrl, $mapImage) && file_exists($mapImage)){
        $pdf->Image($mapImage, 15, $pdf->GetY(), $pdf->getPageWidth() - 30, 0); 
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

addFooter(
    $pdf,'+94 76 1414 554','info@explorevacations.lk','explore.vacations'
);