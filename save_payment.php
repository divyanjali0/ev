<?php
require_once __DIR__ . '/assets/includes/db_connect.php';

$invoiceId = (int)$_POST['invoice_id'];
$type      = $_POST['payment_type'];
$amount    = $type === 'partial' ? (float)$_POST['amount'] : null;
$paidOn    = $_POST['paid_on'];
$refNo     = $_POST['reference_no'];

// Get invoice total
$stmt = $conn->prepare("SELECT JSON_EXTRACT(tour_cost,'$.total') FROM itinerary_customer_history h
JOIN customer_invoice c ON c.history_id=h.id WHERE c.id=?");
$stmt->execute([$invoiceId]);
$total = (float)$stmt->fetchColumn();

$finalAmount = $type === 'full' ? $total : $amount;

// Structured folder: uploads/receipts/{ref}/{paid_on}/
$dir = "uploads/receipts/{$refNo}/{$paidOn}/";
if (!is_dir($dir)) mkdir($dir, 0777, true);

$name = uniqid('rcpt_') . '.' . pathinfo($_FILES['receipt']['name'], PATHINFO_EXTENSION);
$path = $dir . $name;
move_uploaded_file($_FILES['receipt']['tmp_name'], $path);

// Save receipt
$conn->prepare("
    INSERT INTO payment_receipt (invoice_id,payment_type,amount,receipt_path,paid_on)
    VALUES (?,?,?,?,?)
")->execute([$invoiceId,$type,$finalAmount,$path,$paidOn]);

// Update invoice with cumulative paid amount
$stmt = $conn->prepare("SELECT SUM(amount) FROM payment_receipt WHERE invoice_id=?");
$stmt->execute([$invoiceId]);
$cumulativePaid = (float)$stmt->fetchColumn();

$paymentStatus = $cumulativePaid >= $total ? 'full' : 'partial';

$conn->prepare("
    UPDATE customer_invoice
    SET payment_status=?, paid_amount=?, payment_date=?
    WHERE id=?
")->execute([$paymentStatus, $cumulativePaid, $paidOn, $invoiceId]);

header("Location: customer-invoice.php?payment_saved=1");
