<?php
    session_start();
    require_once __DIR__ . '/assets/includes/db_connect.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    $stmt = $conn->prepare("
        SELECT h.id, h.reference_no, h.full_name
        FROM itinerary_customer_history h
        INNER JOIN customer_invoice c ON c.history_id = h.id
        ORDER BY h.reference_no DESC
    ");
    $stmt->execute();
    $itineraries = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $receipts = [];
    $selectedId = $_GET['history_id'] ?? null;

    if ($selectedId && is_numeric($selectedId)) {
        $stmt = $conn->prepare("SELECT id FROM customer_invoice WHERE history_id = ?");
        $stmt->execute([$selectedId]);
        $invoice = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($invoice) {
            $invoiceId = $invoice['id'];

            $stmt = $conn->prepare("
                SELECT pr.id, pr.receipt_path, pr.amount, pr.payment_type, pr.created_at, pr.paid_on AS paid_on
                FROM payment_receipt pr
                LEFT JOIN users u ON u.id = pr.paid_on
                WHERE pr.invoice_id = ?
                ORDER BY pr.paid_on DESC
            ");
            $stmt->execute([$invoiceId]);
            $receipts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Payment Receipts | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    <style>
        .select2-container .select2-selection--multiple { height: auto; }
        body { font-family: "Cambria", sans-serif; background-color: #f4f6f8; font-size: 12px; }
        .container { max-width: max-content; }
    </style>
</head>
<body>
<div class="d-flex">
<?php include __DIR__ . '/assets/includes/sidebar.php'; ?>
<div class="container-fluid mt-4">

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <strong>Payment Receipts</strong>
        </div>
        <div class="card-body">
            
            <form method="GET" class="row g-2 mb-3 align-items-end">
                <div class="col-md-6">
                    <label for="history_id" class="form-label fw-bold">Select Itinerary</label>
                    <select name="history_id" id="history_id" class="form-select" required>
                        <option value="">-- Select Itinerary --</option>
                        <?php foreach ($itineraries as $i) : ?>
                            <option value="<?= $i['id'] ?>" <?= ($i['id'] == $selectedId) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($i['reference_no'] . ' - ' . $i['full_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-primary w-100">Show Receipts</button>
                </div>

                <div class="col-md-2 d-grid">
                    <a href="customer-payment-receipts.php" class="btn w-25"><i class="bi bi-trash3-fill" style="font-size: 1.5rem; color: #b80303;"></i></a>
                </div>
            </form>

            <hr>    

            <?php if ($selectedId) : ?>
                <h6 class="my-4 fw-bold">Receipts for Itinerary: <?= htmlspecialchars($itineraries[array_search($selectedId, array_column($itineraries, 'id'))]['reference_no']) ?></h6>
                <table id="receiptsTable" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Receipt</th>
                            <th>Amount</th>
                            <th>Payment Type</th>
                            <th>Paid On</th>
                            <th>Uploaded On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($receipts as $r) : ?>
                            <tr>
                                <td><?= $r['id'] ?></td>
                                <td>
                                    <?php if ($r['receipt_path']) : ?>
                                        <a href="<?= htmlspecialchars($r['receipt_path']) ?>" target="_blank" class="btn btn-sm btn-outline-success">
                                            View Receipt
                                        </a>
                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                                <td><?= number_format($r['amount'],2) ?></td>
                                <td><?= ucfirst($r['payment_type']) ?></td>
                                <td><?= htmlspecialchars($r['paid_on']) ?></td>
                                <td><?= htmlspecialchars($r['created_at']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($receipts)) : ?>
                            <tr><td colspan="6" class="text-center">No receipts uploaded for this itinerary.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </div>
    </div>

</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#history_id').select2();
    $('#receiptsTable').DataTable({
        pageLength: 10,
        responsive: true
    });
});
</script>

</body>
</html>
