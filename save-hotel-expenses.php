<?php
require_once __DIR__ . '/assets/includes/db_connect.php';

$historyId = (int)$_POST['history_id'];
$uploadDir = 'uploads/hotel_receipts/';

if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

$submittedIds = array_filter($_POST['hotel_id']);

if ($submittedIds) {
    $placeholders = implode(',', array_fill(0, count($submittedIds), '?'));
    $stmt = $conn->prepare("
        DELETE FROM hotel_expenses
        WHERE history_id = ?
        AND id NOT IN ($placeholders)
    ");
    $stmt->execute(array_merge([$historyId], $submittedIds));
} else {
    $stmt = $conn->prepare("DELETE FROM hotel_expenses WHERE history_id=?");
    $stmt->execute([$historyId]);
}

foreach ($_POST['hotel_name'] as $i => $hotel) {

    $hotelId = $_POST['hotel_id'][$i] ?? null;
    $receiptPath = null;

    if (!empty($_FILES['receipt']['name'][$i])) {
        $fileName = uniqid().'_'.basename($_FILES['receipt']['name'][$i]);
        move_uploaded_file($_FILES['receipt']['tmp_name'][$i], $uploadDir.$fileName);
        $receiptPath = $uploadDir.$fileName;
    }

    if ($hotelId) {
        if ($receiptPath) {
            $stmt = $conn->prepare("
                UPDATE hotel_expenses
                SET hotel_name=?, amount=?, currency=?, receipt_path=?
                WHERE id=? AND history_id=?
            ");
            $stmt->execute([
                $hotel,
                $_POST['amount'][$i],
                $_POST['currency'][$i],
                $receiptPath,
                $hotelId,
                $historyId
            ]);
        } else {
            $stmt = $conn->prepare("
                UPDATE hotel_expenses
                SET hotel_name=?, amount=?, currency=?
                WHERE id=? AND history_id=?
            ");
            $stmt->execute([
                $hotel,
                $_POST['amount'][$i],
                $_POST['currency'][$i],
                $hotelId,
                $historyId
            ]);
        }
    } else {
        $stmt = $conn->prepare("
            INSERT INTO hotel_expenses
            (history_id, hotel_name, amount, currency, receipt_path)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $historyId,
            $hotel,
            $_POST['amount'][$i],
            $_POST['currency'][$i],
            $receiptPath
        ]);
    }
}

header("Location: upload-hotel-vouchers.php");
exit;
