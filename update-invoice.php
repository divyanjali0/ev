<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';
require_once __DIR__ . '/assets/libs/tcpdf/tcpdf.php';
require_once __DIR__ . '/vendor/autoload.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

/* ---------------- INPUT ---------------- */
$historyId  = (int)$_POST['history_id'];
$roomType   = trim($_POST['room_type']);
$mealBasis  = trim($_POST['meal_basis']);
$driverType = trim($_POST['driver_type']);

/* ---------------- FETCH ITINERARY ---------------- */
$stmt = $conn->prepare("SELECT * FROM itinerary_customer_history WHERE id=?");
$stmt->execute([$historyId]);
$invoice = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$invoice) {
    die("Invalid itinerary reference");
}

/* ---------------- SIGNATURE UPLOAD ---------------- */
$signDir = __DIR__ . '/uploads/signatures/';
if (!is_dir($signDir)) mkdir($signDir, 0777, true);

$signExt = pathinfo($_FILES['signature']['name'], PATHINFO_EXTENSION);
$signName = uniqid('sign_') . '.' . $signExt;
$signPath = 'uploads/signatures/' . $signName;

move_uploaded_file($_FILES['signature']['tmp_name'], __DIR__ . '/' . $signPath);

/* ---------------- TOUR COST ---------------- */
$tourCost = json_decode($invoice['tour_cost'], true);
$currency = $tourCost['currency'];
$total    = number_format($tourCost['total'], 2);
$pax      = $tourCost['pax'];

/* ---------------- TCPDF ---------------- */
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetMargins(15, 15, 15);
$pdf->SetAutoPageBreak(TRUE, 15);
$pdf->AddPage();
$pdf->SetFont('times', '', 11);

/* ---------------- PDF CONTENT ---------------- */
$durationDays = $invoice['nights'] + 1;
$html = <<<HTML
<h3 style="text-align:center;">INVOICE</h3>

<table width="100%" cellpadding="4">
<tr>
<td width="60%">
<strong>Invoice To:</strong> {$invoice['full_name']}<br>
<strong>Tour Start:</strong> {$invoice['start_date']}<br>
<strong>Tour End:</strong> {$invoice['end_date']}
</td>
<td width="40%">
<strong>Invoice No:</strong> {$invoice['reference_no']}<br>
<strong>Nights:</strong> {$invoice['nights']}<br>
<strong>Pax:</strong> {$pax}
</td>
</tr>
</table>

<br>

<p>Being cost of <strong>{$invoice['nights']} Nights / {$durationDays} Days</strong> tour in Sri Lanka,
Hotel accommodation in <strong>{$roomType}</strong> rooms on <strong>{$mealBasis}</strong> basis,
A/C car with <strong>{$driverType}</strong> speaking chauffeur.
</p>

<table border="1" cellpadding="5" width="100%">
<tr>
<th>Room Type</th>
<th>Nights / Days</th>
<th>Pax</th>
<th>Total</th>
</tr>
<tr>
<td>{$roomType}</td>
<td>{$invoice['nights']} / {$durationDays}</td>
<td>{$pax}</td>
<td>{$currency} {$total}</td>
</tr>
</table>

<br><br>

<strong>Total Amount:</strong> {$currency} {$total}<br><br>

<table width="100%">
<tr>
<td></td>
<td align="center">
<img src="{$signPath}" width="120"><br>
<strong>Authorized Signatory</strong>
</td>
</tr>
</table>
HTML;


$pdf->writeHTML($html, true, false, true, false, '');

/* ---------------- SAVE PDF ---------------- */
$pdfDir = __DIR__ . '/uploads/invoices/';
if (!is_dir($pdfDir)) mkdir($pdfDir, 0777, true);

$pdfName = 'invoice_' . $invoice['reference_no'] . '.pdf';
$pdfPath = 'uploads/invoices/' . $pdfName;

$pdf->Output(__DIR__ . '/' . $pdfPath, 'F');

/* ---------------- SAVE DB ---------------- */
$stmt = $conn->prepare("
    INSERT INTO customer_invoice
    (history_id, room_type, meal_basis, driver_type, signature_path, pdf_path)
    VALUES (?, ?, ?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE
        room_type = VALUES(room_type),
        meal_basis = VALUES(meal_basis),
        driver_type = VALUES(driver_type),
        signature_path = VALUES(signature_path),
        pdf_path = VALUES(pdf_path)
");

$stmt->execute([
    $historyId,
    $roomType,
    $mealBasis,
    $driverType,
    $signPath,
    $pdfPath
]);

header("Location: customer-invoice.php?updated=1");
exit;
