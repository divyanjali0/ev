<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    echo 'Unauthorized';
    exit;
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Update the tour_status to 'Complete'
    $sql = "UPDATE itinerary_customer SET tour_status = 'Complete' WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
