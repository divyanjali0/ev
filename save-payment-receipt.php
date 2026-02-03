<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (empty($_POST['tour_id']) || !is_numeric($_POST['tour_id'])) exit('Invalid tour');
$tourId = (int)$_POST['tour_id'];

// Get tour reference number
$stmt = $conn->prepare("SELECT reference_no FROM itinerary_customer WHERE id=?");
$stmt->execute([$tourId]);
$ref = $stmt->fetchColumn();
if (!$ref) exit('Invalid tour reference');

// Base folder for this tour
$uploadBase = 'uploads/hotel_payments/' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $ref) . '/';
if (!is_dir($uploadBase)) mkdir($uploadBase, 0777, true);

// Process each hotel file
if (!empty($_FILES['hotel_payment'])) {
    foreach ($_FILES['hotel_payment']['name'] as $hotelId => $files) {

        // Get existing payments and hotel name
        $stmt = $conn->prepare("SELECT hotel_payment, hotel_name FROM hotel_expenses WHERE id=? AND history_id=?");
        $stmt->execute([$hotelId, $tourId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) continue;

        $hotelName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $row['hotel_name']);
        $existing = $row['hotel_payment'] ? json_decode($row['hotel_payment'], true) : [];

        $date = date('Ymd');
        $counter = count($existing) + 1; // start numbering after existing files

        // Ensure $files is an array
        if (!is_array($files)) $files = [$files];

        foreach ($files as $index => $filename) {
            if ($filename) {
                $tmpName = $_FILES['hotel_payment']['tmp_name'][$hotelId][$index] ?? null;
                if (!$tmpName || !file_exists($tmpName)) continue;

                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $newName = $hotelName . '_' . $date . '_' . $counter . '.' . $ext;
                move_uploaded_file($tmpName, $uploadBase . $newName);

                $existing[] = $uploadBase . $newName;
                $counter++;
            }
        }

        // Update DB
        $stmt = $conn->prepare("UPDATE hotel_expenses SET hotel_payment=? WHERE id=? AND history_id=?");
        $stmt->execute([json_encode($existing), $hotelId, $tourId]);
    }
}

header("Location: hotel-vouchers.php?tour_id=$tourId&uploaded=1");
exit;
