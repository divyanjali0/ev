<?php
    session_start();
    require_once __DIR__ . '/assets/includes/db_connect.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    // Fetch itinerary data
    $sql = "SELECT reference_no, start_date, end_date, full_name, whatsapp_code, whatsapp, id, tour_status
            FROM itinerary_customer ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Itinerary Requests | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/footer-logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
</head>
<style>
    body { font-family: "Cambria", sans-serif; background-color: #f4f6f8; font-size: 12px; }
    .container { max-width: max-content; }
    .dashboard-card { background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); padding: 20px; margin-top: 40px; }
</style>
<body>
    <div class="d-flex">
        <?php include __DIR__ . '/assets/includes/sidebar.php'; ?>
        <div class="flex-grow-1">

            <div class="container-fluid mt-4">
                <div class="card dashboard-card">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="text-center fw-bold">Itinerary Requests</h2>
                        <a href="add-tour.php" class="btn btn-success">
                            <i class="bi bi-plus-lg me-1"></i> Add Tour
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table id="itineraryTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Reference No</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Full Name</th>
                                    <th>WhatsApp</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rows as $row): ?>
                                    <?php if ($row['tour_status'] === 'Complete') continue;  ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['reference_no']); ?></td>
                                        <td><?= htmlspecialchars($row['start_date']); ?></td>
                                        <td><?= htmlspecialchars($row['end_date']); ?></td>
                                        <td><?= htmlspecialchars($row['full_name']); ?></td>
                                        <td><?= htmlspecialchars($row['whatsapp_code'] . ' ' . $row['whatsapp']); ?></td>
                                        <td>
                                            <?= $row['tour_status'] ? htmlspecialchars($row['tour_status']) : 'Pending'; ?>
                                        </td>
                                        <td>
                                            <a href="edit-itinerary.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-primary">
                                                Edit
                                            </a>
                                            
                                            <?php if ($row['tour_status'] !== 'Complete'): ?>
                                                <button class="btn btn-sm btn-warning mark-complete" data-id="<?= $row['id']; ?>" data-name="<?= $row['full_name']; ?>" data-toggle="modal" data-target="#markCompleteModal">
                                                    Mark as Complete
                                                </button>
                                            <?php endif; ?>

                                            <!-- Delete (only for admin) -->
                                            <?php if ($_SESSION['user_role'] === 'admin'): ?>
                                                <a href="delete-itinerary.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                                                    <i class="bi bi-trash3 me-1"></i> Delete
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal for Mark as Complete Confirmation -->
    <div class="modal fade" id="markCompleteModal" tabindex="-1" aria-labelledby="markCompleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="markCompleteModalLabel">Mark Tour as Complete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to mark this tour as complete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" id="confirmMarkComplete">Yes, Mark as Complete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            const table = $('#itineraryTable').DataTable({
                pageLength: 50,
                lengthMenu: [5, 10, 25, 50],
                order: [[7, 'desc']],
                responsive: true,
                buttons: [{
                    extend: 'csvHtml5',
                    className: 'd-none',
                    text: 'Export CSV',
                    exportOptions: {
                        columns: ':not(:last-child):not(:nth-last-child(2))',
                        modifier: { search: 'applied' }
                    }
                }]
            });

            // Show the modal when "Mark as Complete" button is clicked
            $('.mark-complete').click(function() {
                const id = $(this).data('id');
                const name = $(this).data('name');

                // Store the ID and Name in the modal
                $('#confirmMarkComplete').data('id', id);
                $('#confirmMarkComplete').data('name', name);

                // Manually trigger modal open using Bootstrap JS API
                var myModal = new bootstrap.Modal(document.getElementById('markCompleteModal'));
                myModal.show();
            });

            // Handle the confirmation to mark as complete
            $('#confirmMarkComplete').click(function() {
                const id = $(this).data('id');

                $.ajax({
                    url: 'mark-complete.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        if (response === 'success') {
                            // Instead of alert, show a custom success message
                            const successMessage = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                Tour marked as complete successfully!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

                            // Append the success message to a container (e.g., to the top of the page or within a div)
                            $('body').prepend(successMessage);

                            // Optionally, you can add a timeout to remove the success message after a few seconds
                            setTimeout(function() {
                                $('.alert').alert('close');
                            }, 3000); // Closes the alert after 3 seconds

                            // Reload the page to reflect the changes
                            location.reload();
                        } else {
                            // Show error message if the update fails
                            const errorMessage = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Failed to mark the tour as complete. Please try again.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

                            $('body').prepend(errorMessage);
                        }
                        $('#markCompleteModal').modal('hide'); // Close the modal
                    }
                });
            });
        });

    </script>
</body>
</html>
