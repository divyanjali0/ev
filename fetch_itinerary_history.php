<?php
// Start session and DB connection
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

// Enable error logging
ini_set('log_errors', 1);
ini_set('error_log', 'C:\\xampp\\htdocs\\ev\\error.log');
error_reporting(E_ALL); // log all errors


try {
    if (!isset($_POST['itinerary_id'])) {
        echo json_encode([]);
        exit;
    }

    $itinerary_id = intval($_POST['itinerary_id']);

    // Fetch history with editor name
    $stmt = $conn->prepare("
        SELECT ich.*, u.name as edited_by_name 
        FROM itinerary_customer_history ich
        LEFT JOIN users u ON u.id = ich.edited_by
        WHERE ich.itinerary_id = :id
        ORDER BY ich.version_number DESC
    ");
    $stmt->execute(['id' => $itinerary_id]);
    $history = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($history);

} catch (Exception $e) {
    // Log the error to error.log
    error_log("Error in fetch_itinerary_history.php: " . $e->getMessage());
    echo json_encode([]);
}
?>