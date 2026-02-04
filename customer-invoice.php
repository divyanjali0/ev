<?php
    session_start();
    require_once __DIR__ . '/assets/includes/db_connect.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    $stmt = $conn->prepare("
        SELECT 
            h.id,
            h.reference_no,
            h.version_number,
            h.full_name,
            h.whatsapp,
            h.pdf_path AS itinerary_pdf,
            c.id AS invoice_id,
            c.pdf_path AS customer_invoice_pdf,
            c.payment_status,
            c.paid_amount,
            c.payment_date,
            c.trip_total  -- <-- get total from customer_invoice
        FROM itinerary_customer_history h
        LEFT JOIN customer_invoice c ON c.history_id = h.id
        INNER JOIN (
            SELECT reference_no, MAX(version_number) latest_version
            FROM itinerary_customer_history
            GROUP BY reference_no
        ) v ON v.reference_no = h.reference_no AND v.latest_version = h.version_number
        ORDER BY h.reference_no DESC
    ");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


    function whatsappUrl(string $number, string $pdfUrl, string $ref, string $fullName): string {
        $text = urlencode(
            "Dear {$fullName},\n\n" .
            "Please find your invoice for reference {$ref}.\n\n" .
            "Invoice PDF:\n{$pdfUrl}\n\n" .
            "Thank you.\nExplore Vacations & Travels"
        );

        return "https://wa.me/{$number}?text={$text}";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Explore Vacations | Customer Invoice</title>
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
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="text-center fw-bold mb-3">INVOICE</h6>

                            <table id="itineraryTable" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Itinerary Ref No</th>
                                        <th>Version</th>
                                        <th>Customer Name</th>
                                        <th>Itinerary PDF</th>
                                        <th>Customer Invoice</th> 
                                        <th>Payments</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rows as $row) { ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['reference_no']) ?></td>
                                            <td>V<?= htmlspecialchars($row['version_number']) ?></td>
                                            <td><?= htmlspecialchars($row['full_name']) ?></td>
                                            <td>
                                                <?php if (!empty($row['itinerary_pdf'])) { ?>
                                                    <a href="<?= htmlspecialchars($row['itinerary_pdf']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-file-earmark-pdf"></i> View
                                                    </a>
                                                <?php } else { ?>
                                                    <span class="text-muted">N/A</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($row['customer_invoice_pdf'])) { ?>
                                                    <a href="<?= htmlspecialchars($row['customer_invoice_pdf']) ?>"
                                                    target="_blank"
                                                    class="btn btn-sm btn-outline-success me-1">
                                                        <i class="bi bi-file-earmark-pdf"></i> View
                                                    </a>

                                                    <?php if (!empty($row['whatsapp'])) {
                                                       $waLink = whatsappUrl(
                                                            preg_replace('/\D/', '', $row['whatsapp']),
                                                            (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' . $row['customer_invoice_pdf'],
                                                            $row['reference_no'],
                                                            $row['full_name']
                                                        );

                                                    ?>
                                                    <a href="<?= $waLink ?>"
                                                    target="_blank"
                                                    class="btn btn-sm btn-outline-success"
                                                    title="Send via WhatsApp">
                                                        <i class="bi bi-whatsapp"></i>
                                                    </a>
                                                    <?php } ?>

                                                <?php } else { ?>
                                                    <span class="text-muted">N/A</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($row['payment_status'] === 'full') { ?>
                                                    <span class="badge bg-success">Paid</span>
                                                <?php } elseif ($row['payment_status'] === 'partial') { ?>
                                                    <span class="badge bg-warning text-dark">
                                                        Partial (<?= number_format($row['paid_amount'],2) ?>)
                                                    </span>
                                                <?php } else { ?>
                                                    <span class="badge bg-secondary">Unpaid</span>
                                                <?php } ?>

                                                <?php if (!empty($row['customer_invoice_pdf'])) { ?>
                                                <button
                                                class="btn btn-sm btn-outline-primary ms-1"
                                                data-bs-toggle="modal"
                                                data-bs-target="#paymentModal"
                                                data-invoice-id="<?= $row['invoice_id'] ?>"
                                                data-total="<?= $row['trip_total'] ?? 0 ?>"   
                                                data-paid="<?= $row['paid_amount'] ?? 0 ?>"
                                                data-ref="<?= $row['reference_no'] ?>"
                                            >
                                                <i class="bi bi-cash"></i>
                                            </button>

                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="edit_invoice.php?history_id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i> Edit Invoice
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="paymentModal" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="save_payment.php" enctype="multipart/form-data" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Record Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="invoice_id" id="invoice_id">
                        <input type="hidden" name="reference_no" id="reference_no">
                        <p>Total Amount: <span id="modal_total"></span></p>
                        <p>Paid Amount: <span id="modal_paid"></span></p>
                        <p>Balance: <span id="modal_balance"></span></p>

                        <div class="mb-2">
                        <label class="form-label">Payment Type <span class="text-danger">*</span></label>
                        <select name="payment_type" id="payment_type" class="form-select" required>
                            <option value="">Select</option>
                            <option value="partial">Partial</option>
                            <option value="full">Full</option>
                        </select>
                        </div>

                        <div class="mb-2 d-none" id="amountBox">
                        <label class="form-label">Paid Amount <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="amount" class="form-control" id="amountInput">
                        </div>

                        <div class="mb-2">
                        <label class="form-label">Receipt Upload <span class="text-danger">*</span></label>
                        <input type="file" name="receipt" class="form-control" required>
                        </div>

                        <div class="mb-2">
                        <label class="form-label">Payment Date</label>
                        <input type="date" name="paid_on" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">Save Payment</button>
                    </div>
                    </form>
                </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#itineraryTable').DataTable({
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                ordering: true,
                responsive: true,
                order: [[1, 'desc']] 
            });
        });
    </script>

    <script>
        $('#paymentModal').on('show.bs.modal', function (e) {
            const btn = e.relatedTarget;
            const invoiceId = btn.getAttribute('data-invoice-id');
            const total = parseFloat(btn.getAttribute('data-total'));
            const paid = parseFloat(btn.getAttribute('data-paid'));
            const ref = btn.getAttribute('data-ref');

            const balance = total - paid;

            $('#invoice_id').val(invoiceId);
            $('#reference_no').val(ref);
            $('#modal_total').text(total.toFixed(2));
            $('#modal_paid').text(paid.toFixed(2));
            $('#modal_balance').text(balance.toFixed(2));

            if (paid > 0) {
                $('#payment_type option[value="full"]').hide();
            } else {
                $('#payment_type option[value="full"]').show();
            }

            $('#payment_type').val('');
            $('#amountBox').addClass('d-none');
            $('#amountInput').val(balance.toFixed(2));
        });

    </script>

</body>
</html>