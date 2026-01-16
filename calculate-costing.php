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
$stmt = $conn->prepare("SELECT * FROM itinerary_customer WHERE id = ?");
$stmt->execute([$id]);
$itinerary = $stmt->fetch(PDO::FETCH_ASSOC);

// Prepare theme names
$themeNames = [];
if (!empty($itinerary['theme_ids'])) {
    $themeIds = json_decode($itinerary['theme_ids'], true);
    if (!empty($themeIds)) {
        $placeholders = implode(',', array_fill(0, count($themeIds), '?'));
        $stmt = $conn->prepare("SELECT theme_name FROM tour_themes WHERE id IN ($placeholders)");
        $stmt->execute($themeIds);
        $themeNames = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}

// Prepare city names
$cityNames = [];
if (!empty($itinerary['city_ids'])) {
    $cityIds = json_decode($itinerary['city_ids'], true);
    if (!empty($cityIds)) {
        $placeholders = implode(',', array_fill(0, count($cityIds), '?'));
        $orderBy = "ORDER BY FIELD(id," . implode(',', $cityIds) . ")";
        $stmt = $conn->prepare("SELECT name FROM cities WHERE id IN ($placeholders) $orderBy");
        $stmt->execute($cityIds);
        $cityNames = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
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
                    <div class="col-md-3">
                        <div class="card-itinerary text-center">
                            <h6 class="text-muted">Start Date</h6>
                            <p class="fw-bold mb-0"><?= htmlspecialchars($itinerary['start_date']); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-itinerary text-center">
                            <h6 class="text-muted">End Date</h6>
                            <p class="fw-bold mb-0"><?= htmlspecialchars($itinerary['end_date']); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-itinerary text-center">
                            <h6 class="text-muted">Days / Nights</h6>
                            <p class="fw-bold mb-0"> <?= htmlspecialchars($itinerary['nights'] + 1 ); ?> Days / <?= htmlspecialchars($itinerary['nights']); ?> Nights</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-itinerary text-center">
                            <h6 class="text-muted">Pax Details</h6>
                            <div class="d-flex justify-content-around fw-bold">
                                <span>Adults: <?= htmlspecialchars($itinerary['adults'] ?? 0); ?></span>
                                <span>6-11: <?= htmlspecialchars($itinerary['children_6_11'] ?? 0); ?></span>
                                <span>11+: <?= htmlspecialchars($itinerary['children_above_11'] ?? 0); ?></span>
                                <span>Infants: <?= htmlspecialchars($itinerary['infants'] ?? 0); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-0">
                        <div class="card-itinerary text-center">
                            <h6 class="text-muted">Themes</h6>
                            <p class="fw-bold mb-0">
                                <?= !empty($themeNames) ? htmlspecialchars(implode(', ', $themeNames)) : 'N/A'; ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 mt-0">
                        <div class="card-itinerary text-center">
                            <h6 class="text-muted">Cities</h6>
                            <p class="fw-bold mb-0">
                                <?= !empty($cityNames) ? htmlspecialchars(implode(', ', $cityNames)) : 'N/A'; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-warning">
                    No itinerary found for this ID.
                </div>
            <?php endif; ?>

            <hr class="mt-0">

            <!-- Cost Sheet Section -->
            <h4 class="fw-bold mb-3">Cost Sheet</h4>

            <div class="card p-3 mb-2">
                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="agent_name" class="form-label">Agent Name</label>
                        <input type="text" id="agent_name" class="form-control" placeholder="Enter agent name">
                    </div>

                    <div class="col-md-3">
                        <label for="group_name" class="form-label">Group Name</label>
                        <input type="text" id="group_name" class="form-control" placeholder="Enter group name">
                    </div>

                    <div class="col-md-2">
                        <label for="costing_by" class="form-label">Costing By</label>
                        <input type="text" id="costing_by" class="form-control" value="<?= htmlspecialchars($_SESSION['user_name'] ?? '') ?>" readonly>
                    </div>

                    <div class="col-md-2">
                        <label for="costing_date" class="form-label">Date</label>
                        <input type="date" id="costing_date" class="form-control" value="<?= date('Y-m-d'); ?>">
                    </div>

                    <div class="col-md-2">
                        <label for="exchange_rate" class="form-label">Exchange Rate</label>
                        <input type="text" id="exchange_rate" class="form-control" placeholder="Enter rate">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Pax Count</label>
                        <input type="text" class="form-control" value="Adults: <?= htmlspecialchars($itinerary['adults'] ?? 0); ?>, 6-11: <?= htmlspecialchars($itinerary['children_6_11'] ?? 0); ?>, 11+: <?= htmlspecialchars($itinerary['children_above_11'] ?? 0); ?>, Infants: <?= htmlspecialchars($itinerary['infants'] ?? 0); ?>" readonly>
                    </div>
                </div>

                <div class="row mt-0">
                    <div class="col-12">
                        <input type="text" class="form-control text-center fw-bold border-0"  value="<?= htmlspecialchars($itinerary['start_date'] ?? '') ?> to <?= htmlspecialchars($itinerary['end_date'] ?? '') ?>" readonly>
                    </div>
                </div>
            </div>

            <?php
                // Calculate number of days between start and end dates
                $startDate = $itinerary['start_date'] ?? null;
                $endDate = $itinerary['end_date'] ?? null;
                $numDays = 0;
                $dates = [];

                if ($startDate && $endDate) {
                    $start = new DateTime($startDate);
                    $end = new DateTime($endDate);
                    $interval = $start->diff($end);
                    $numDays = $interval->days + 1; 
                    for ($d = 0; $d < $numDays; $d++) {
                        $dates[] = $start->format('Y-m-d');
                        $start->modify('+1 day');
                    }
                }
            ?>
            <div class="card p-3 mb-5">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Cost Details</h5>
                    <button type="button" class="btn btn-sm btn-primary mt-2" id="addRowBtn">Add Row</button>
                        </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle" id="costTable">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Hotel</th>
                                <th>Room Category</th>
                                <th>Meal Plan</th>
                                <th>Double</th>
                                <th>Single</th>
                                <th>Child</th>
                                <th>Notes</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rowCount = max($numDays, 6); // show at least 6 rows
                            for ($i = 0; $i < $rowCount; $i++):
                                $dateValue = $dates[$i] ?? '';
                            ?>
                            <tr>
                                <th scope="row"><?= $i + 1 ?></th>
                                <td><input type="date" class="form-control" value="<?= $dateValue ?>"></td>
                                <td><input type="text" class="form-control" placeholder="Hotel Name"></td>
                                <td><input type="text" class="form-control" placeholder="Room Category"></td>
                                <td><input type="text" class="form-control" placeholder="Meal Plan"></td>
                                <td><input type="number" class="form-control" placeholder="Double"></td>
                                <td><input type="number" class="form-control" placeholder="Single"></td>
                                <td><input type="number" class="form-control" placeholder="Child"></td>
                                <td><input type="text" class="form-control" placeholder="Notes"></td>
                                <td><button type="button" class="btn btn-sm btn-danger remove-row">Remove</button></td>
                            </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add new row dynamically
    document.getElementById('addRowBtn').addEventListener('click', function() {
        const table = document.getElementById('costTable').getElementsByTagName('tbody')[0];
        const rowCount = table.rows.length;
        const row = table.insertRow();
        row.innerHTML = `
            <th scope="row">${rowCount + 1}</th>
            <td><input type="date" class="form-control"></td>
            <td><input type="text" class="form-control" placeholder="Hotel Name"></td>
            <td><input type="text" class="form-control" placeholder="Room Category"></td>
            <td><input type="text" class="form-control" placeholder="Meal Plan"></td>
            <td><input type="number" class="form-control" placeholder="Double"></td>
            <td><input type="number" class="form-control" placeholder="Single"></td>
            <td><input type="number" class="form-control" placeholder="Child"></td>
            <td><input type="text" class="form-control" placeholder="Notes"></td>
            <td><button type="button" class="btn btn-sm btn-danger remove-row">Remove</button></td>
        `;
    });

    // Remove row
    document.addEventListener('click', function(e){
        if(e.target && e.target.classList.contains('remove-row')){
            const row = e.target.closest('tr');
            row.remove();

            // Re-number rows
            const rows = document.querySelectorAll('#costTable tbody tr');
            rows.forEach((tr, index) => {
                tr.querySelector('th').textContent = index + 1;
            });
        }
    });
</script>
</body>
</html>
