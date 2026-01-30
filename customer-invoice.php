<?php
    session_start();
    require_once __DIR__ . '/assets/includes/db_connect.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    $stmt = $conn->prepare("
        SELECT h.id, h.reference_no, h.itinerary_id, h.version_number, h.full_name, h.pdf_path
        FROM itinerary_customer_history h
        JOIN (
            SELECT reference_no, MAX(version_number) version_number
            FROM itinerary_customer_history
            GROUP BY reference_no
        ) v
        ON v.reference_no = h.reference_no
        AND v.version_number = h.version_number
        ORDER BY h.reference_no DESC
    ");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Itinerary | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/footer-logo.png">
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
                                        <th>PDF</th>
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
                                            <?php if (!empty($row['pdf_path'])) { ?>
                                                <a href="<?= htmlspecialchars($row['pdf_path']) ?>"  target="_blank"  class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-file-earmark-pdf"></i> View
                                                </a>
                                            <?php } else { ?>
                                                <span class="text-muted">N/A</span>
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
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

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
</body>
</html>