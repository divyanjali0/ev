<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['history_id']) || !is_numeric($_GET['history_id'])) {
    die('Invalid invoice reference.');
}

$historyId = (int) $_GET['history_id'];

$stmt = $conn->prepare("
    SELECT 
        id,
        reference_no,
        reference_no,
        version_number,
        full_name,
        start_date,
        end_date,
        nights,
        pdf_path
    FROM itinerary_customer_history
    WHERE id = :id
    LIMIT 1
");
$stmt->execute([':id' => $historyId]);
$invoice = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$invoice) {
    die('Invoice record not found.');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/footer-logo.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            font-family: Cambria, sans-serif;
            background-color: #f4f6f8;
            font-size: 13px;
        }

        .invoice-details {
            line-height: 25px;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <?php include __DIR__ . '/assets/includes/sidebar.php'; ?>

    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <strong>Edit Invoice</strong>
                    </div>
                    <div class="card-body">

                        <!-- HEADER -->
                        <div class="row align-items-center mb-3">
                            <div class="col-6">
                                <img src="assets/images/footer-logo.png" alt="Logo" style="max-height:70px;">
                            </div>
                            <div class="col-6 text-end">
                                <h6 class="fw-bold mb-1">Explore Vacations & Travels (Pvt) Ltd</h6>
                                <div>No. 371/5, Negombo Road, Seeduwa, Sri Lanka | Tel: +94 114 941 650</div>
                                <div>Email : info@explorevacations.lk | Web : www.explore.vacations</div>
                            </div>
                        </div>

                        <hr class="my-0">

                        <!-- INVOICE TITLE -->
                        <h6 class="text-center fw-bold">INVOICE</h6>

                        <hr class="my-0">

                        <!-- INVOICE DETAILS (2 x 2 GRID) -->
                        <div class="justify-content-center row my-3">

                            <div class="invoice-details col-6">
                                <div><strong>Invoice Date : </strong> <?= date('Y-m-d') ?></div>
                                <div><strong>Tour Start Date : </strong> <?= htmlspecialchars($invoice['start_date']) ?></div>
                                <div><strong>Tour End Date : </strong> <?= htmlspecialchars($invoice['end_date']) ?></div>
                                <div><strong>Invoice To : </strong> <?= htmlspecialchars($invoice['full_name']) ?></div>
                            </div>

                            <div class="invoice-details col-6">
                                <div><strong>Invoice No : </strong> <?= htmlspecialchars($invoice['reference_no']) ?></div>
                                <div><strong>Tour No : </strong> <?= htmlspecialchars($invoice['reference_no']) ?></div>
                                <div>
                                    <strong>Duration :</strong>
                                    <?= htmlspecialchars($invoice['nights']) ?> Nights /
                                    <?= htmlspecialchars($invoice['nights'] + 1) ?> Days 
                                </div>
                                <div><strong>Guests : </strong> <?= htmlspecialchars($invoice['full_name']) ?> & Party</div>
                            </div>
                        </div>

                        <hr>

                        <!-- ACTIONS -->
                        <div class="d-flex justify-content-between mt-3">
                            <a href="customer-invoice.php" class="btn btn-secondary btn-sm">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>

                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="bi bi-save"></i> Update Invoice
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
