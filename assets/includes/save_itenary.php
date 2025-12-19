<?php
session_start();
include 'assets/includes/db_connect.php';
require_once __DIR__ . '/../libs/tcpdf/tcpdf.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* ============================
       BASIC DATA
    ============================ */
    $referenceNo = 'EV-' . strtoupper(uniqid());
    $nights = (int) filter_var($_POST['nights'], FILTER_SANITIZE_NUMBER_INT);

    $themeIds = array_filter(explode(',', $_GET['themes'] ?? ''));
    $cityIds  = array_filter(explode(',', $_GET['cities'] ?? ''));

    /* ============================
       SAVE TO DATABASE
    ============================ */
    $stmt = $conn->prepare("
        INSERT INTO itinerary_customer (
            reference_no, theme_ids, city_ids, start_date, end_date, nights,
            adults, children_6_11, children_above_11, infants,
            hotel_rating, meal_plan, allergy_issues, allergy_reason,
            pickup_location, dropoff_location, title, full_name, email,
            whatsapp_code, whatsapp, country, nationality, flight_number, remarks, vehicle_id
        ) VALUES (
            :reference_no, :theme_ids, :city_ids, :start_date, :end_date, :nights,
            :adults, :children_6_11, :children_above_11, :infants,
            :hotel_rating, :meal_plan, :allergy_issues, :allergy_reason,
            :pickup_location, :dropoff_location, :title, :full_name, :email,
            :whatsapp_code, :whatsapp, :country, :nationality, :flight_number, :remarks, :vehicle_id
        )
    ");

    $stmt->execute([
        ':reference_no' => $referenceNo,
        ':theme_ids' => json_encode($themeIds),
        ':city_ids' => json_encode($cityIds),
        ':start_date' => $_POST['start_date'],
        ':end_date' => $_POST['end_date'],
        ':nights' => $nights,
        ':adults' => $_POST['adults'],
        ':children_6_11' => $_POST['children_6_11'],
        ':children_above_11' => $_POST['children_above_11'],
        ':infants' => $_POST['infants'],
        ':hotel_rating' => $_POST['hotelRating'],
        ':meal_plan' => $_POST['mealPlan'],
        ':allergy_issues' => $_POST['mealAllergy'],
        ':allergy_reason' => $_POST['allergy_reason'] ?? null,
        ':pickup_location' => $_POST['pickupLocation'],
        ':dropoff_location' => $_POST['dropoffLocation'],
        ':title' => $_POST['title'],
        ':full_name' => $_POST['fullName'],
        ':email' => $_POST['email'],
        ':whatsapp_code' => $_POST['whatsappCode'],
        ':whatsapp' => $_POST['whatsapp'],
        ':country' => $_POST['country'],
        ':nationality' => $_POST['nationality'],
        ':flight_number' => $_POST['flightNumber'] ?? null,
        ':remarks' => $_POST['remarks'] ?? null,
        ':vehicle_id' => $_POST['vehicle_id']  
    ]);

    /* ============================
       FETCH THEME NAMES
    ============================ */
    $themeNames = [];
    if (!empty($themeIds)) {
        $placeholders = implode(',', array_fill(0, count($themeIds), '?'));
        $stmt = $conn->prepare("SELECT theme_name FROM tour_themes WHERE id IN ($placeholders)");
        $stmt->execute($themeIds);
        $themeNames = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /* ============================
       FETCH CITY NAMES
    ============================ */
    $cityNames = [];
    if (!empty($cityIds)) {
        $placeholders = implode(',', array_fill(0, count($cityIds), '?'));
        $orderBy = "ORDER BY FIELD(id," . implode(',', $cityIds) . ")";
        $stmt = $conn->prepare("SELECT id, name, images, key_activities, highlights FROM cities WHERE id IN ($placeholders) $orderBy");
        $stmt->execute($cityIds);
        $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $cities = [];
    }

    $themeList = !empty($themeNames) ? implode(', ', $themeNames) : 'N/A';
    $cityList  = !empty($cityNames) ? implode(', ', $cityNames) : 'N/A';

    $customerName = $_POST['title'] . ' ' . $_POST['fullName'];
    $days = $nights + 1;

    $data = [
        'reference' => $referenceNo,
        'name' => $customerName,
        'start' => $_POST['start_date'],
        'end' => $_POST['end_date'],
        'nights' => $nights,
        'days' => $days,
        'hotel' => $_POST['hotelRating'],
        'meal' => $_POST['mealPlan'],
        'pickup' => $_POST['pickupLocation'],
        'dropoff' => $_POST['dropoffLocation']
    ];

    /* ============================
       GENERATE PDF
    ============================ */
    $pdf = new TCPDF();
    $pdf->SetCreator('Explore Vacations');
    $pdf->SetAuthor('Explore Vacations');
    $pdf->SetTitle('Tour Itinerary - ' . $referenceNo);
    $pdf->SetMargins(15, 15, 15);

    require_once __DIR__ . '/../../pdf/itinerary-style.php';
    require_once __DIR__ . '/../../pdf/itinerary-cover.php';
    require_once __DIR__ . '/../../pdf/itinerary-summary.php';
    require_once __DIR__ . '/../../pdf/detailed-itinerary.php';
    require_once __DIR__ . '/../../pdf/map-page.php';
    require_once __DIR__ . '/../../pdf/customer-details.php';
    require_once __DIR__ . '/../../pdf/footer-details.php';

    /* ============================
       SAVE PDF
    ============================ */
    $pdfDir = __DIR__ . '/../../uploads/itineraries/';
    if (!is_dir($pdfDir)) {
        mkdir($pdfDir, 0775, true);
    }

    $pdfPathServer = $pdfDir . $referenceNo . '.pdf';
    $pdf->Output($pdfPathServer, 'F');

    $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    $_SESSION['pdf_to_download'] = $baseUrl . '/uploads/itineraries/' . $referenceNo . '.pdf';
    $_SESSION['itinerary_success'] = true;

    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
}
