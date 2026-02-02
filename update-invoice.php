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
/* ---------------- TCPDF ---------------- */
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetMargins(15, 15, 15);
$pdf->SetAutoPageBreak(TRUE, 15);
$pdf->AddPage();
$pdf->SetFont('times', '', 11);

$durationDays = $invoice['nights'] + 1;

// Convert total to words
$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
$tripTotalWords = strtoupper($f->format((float)$tourCost['total'] ?? 0));
$invoiceDate = date('Y-m-d');
$paymentNoteText = $_POST['payment_note'] ?? $invoiceData['payment_note'] ?? '';

$html = <<<HTML
<table width="100%">
<tr>
<td width="20%">
<img src="assets/images/logo.png" style="max-height:70px;">
</td>
<td width="80%" style="text-align:right;">
<strong>Explore Vacations & Travels (Pvt) Ltd</strong><br>
No. 371/5, Negombo Road, Seeduwa, Sri Lanka<br>
Tel: +94 114 941 650<br>
Email: info@explorevacations.lk | Web: www.explore.vacations
</td>
</tr>
</table>
<br>
<hr style="margin-top:10px;margin-bottom:10px;">

<h2 style="text-align:center;">INVOICE</h2>

<table width="100%" cellpadding="4">
<tr>
<td width="50%">
<strong>Invoice Date:</strong> {$invoiceDate}<br>
<strong>Tour Start Date:</strong> {$invoice['start_date']}<br>
<strong>Tour End Date:</strong> {$invoice['end_date']}<br>
<strong>Invoice To:</strong> {$invoice['full_name']}
</td>
<td width="50%">
<strong>Invoice No:</strong> {$invoice['reference_no']}<br>
<strong>Tour No:</strong> {$invoice['reference_no']}<br>
<strong>Duration:</strong> {$invoice['nights']} Nights / {$durationDays} Days<br>
<strong>Guests:</strong> {$invoice['full_name']} & Party
</td>
</tr>
</table>
<br>

<hr style="border:0; border-top:1px solid #cccccc; margin:10px 0;">

<p>Being cost of <strong>{$invoice['nights']} Nights / {$durationDays} Days</strong> tour in Sri Lanka, 
Hotel Accommodation in <strong>{$roomType}</strong> Rooms on <strong>{$mealBasis}</strong> basis, 
A/C Car with <strong>{$driverType}</strong> Speaking Chauffeur for the tour starting from Airport till ending at the Airport, Sightseeing as per the program. All applicable taxes included.</p>

<table border="1" cellpadding="5" width="100%">
<tr style="background-color:#e0e0e0; font-weight:bold;">
<th>Room Details</th>
<th>No. of Nights / Days</th>
<th>No. of Pax</th>
<th>Total ({$currency})</th>
</tr>
<tr>
<td>{$roomType}</td>
<td>{$invoice['nights']} / {$durationDays}</td>
<td>{$pax}</td>
<td style="color:#871607; font-weight:bold;">{$total}</td>
</tr>
</table>

<p style="font-weight:bold; color:#198754;">
    Total Amount: {$currency} {$tripTotalWords} ONLY ({$currency} {$total})
</p>


HTML;

if (!empty($paymentNoteText)) {
    $html .= <<<HTML
    <hr style="border:0; border-top:1px solid #d5d0d0c8; margin:10px 0;">
<p style="margin-top:10px; color:#871607;"><strong>**Payment Note / Instructions:</strong> {$paymentNoteText}</p>
<hr>
HTML;
}

$html .= <<<HTML

<hr style="border:0; border-top:1px solid #d5d0d0c8; margin:10px 0;">

<p style="margin-top:10px;"><strong>Payment Details:</strong><br><br>
Name of Beneficiary: Explore Vacations and Travels (Pvt.) Ltd.<br>
Name of Bank: Nations Trust Bank - Wattala Branch, Sri Lanka<br>
Account Number: 100510008214<br>
Routing Number (SWIFT Code): NTBCLKLX<br>
Payment Reference: Please add the Invoice No as the payment reference
</p>

<p style="text-align:right;">
<img src="{$signPath}" width="120"><br>
<strong>Authorized Signatory</strong>
</p>

<p style="text-align:center;font-size:10px;">
Please mail a copy of the remittance advice from your bank for us to follow up at this end and remit the exact amount with the bank charges in order to get the Invoice amount <strong><span style="color:red;">(PLEASE DO NOT DEDUCT THE BANK CHARGES)</span></strong>
</p>
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
    (history_id, room_type, meal_basis, driver_type, signature_path, pdf_path, trip_total, payment_note)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE
        room_type = VALUES(room_type),
        meal_basis = VALUES(meal_basis),
        driver_type = VALUES(driver_type),
        signature_path = VALUES(signature_path),
        pdf_path = VALUES(pdf_path),
        trip_total = VALUES(trip_total),
        payment_note = VALUES(payment_note)
");

$stmt->execute([
    $historyId,
    $roomType,
    $mealBasis,
    $driverType,
    $signPath,
    $pdfPath,
    $tourCost['total'] ?? 0,
    $_POST['payment_note'] ?? null
]);



header("Location: customer-invoice.php?updated=1");
exit;
