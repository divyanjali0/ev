<?php
    session_start();
    require_once __DIR__ . '/assets/includes/db_connect.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    // Fetch tours
    $tours = $conn->query("SELECT id, reference_no, full_name FROM itinerary_customer ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);

    // Fetch vouchers
    $vouchers = [];
    if (!empty($_GET['tour_id']) && is_numeric($_GET['tour_id'])) {
        $stmt = $conn->prepare("
            SELECT id, hotel_name, amount, currency, receipt_path, hotel_payment
            FROM hotel_expenses
            WHERE history_id = ?
            ORDER BY id ASC
        ");
        $stmt->execute([(int)$_GET['tour_id']]);
        $vouchers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Vouchers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { font-family: Cambria; font-size: 13px; background:#f4f6f8; }
        .container-fluid { margin: 20px; background: #dfe3e65e; }
    </style>
</head>

<body>
    <div class="d-flex">
        <?php include __DIR__ . '/assets/includes/sidebar.php'; ?>

        <div class="container-fluid">
            <h4 class="mb-3 fw-bold">View Hotel Vouchers</h4>
            <hr>
            <form method="GET" class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Select Tour</label>
                    <select name="tour_id" id="tour_id" class="form-select" onchange="this.form.submit()" required>
                        <option value="">-- Select Tour --</option>
                        <?php foreach ($tours as $t): ?>
                            <option value="<?= $t['id'] ?>" <?= ($_GET['tour_id'] ?? '') == $t['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($t['reference_no'] . ' - ' . $t['full_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>

            <?php if (!empty($vouchers)): ?>
            <form method="POST" action="save-payment-receipt.php" enctype="multipart/form-data">
                <input type="hidden" name="tour_id" value="<?= (int)$_GET['tour_id'] ?>">

                <div class="table-responsive">
                    <table id="voucherTable" class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Hotel Name</th>
                                <th>Amount</th>
                                <th>Voucher</th>
                                <th>Payment Receipts</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vouchers as $i => $v): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= htmlspecialchars($v['hotel_name']) ?></td>
                                <td><?= htmlspecialchars($v['amount'] . ' ' . $v['currency']) ?></td>
                                <td>
                                    <?php if ($v['receipt_path']): ?>
                                        <a href="<?= htmlspecialchars($v['receipt_path']) ?>" target="_blank" class="btn btn-sm btn-success">View</a>
                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php 
                                    $payments = !empty($v['hotel_payment']) ? json_decode($v['hotel_payment'], true) : [];
                                    if ($payments): ?>
                                        <button type="button" class="btn btn-sm btn-info view-payments" data-files='<?= json_encode($payments) ?>'>
                                            View Payment Receipts (<?= count($payments) ?>)
                                        </button>
                                    <?php endif; ?>
                                    <input type="file" name="hotel_payment[<?= $v['id'] ?>][]" multiple class="form-control form-control-sm mt-1">
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 text-end">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-upload"></i> Upload Payment Receipts</button>
                </div>
            </form>
            <?php elseif (isset($_GET['tour_id'])): ?>
                <p class="text-danger">No vouchers found for this tour.</p>
            <?php endif; ?>

        </div>
    </div>

    <!-- Modal for viewing payments -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title fw-bold">Payment Receipts</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="paymentGallery">
            <!-- Images will be injected here -->
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
            $('#tour_id').select2();
            $('#voucherTable').DataTable();

            // Show modal gallery when view payments clicked
            $('.view-payments').on('click', function() {
                const files = $(this).data('files');
                const container = $('#paymentGallery');
                container.empty();
                files.forEach(f => {
                    container.append('<div class="mb-2"><a href="'+f+'" target="_blank">'+f.split('/').pop()+'</a><br><img src="'+f+'" class="img-fluid mb-3"></div>');
                });
                $('#paymentModal').modal('show');
            });
        });
    </script>

</body>
</html>
