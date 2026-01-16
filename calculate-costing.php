<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'] ?? 0;
$id = (int)$id; 

// Fetch itinerary data
$stmt = $conn->prepare("SELECT reference_no, start_date, end_date, nights FROM itinerary_customer WHERE id = ?");
$stmt->execute([$id]);
$itinerary = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Costing Calculation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/footer-logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<style>
    body { font-family: "Cambria", sans-serif; background-color: #f4f6f8; font-size: 12px; }
    .container { max-width: 1200px; margin-top: 40px; }
    .card-itinerary { background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); padding: 16px; margin-bottom: 20px; }
</style>
<body>
<div class="d-flex">
    <?php include __DIR__ . '/assets/includes/sidebar.php'; ?>
    <div class="flex-grow-1">
        <div class="container-fluid p-4">

            <h3 class="mb-4 fw-bold">
                Itinerary Costing : <?= htmlspecialchars($itinerary['reference_no'] ?? 'N/A'); ?>
            </h3>

            <?php if ($itinerary): ?>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="card-itinerary text-center">
                            <h6 class="text-muted">Start Date</h6>
                            <p class="fw-bold mb-0"><?= htmlspecialchars($itinerary['start_date']); ?></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card-itinerary text-center">
                            <h6 class="text-muted">End Date</h6>
                            <p class="fw-bold mb-0"><?= htmlspecialchars($itinerary['end_date']); ?></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card-itinerary text-center">
                            <h6 class="text-muted">Nights</h6>
                            <p class="fw-bold mb-0"><?= htmlspecialchars($itinerary['nights']); ?> Nights</p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-warning">
                    No itinerary found for this ID.
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
</body>
</html>
