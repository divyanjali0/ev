<?php
require_once __DIR__ . '/assets/includes/db_connect.php';
require_once __DIR__ . '/vendor/autoload.php'; // mPDF

if (!isset($_GET['id'])) exit('Missing ID');

$id = $_GET['id'];

// Fetch latest version
$stmt = $conn->prepare("
    SELECT * FROM itinerary_customer_history 
    WHERE itinerary_id = :id 
    ORDER BY version_number DESC 
    LIMIT 1
");
$stmt->execute(['id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$data) exit("No data found");

// Decode JSON
$days   = json_decode($data['day_city_details'], true);
$hotels = json_decode($data['hotels'], true);
$cost   = json_decode($data['tour_cost'], true);
$terms  = json_decode($data['terms_conditions'], true);
$cover  = json_decode($data['cover_page'], true);

$mpdf = new \Mpdf\Mpdf([
    'margin_left' => 5,
    'margin_right' => 5,
    'margin_top' => 5,
    'margin_bottom' => 5
]);

// --- Footer for all pages ---
$mpdf->SetHTMLFooter('
<div style="text-align:center; font-size:10px;">
No. 371/5, Negombo Road, Seeduwa, Sri Lanka | Tel: +94 761 414 552 | Email: info@explorevacations.lk | Web: www.explorevacations.lk
</div>
');

// --- HTML template ---
$html = '
<html>
<head>
<style>
@page {
    margin: 10mm;
}

/* Full page border */
.full-page-border {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 1.5px solid #000;
    box-sizing: border-box;
    z-index: -1;
}

/* Page content: leave space for footer and logo */
.page-content {
    padding: 8mm 8mm 20mm 8mm; /* top padding for logo, bottom padding for footer */
    box-sizing: border-box;
}

/* Company logo on top of every page */
.page-logo {
    text-align: center;
    margin-bottom: 10px;
}
.page-logo img {
    height: 30px;
}

/* Cover Page specific */
.cover-title { text-align: center; font-size: 28px; font-weight: bold; margin-top: 18px; }
.cover-heading { text-align: center; font-size: 18px; font-weight: bold; margin-top: 3px; }
.cover-subheading { text-align: center; font-size: 14px; font-style: italic; margin-top: 8px; }
.cover-image { text-align: center; margin-top: 30px; }
.cover-image img { width: 70%; height: auto; }
.cover-description { margin-top: 14px; font-size: 14px; text-align: justify; line-height: 22px; }

/* Section titles */
.section-title { font-size: 16px; font-weight: bold; margin-top: 10px; margin-bottom: 8px; color: #09498eff; }

/* Table styling */
table { border-collapse: collapse; width: 100%; font-size: 12px; margin-bottom: 8px; }
table, th, td { border: 1px solid black; padding: 3px; text-align: left; }

</style>
</head>
<body>
<div class="full-page-border"></div>
<div class="page-content">

<!-- Company logo -->
<div class="page-logo">
    <img src="'. __DIR__ . '/assets/images/pdf-logo.png" />
</div>

<!-- Cover Page -->
<div class="cover-title">'. ($cover['trip_name'] ?? '') .'</div>
<div class="cover-heading">'. ($cover['heading'] ?? '') .'</div>
<div class="cover-subheading">'. ($cover['sub_heading'] ?? '') .'</div>';

if (!empty($cover['image']) && file_exists(__DIR__ . '/uploads/cover_images/' . $cover['image'])) {
    $html .= '<div class="cover-image">
        <img src="'. __DIR__ . '/uploads/cover_images/' . $cover['image'] .'" />
    </div>';
}

$html .= '<div class="cover-description">'. ($cover['description'] ?? '') .'</div>';

$html .= '</div>'; 

// --- Destinations ---
$html .= '<pagebreak />
<div class="full-page-border"></div>
<div class="page-content">
<div class="page-logo">
    <img src="'. __DIR__ . '/assets/images/pdf-logo.png" />
</div>
<div class="section-title">Destinations</div>';

foreach ($days as $day) {
    $dayNumber = $day['day'] ?? '';
    $date = $day['date'] ?? '';
    $mealPlan = $day['meal_plan'] ?? '';

    // Display Day : Date : Meal Plan
    $html .= '<div style="font-weight:bold; margin-bottom:5px;">Day '. $dayNumber .' : '. $date .' : '. $mealPlan .'</div>';

    // Description
    $description = $day['description'] ?? '';
    $html .= '<div style="margin-bottom:10px; font-size:12px;">'. $description .'</div>';

    // Images in 3x3 grid
    if (!empty($day['images'])) {
        $html .= '<div style="width:100%; overflow:hidden; text-align:center; margin-bottom:10px;">';
        foreach ($day['images'] as $img) {
            $imgPath = __DIR__ . '/uploads/city_images/' . $img;
            if (file_exists($imgPath)) {
                $html .= '<div style="float:left; width:33.33%; text-align:center; margin:0; padding:0; display:flex; justify-content:center; align-items:center; height:120px;">
                    <img src="'. $imgPath .'" style="max-width:100%; max-height:100%; display:block; margin:0; padding:0; object-fit:cover;" />
                </div>';
            }
        }
        $html .= '<div style="clear:both;"></div>'; // clear float
        $html .= '</div>'; // end images container
    }
}

$html .= '</div>'; // end page-content for destinations

// --- Hotels ---
$html .= '<pagebreak />
<div class="full-page-border"></div>
<div class="page-content">
<div class="page-logo">
    <img src="'. __DIR__ . '/assets/images/pdf-logo.png" />
</div>
<div class="section-title">Hotels</div>';

foreach ($hotels as $day_num => $hotel) {
    $html .= '<div>Day '. $day_num . ': ' . $hotel['name'] . ' - ' . $hotel['link'] . '</div>';
}

$html .= '</div>'; // end page-content for hotels

// --- Tour Cost ---
$html .= '<pagebreak />
<div class="full-page-border"></div>
<div class="page-content">
<div class="page-logo">
    <img src="'. __DIR__ . '/assets/images/pdf-logo.png" />
</div>
<div class="section-title">Tour Cost</div>
<table>
<tr>
<th>Title</th><th>Pax</th><th>Vehicle</th><th>Meal Plan</th><th>Hotel Category</th><th>Room Type</th><th>Currency</th><th>Total</th>
</tr>
<tr>
<td>'. $cost['title'] .'</td>
<td>'. $cost['pax'] .'</td>
<td>'. $cost['vehicle'] .'</td>
<td>'. $cost['meal_plan'] .'</td>
<td>'. $cost['hotel_category'] .'</td>
<td>'. $cost['room_type'] .'</td>
<td>'. $cost['currency'] .'</td>
<td>'. $cost['total'] .'</td>
</tr>
</table>
</div>'; // end page-content for tour cost

// --- Terms & Conditions ---
$html .= '<pagebreak />
<div class="full-page-border"></div>
<div class="page-content">
<div class="page-logo">
    <img src="'. __DIR__ . '/assets/images/pdf-logo.png" />
</div>
<div class="section-title">Cost Includes</div>
<div>'. ($terms['includes'] ?? '') .'</div>

<div class="section-title">Cost Excludes</div>
<div>'. ($terms['excludes'] ?? '') .'</div>

<div class="section-title">Additional Info</div>
<div>'. ($terms['ps'] ?? '') .'</div>
<div>'. ($terms['dress_code'] ?? '') .'</div>
<div>'. ($terms['notice'] ?? '') .'</div>

</div>'; // end page-content for terms

// Write PDF
$mpdf->WriteHTML($html);

// Save PDF
$dir = __DIR__ . '/uploads/pdfs/';
if (!file_exists($dir)) mkdir($dir, 0777, true);

$fileName = 'itinerary_' . $id . '_v' . $data['version_number'] . '.pdf';
$filePath = $dir . $fileName;

$mpdf->Output($filePath, 'F');

// Update DB
$update = $conn->prepare("UPDATE itinerary_customer_history SET pdf_path = :pdf WHERE history_id = :vid");
$update->execute([
    'pdf' => 'uploads/pdfs/' . $fileName,
    'vid' => $data['history_id']
]);

header("Location: revised-itenary.php?pdf=created");
exit;
