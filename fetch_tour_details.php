<?php
require_once __DIR__ . '/assets/includes/db_connect.php';

if (isset($_POST['itinerary_id'])) {
    $itineraryId = $_POST['itinerary_id'];

    // Fetch costing details
    $costingStmt = $conn->prepare("
        SELECT 
            agent_name, 
            grand_total, 
            hotel_total, 
            lunch_dinner, 
            trip_full_total 
        FROM costing 
        WHERE itinerary_id = :itinerary_id
    ");
    $costingStmt->execute([':itinerary_id' => $itineraryId]);
    $costing = $costingStmt->fetch(PDO::FETCH_ASSOC);

    // Fetch invoice details
    $invoiceStmt = $conn->prepare("
        SELECT 
            trip_total, 
            payment_status, 
            paid_amount 
        FROM customer_invoice 
        WHERE history_id = :itinerary_id
    ");
    $invoiceStmt->execute([':itinerary_id' => $itineraryId]);
    $invoice = $invoiceStmt->fetch(PDO::FETCH_ASSOC);

    // Fetch hotel expenses
    $hotelStmt = $conn->prepare("
        SELECT 
            hotel_name, 
            amount, 
            currency 
        FROM hotel_expenses 
        WHERE history_id = :itinerary_id
    ");
    $hotelStmt->execute([':itinerary_id' => $itineraryId]);
    $hotelExpenses = $hotelStmt->fetch(PDO::FETCH_ASSOC);

    // Return the response as JSON
    echo json_encode([
        'success' => true,
        'costing' => $costing,
        'invoice' => $invoice,
        'hotel_expenses' => $hotelExpenses
    ]);
} else {
    echo json_encode(['success' => false]);
}
