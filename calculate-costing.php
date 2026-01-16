<?php
    session_start();
    require_once __DIR__ . '/assets/includes/db_connect.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Costing Calculation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/footer-logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<style>
     body { font-family: "Cambria", sans-serif; background-color: #f4f6f8; font-size: 12px; }
    .container { max-width: max-content; }
    .dashboard-card { background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); padding: 20px; margin-top: 40px; }
</style>

</head>

<body>
    <div class="d-flex">
        <?php include __DIR__ . '/assets/includes/sidebar.php'; ?>
        <div class="flex-grow-1">
            <div class="container-fluid">
            </div>
        </div>
    </div>
</body>
