<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch all entrance fees
$stmt = $conn->query("SELECT * FROM entrance_fees");
$fees = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle Delete
if (isset($_GET['delete'])) {
    $deleteId = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM entrance_fees WHERE id = :id");
    $stmt->execute(['id' => $deleteId]);
    header("Location: entrance-fees.php");
    exit;
}

// Handle Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price_usd = $_POST['price_usd'];
    
    $stmt = $conn->prepare("UPDATE entrance_fees SET name = :name, price_usd = :price_usd WHERE id = :id");
    $stmt->execute(['name' => $name, 'price_usd' => $price_usd, 'id' => $id]);
    header("Location: entrance-fees.php");
    exit;
}

// Handle Add
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price_usd = $_POST['price_usd'];
    
    $stmt = $conn->prepare("INSERT INTO entrance_fees (name, price_usd) VALUES (:name, :price_usd)");
    $stmt->execute(['name' => $name, 'price_usd' => $price_usd]);
    header("Location: entrance-fees.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Explore Vacations | Entrance Fees</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <style>
        body { font-family: "Cambria", sans-serif; background-color: #f4f6f8; font-size: 12px; }
        .container { max-width: 90%; margin-top: 40px; }
        .card { border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); padding: 20px; }
        .card h3 { font-weight: 600; }
        .card .icon { font-size: 2.5rem; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <?php include __DIR__ . '/assets/includes/sidebar.php'; ?>
    <!-- Main Content -->
    <div class="flex-grow-1">
        <div class="container">
            <h3 class="text-center fw-bold mb-4">Entrance Fees</h3>
            <hr>
            <!-- Add New Fee -->
            <div class="mb-4">
                <h5 class="fw-bold">Add New Entrance Fee</h5>
                <form method="POST" action="entrance-fees.php">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="price_usd" class="form-label">Price (USD)</label>
                            <input type="number" class="form-control" id="price_usd" name="price_usd" required>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary w-25">Add Entrance Fee</button>
                    </div>
                </form>
            </div>

            <hr>

            <!-- Entrance Fees Table -->
            <div class="card">
                <h5 class="fw-bold mb-3">Entrance Fees List</h5>
                <table class="table table-bordered table-striped" id="itineraryTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price (USD)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fees as $fee): ?>
                        <tr>
                            <td><?= htmlspecialchars($fee['id']); ?></td>
                            <td><?= htmlspecialchars($fee['name']); ?></td>
                            <td><?= htmlspecialchars($fee['price_usd']); ?></td>
                            <td>
                                <!-- Update with Icon -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal<?= $fee['id']; ?>">
                                    <i class="bi bi-pencil"></i> 
                                </button>
                                <!-- Delete -->
                                <a href="entrance-fees.php?delete=<?= $fee['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this fee?')">
                                    <i class="bi bi-trash"></i> 
                                </a>
                            </td>
                        </tr>

                        <!-- Update Modal -->
                        <div class="modal fade" id="updateModal<?= $fee['id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel<?= $fee['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel<?= $fee['id']; ?>">Update Entrance Fee</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="entrance-fees.php">
                                            <input type="hidden" name="id" value="<?= $fee['id']; ?>">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($fee['name']); ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price_usd" class="form-label">Price (USD)</label>
                                                <input type="number" class="form-control" id="price_usd" name="price_usd" value="<?= htmlspecialchars($fee['price_usd']); ?>" required>
                                            </div>
                                            <button type="submit" name="update" class="btn btn-warning">Update Fee</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
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
            });
        });
    </script>
</body>
</html>
