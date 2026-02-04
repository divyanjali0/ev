<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$sql = "
    SELECT 
        ic.id AS itinerary_id, 
        ic.reference_no, 
        ic.full_name, 
        ic.email,
        ic.whatsapp_code, 
        ic.whatsapp,
        c.costing_date, 
        c.grand_total, 
        c.hotel_total,
        c.lunch_dinner,
        c.trip_full_total, 
        ci.trip_total AS invoice_trip_total,
        ci.payment_status AS invoice_payment_status,
        ci.paid_amount AS invoice_paid_amount,
        he.hotel_name,
        he.amount AS hotel_expense_amount,
        he.currency AS hotel_currency
    FROM itinerary_customer ic
    LEFT JOIN costing c ON c.itinerary_id = ic.id
    LEFT JOIN customer_invoice ci ON ci.history_id = ic.id
    LEFT JOIN hotel_expenses he ON he.history_id = ic.id
    WHERE ic.tour_status = 'Complete'
    ORDER BY ic.id DESC
";
$stmt = $conn->prepare($sql);
$stmt->execute();
$completedTours = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Completed Tours | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/footer-logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { font-family: "Cambria", sans-serif; background-color: #f4f6f8; font-size: 12px; }
        .dashboard-card { background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
    </style>
</head>
<body>
    <div class="d-flex">
        <?php include __DIR__ . '/assets/includes/sidebar.php'; ?>
        <div class="flex-grow-1 container mt-4">
            <div class="dashboard-card">
                <h2 class="mb-4 text-center fw-bold">Completed Tours</h2>
                <table class="table table-bordered table-striped" id="completedToursTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Reference No</th>
                            <th>Full Name</th>
                            <th>Grand Total</th>
                            <th>Invoice Total</th>
                            <th>Hotel Expense</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($completedTours as $index => $tour): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($tour['reference_no']); ?></td>
                                <td><?= htmlspecialchars($tour['full_name']); ?></td>
                                <td><?= htmlspecialchars($tour['grand_total']); ?></td>
                                <td><?= htmlspecialchars($tour['invoice_trip_total']); ?></td>
                                <td><?= htmlspecialchars($tour['hotel_expense_amount']) . ' ' . htmlspecialchars($tour['hotel_currency']); ?></td>
                                <td>
                                    <button class="btn btn-primary btn-sm view-details-btn" data-id="<?= $tour['itinerary_id']; ?>">
                                        View Details
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal to View Tour Details -->
    <div class="modal fade" id="tourDetailsModal" tabindex="-1" aria-labelledby="tourDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tourDetailsModalLabel">Tour Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="tourDetailsContent">Loading...</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#completedToursTable').DataTable();

            // View Tour Details Modal
            $('.view-details-btn').click(function() {
                const itineraryId = $(this).data('id');
                $('#tourDetailsContent').html('<div class="text-center">Loading...</div>');

                $.ajax({
                    url: 'fetch_tour_details.php',
                    method: 'POST',
                    data: { itinerary_id: itineraryId },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            let detailsHtml = `
                                <h5>Costing Information:</h5>
                                <ul>
                                    <li>Agent Name: ${response.costing.agent_name}</li>
                                    <li>Grand Total: ${response.costing.grand_total}</li>
                                    <li>Hotel Total: ${response.costing.hotel_total}</li>
                                    <li>Lunch/Dinner Cost: ${response.costing.lunch_dinner}</li>
                                    <li>Trip Full Total: ${response.costing.trip_full_total}</li>
                                </ul>

                                <h5>Invoice Information:</h5>
                                <ul>
                                    <li>Invoice Total: ${response.invoice.trip_total}</li>
                                    <li>Payment Status: ${response.invoice.payment_status}</li>
                                    <li>Paid Amount: ${response.invoice.paid_amount}</li>
                                </ul>

                                <h5>Hotel Expenses:</h5>
                                <ul>
                                    <li>Hotel Name: ${response.hotel_expenses.hotel_name}</li>
                                    <li>Hotel Amount: ${response.hotel_expenses.amount}</li>
                                    <li>Currency: ${response.hotel_expenses.currency}</li>
                                </ul>
                            `;
                            $('#tourDetailsContent').html(detailsHtml);
                            var myModal = new bootstrap.Modal(document.getElementById('tourDetailsModal'));
                            myModal.show();
                        } else {
                            $('#tourDetailsContent').html('<div class="text-center text-danger">No details found.</div>');
                        }
                    },
                    error: function() {
                        $('#tourDetailsContent').html('<div class="text-center text-danger">An error occurred while fetching details.</div>');
                    }
                });
            });
        });
    </script>
</body>
</html>
