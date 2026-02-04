<?php
    session_start();
    require_once __DIR__ . '/assets/includes/db_connect.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    $stmt = $conn->query("
        SELECT id, reference_no, full_name
        FROM itinerary_customer
        ORDER BY id DESC
    ");
    $itineraries = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $existingHotels = [];
    if (!empty($_GET['history_id']) && is_numeric($_GET['history_id'])) {
        $stmt = $conn->prepare("
            SELECT id, hotel_name, currency, amount, receipt_path
            FROM hotel_expenses
            WHERE history_id = ?
            ORDER BY id ASC
        ");
        $stmt->execute([(int)$_GET['history_id']]);
        $existingHotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Explore Vacations | Upload Hotel Vouchers</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body { font-family: Cambria; font-size: 12px; background:#f4f6f8; }
        .container-fluid { margin:20px; }
    </style>
</head>

<body>
    <div class="d-flex">
        <?php include __DIR__ . '/assets/includes/sidebar.php'; ?>

        <div class="container-fluid">

            <!-- SELECT TOUR -->
            <form method="GET" class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="fw-bold">Select Tour</label>
                    <select name="history_id" id="history_id" class="form-select" onchange="this.form.submit()" required>
                        <option value="">-- Select Tour --</option>
                        <?php foreach ($itineraries as $t): ?>
                            <option value="<?= $t['id'] ?>" <?= ($_GET['history_id'] ?? '') == $t['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($t['reference_no'].' - '.$t['full_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>

            <?php if (!empty($_GET['history_id'])): ?>

            <form action="save-hotel-expenses.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="history_id" value="<?= (int)$_GET['history_id'] ?>">

                <div id="hotel-wrapper">

                    <?php if ($existingHotels): ?>
                    <?php foreach ($existingHotels as $h): ?>
                    <div class="hotel-row row g-2 mb-2 align-items-end">
                        <input type="hidden" name="hotel_id[]" value="<?= $h['id'] ?>">

                        <div class="col-md-3">
                            <label>Hotel Name</label>
                            <input type="text" name="hotel_name[]" class="form-control" value="<?= htmlspecialchars($h['hotel_name']) ?>" required>
                        </div>

                        <div class="col-md-2">
                            <label>Currency</label>
                            <select name="currency[]" class="form-select" required>
                                <?php foreach (['LKR','USD','EUR'] as $c): ?>
                                <option value="<?= $c ?>" <?= $h['currency']===$c?'selected':'' ?>><?= $c ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label>Amount</label>
                            <input type="number" step="0.01" name="amount[]" class="form-control" value="<?= $h['amount'] ?>" required>
                        </div>

                        <div class="col-md-3">
                            <label>Receipt</label>
                            <?php if ($h['receipt_path']): ?>
                            <div class="mb-1">
                                <a href="<?= $h['receipt_path'] ?>" target="_blank" class="btn btn-sm btn-outline-success">View Existing</a>
                            </div>
                            <?php endif; ?>
                            <input type="file" name="receipt[]" class="form-control">
                        </div>

                        <div class="col-md-2 text-center">
                            <button type="button" class="btn btn-danger remove-row">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </div>

                    </div>
                    <?php endforeach; ?>

                    <?php else: ?>
                    <!-- EMPTY ROW -->
                    <div class="hotel-row row g-2 mb-2 align-items-end">
                        <input type="hidden" name="hotel_id[]" value="">

                        <div class="col-md-3">
                            <label>Hotel Name</label>
                            <input type="text" name="hotel_name[]" class="form-control" required>
                        </div>

                        <div class="col-md-2">
                            <label>Currency</label>
                            <select name="currency[]" class="form-select" required>
                                <option value="LKR">LKR</option>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label>Amount</label>
                            <input type="number" step="0.01" name="amount[]" class="form-control" required>
                        </div>

                        <div class="col-md-3">
                            <label>Receipt</label>
                            <input type="file" name="receipt[]" class="form-control" required>
                        </div>

                        <div class="col-md-2 text-center">
                            <button type="button" class="btn btn-danger remove-row">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>

                <hr>
                <div class="d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-secondary" id="addRow">
                        <i class="bi bi-plus-circle"></i> Add Another
                    </button>
                    <button class="btn btn-success">
                        <i class="bi bi-save"></i> Save
                    </button>
                </div>

            </form>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('#history_id').select2();

        $('#addRow').on('click', function () {
            let row = $('.hotel-row:first').clone();

            row.find('input[type=text], input[type=number]').val('');
            row.find('input[type=file]').val('').prop('required', true);
            row.find('select').prop('selectedIndex', 0);
            row.find('.btn-outline-success').remove();
            row.find('input[name="hotel_id[]"]').val('');

            $('#hotel-wrapper').append(row);
        });

        $(document).on('click','.remove-row',function(){
            if ($('.hotel-row').length > 1) {
                $(this).closest('.hotel-row').remove();
            }
        });
    </script>
</body>
</html>
