<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$itineraryCount = 0;
$userCount = 0;

// Itinerary count
$stmt = $conn->query("SELECT COUNT(*) FROM itinerary_customer");
$itineraryCount = $stmt->fetchColumn();

// Users count
$stmt = $conn->query("SELECT COUNT(*) FROM users");
$userCount = $stmt->fetchColumn();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Explore Vacations | Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="assets/images/footer-logo.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <style>
            body { font-family: "Cambria", sans-serif; background-color: #f4f6f8; font-size: 14px; }
            .dashboard-container { max-width: 95%; margin-top: 40px; }
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
        <div class="container dashboard-container">
            <h3 class="text-center fw-bold mb-4">📊 Dashboard</h3>
            <div class="row g-4">
                <!-- Total Itineraries -->
                <div class="col-md-6 col-lg-6">
                    <div class="card text-center">
                        <div class="icon text-primary">
                            <i class="bi bi-map"></i>
                        </div>
                        <h5 class="fw-bold">Itineray Requests</h5>
                        <h3><?php echo $itineraryCount; ?></h3>
                    </div>
                </div>

                <!-- Total Users -->
                <div class="col-md-6 col-lg-6">
                    <div class="card text-center">
                        <div class="icon text-success">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="fw-bold">Total Users</h5>
                        <h3><?php echo $userCount; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
