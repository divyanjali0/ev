<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


// Fetch entrance fees from DB
$stmt = $conn->prepare("SELECT id, name, price_usd FROM entrance_fees ORDER BY name");
$stmt->execute();
$entranceFees = $stmt->fetchAll(PDO::FETCH_ASSOC);



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

$defaultTransport = [
    [
        'pax' => '1',
        'vehicle' => 'Sedan',
        'rsPerKm' => 0,
        'km' => 0,
        'totalRs' => 0,
        'days' => 1,
        'batta' => 0,
        'transportRs' => 0,
        'transportUsd' => 0,
        'lGuideUsd' => 0,
        'totalCost' => 0,
        'costPP' => 0
    ]
];

// If no transport data exists, use defaults
if (empty($latestTransport)) {
    $latestTransport = $defaultTransport;
}


// Fetch latest costing for this itinerary
$stmt = $conn->prepare("
    SELECT *
    FROM costing
    WHERE itinerary_id = ?
    ORDER BY version DESC
    LIMIT 1
");
$stmt->execute([$id]);
$latestCosting = $stmt->fetch(PDO::FETCH_ASSOC);

// Decode JSON fields if exists
$latestCostSheet = $latestCosting['cost_sheet'] ?? null;
$latestCostSheet = $latestCostSheet ? json_decode($latestCostSheet, true) : [];
$latestEntranceFees = $latestCosting['entrance_fees'] ?? null;
$latestEntranceFees = $latestEntranceFees ? json_decode($latestEntranceFees, true) : [];
$latestTransport = $latestCosting['transport_json'] ?? null;
$latestTransport = $latestTransport ? json_decode($latestTransport, true) : [];

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
                            <input type="text" id="agent_name" class="form-control" placeholder="Enter agent name" value="<?= htmlspecialchars($latestCosting['agent_name'] ?? '') ?>">
                    </div>

                    <div class="col-md-3">
                        <label for="group_name" class="form-label">Group Name</label>
                        <input type="text" id="group_name" class="form-control" placeholder="Enter group name" value="<?= htmlspecialchars($latestCosting['group_name'] ?? '') ?>">
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
                        <input type="text" id="exchange_rate" class="form-control" placeholder="Enter rate" value="<?= htmlspecialchars($latestCosting['exchange_rate'] ?? 0) ?>">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Pax Count</label>
                        <input type="text" class="form-control" value="Adults: <?= htmlspecialchars($itinerary['adults'] ?? 0); ?>, 6-11: <?= htmlspecialchars($itinerary['children_6_11'] ?? 0); ?>, 11+: <?= htmlspecialchars($itinerary['children_above_11'] ?? 0); ?>, Infants: <?= htmlspecialchars($itinerary['infants'] ?? 0); ?>" readonly>
                    </div>

                    <div class="col-md-3 d-flex flex-column">
                        <label class="form-label">Entrance Fees</label>
                        <button class="btn btn-outline-primary mb-0" type="button" data-bs-toggle="modal" data-bs-target="#entranceModal">
                            Add Entrance Fees
                        </button>
                    </div>
                </div>
                <hr>
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
                    <div>
                        <button type="button" class="btn btn-sm btn-primary" id="addRowBtn">Add Row</button>
                        <button type="button" class="btn btn-sm btn-secondary" id="addColBtn">Add Column</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle" id="costTable">
                        <thead class="table-light">
                            <tr id="tableHead">
                                <th>No</th>
                                <th>Date</th>
                                <th>Hotel</th>
                                <th>Room Category</th>
                                <th>Meal Plan</th>
                                <th>Double</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                                $costRows = !empty($latestCostSheet) ? $latestCostSheet : [];
                                foreach ($dates as $index => $dateValue):
                                    $rowData = $costRows[$index] ?? null;
                                ?>
                                <tr>
                                    <th scope="row"><?= $index + 1 ?></th>
                                    <td><input type="date" class="form-control" value="<?= htmlspecialchars($rowData['date'] ?? $dateValue) ?>"></td>
                                    <td><input type="text" class="form-control" value="<?= htmlspecialchars($rowData['hotel'] ?? '') ?>" placeholder="Hotel Name"></td>
                                    <td><input type="text" class="form-control" value="<?= htmlspecialchars($rowData['room_category'] ?? '') ?>" placeholder="Room Category"></td>
                                    <td>
                                        <select class="form-control meal-plan">
                                            <option value="">Select Meal Plan</option>
                                            <option value="Breakfast Only" <?= (isset($rowData['meal_plan']) && $rowData['meal_plan'] == 'Breakfast Only') ? 'selected' : '' ?>>Breakfast Only</option>
                                            <option value="Half Board" <?= (isset($rowData['meal_plan']) && $rowData['meal_plan'] == 'Half Board') ? 'selected' : '' ?>>Half Board</option>
                                            <option value="Full Board" <?= (isset($rowData['meal_plan']) && $rowData['meal_plan'] == 'Full Board') ? 'selected' : '' ?>>Full Board</option>
                                            <option value="All Inclusive" <?= (isset($rowData['meal_plan']) && $rowData['meal_plan'] == 'All Inclusive') ? 'selected' : '' ?>>All Inclusive</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control double-col" value="<?= htmlspecialchars($rowData['double_price'] ?? 0) ?>" placeholder="Double"></td>
                                    <td><button type="button" class="btn btn-sm btn-danger remove-row">Remove</button></td>
                                </tr>
                                <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <!-- Total Double Row -->
                            <tr style="background-color:#f9f9f9; font-weight:bold;">
                                <td colspan="5" class="text-start">Total</td>
                                <td id="totalDouble" style="background-color:#ffe699;">0</td>
                                <td></td>
                            </tr>

                            <!-- Explore Commission Row -->
                            <tr style="background-color:#d9f2d9; font-weight:bold;">
                                <td colspan="5" class="text-start">Explore Commission</td>
                                <td><input type="number" id="exploreCommission" class="form-control" value="<?= htmlspecialchars($latestCosting['explore_commission'] ?? 0) ?>"></td>
                                <td></td>
                            </tr>

                            <!-- Grand Total Row -->
                            <tr style="background-color:#cce5ff; font-weight:bold;">
                                <td colspan="5" class="text-start">Grand Total</td>
                                <td id="grandTotal" style="background-color:#99ccff;">0</td>
                                <!-- <td></td> -->
                            </tr>
                        </tfoot>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center align-middle">
                                <tbody>
                                    <tr>
                                        <td colspan="9" class="text-start">Total Cost for 01 DBL Room</td>
                                        <td><input type="number" id="dblRoomCost" class="form-control" ></td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" class="text-start">Entrance Tickets</td>
                                        <td><input type="number" id="entranceTickets" class="form-control" value="<?= htmlspecialchars(array_sum(array_column($latestEntranceFees, 'price')) ?? 0) ?>"></td>
                                    </tr>
                                    <tr>
                                        <td  colspan="9" class="text-start">Lunches & Dinners</td>
                                        <td><input type="number" id="lunchesDinners" class="form-control" value="<?= htmlspecialchars($latestCosting['lunch_dinner'] ?? 0) ?>"></td>
                                    </tr>
                                    <tr style="background-color:#cce5ff; font-weight:bold;">
                                        <td colspan="9"  class="text-start">Cost Per Pax - IN USD</td>
                                        <td id="costPerPax" style="background-color:#99ccff;"><span id="costPerPax"><?= htmlspecialchars($latestCosting['cost_per_pax'] ?? 0) ?></span>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card p-3 mb-5">
                            <h5 class="fw-bold mb-3">Transport Chart</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center align-middle" id="transportTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Pax</th>
                                            <th>Vehicle</th>
                                            <th>Rs. Per KM</th>
                                            <th>KM/Miles</th>
                                            <th>Total Rs.</th>
                                            <th>No of Days</th>
                                            <th>Batta Rs.</th>
                                            <th>Transport Rs.</th>
                                            <th>Transport USD</th>
                                            <th>L Guide USD</th>
                                            <th>Total Cost</th>
                                            <th>Cost PP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($latestTransport as $t): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($t['pax'] ?? '') ?></td>
                                                <td><?= htmlspecialchars($t['vehicle'] ?? '') ?></td>
                                                <td><input type="number" class="form-control rsPerKm" value="<?= htmlspecialchars($t['rsPerKm'] ?? 0) ?>"></td>
                                                <td><input type="number" class="form-control km" value="<?= htmlspecialchars($t['km'] ?? 0) ?>"></td>
                                                <td class="totalRs"><?= htmlspecialchars($t['totalRs'] ?? 0) ?></td>
                                                <td><input type="number" class="form-control days" value="<?= htmlspecialchars($t['days'] ?? 0) ?>"></td>
                                                <td><input type="number" class="form-control batta" value="<?= htmlspecialchars($t['batta'] ?? 0) ?>"></td>
                                                <td class="transportRs"><?= htmlspecialchars($t['transportRs'] ?? 0) ?></td>
                                                <td><input type="number" class="form-control transportUsd" value="<?= htmlspecialchars($t['transportUsd'] ?? 0) ?>" readonly></td>
                                                <td><input type="number" class="form-control lGuideUsd" value="<?= htmlspecialchars($t['lGuideUsd'] ?? 0) ?>"></td>
                                                <td class="totalCost"><?= htmlspecialchars($t['totalCost'] ?? 0) ?></td>
                                                <td class="costPP"><?= htmlspecialchars($t['costPP'] ?? 0) ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <button type="button" id="addTransportRow" class="btn btn-sm btn-primary">
    Add Transport
</button>

                            </div>
                        </div>

                    </table>

                    <div class="card p-3 mb-5">
                        <h5 class="fw-bold mb-3">Trip Cost Summary</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center align-middle" id="transportSummary">
                                <thead class="table-light">
                                    <tr>
                                        <th>Description</th>
                                        <th>Amount (USD)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sub Total (cost pp + transport total * 2)</td>
                                        <td id="transportTotalUSD">0</td>
                                    </tr>

                                    <tr>
                                        <td>10% Discount</td>
                                        <td id="discountAmount">0</td>
                                    </tr>
                                    <tr style="font-weight:bold; background-color:#ffe699; font-size: 18px;">
                                        <td>Cost for the Trip</td>
                                        <td id="tripCost">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-end mb-5">
                <button class="btn btn-success" id="saveCosting">Save Costing</button>
            </div>
        </div>
    </div>
</div>

<!-- Entrance Fees Modal -->
<div class="modal fade" id="entranceModal" tabindex="-1" aria-labelledby="entranceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="entranceModalLabel">Add Entrance Fees</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="entranceFeesForm">
          <table class="table table-bordered align-middle">
            <thead class="table-light">
              <tr>
                <th>Select</th>
                <th>Entrance Tickets</th>
                <th>Price PP (USD)</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($entranceFees as $fee): ?>
                <tr>
                    <td>
                        <input type="checkbox" class="entrance-checkbox"
                            data-id="<?= $fee['id'] ?>"
                            data-price="<?= $fee['price_usd'] ?>"
                            <?= in_array($fee['id'], array_column($latestEntranceFees, 'id') ?? []) ? 'checked' : '' ?>
                        >
                    </td>
                    <td class="text-start"><?= htmlspecialchars($fee['name']) ?></td>
                    <td>$ <?= number_format($fee['price_usd'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
              <tr>
                <td colspan="2" class="text-end fw-bold fs-5">Total</td>
                <td id="entranceTotal" class="fw-bold fs-5">$ 0.00</td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveEntranceFees">Save Fees</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        /* ======================================================
        HELPERS
        ====================================================== */
        const $ = id => document.getElementById(id);
        const $$ = sel => document.querySelectorAll(sel);


        /* ======================================================
        ENTRANCE FEES
        ====================================================== */
        function updateEntranceTotal() {
            let total = 0;
            $$('.entrance-checkbox').forEach(cb => {
                if (cb.checked) total += parseFloat(cb.dataset.price) || 0;
            });
            if ($('entranceTotal')) $('entranceTotal').textContent = '$' + total.toFixed(2);
            if ($('entranceTickets')) $('entranceTickets').value = total.toFixed(2);
            return total;
        }

        $$('.entrance-checkbox').forEach(cb =>
            cb.addEventListener('change', updateEntranceTotal)
        );

        $('saveEntranceFees')?.addEventListener('click', () => {
            updateEntranceTotal();

            const selected = [];
            $$('.entrance-checkbox:checked').forEach(cb => {
                const tr = cb.closest('tr');
                selected.push({
                    id: cb.dataset.id,
                    name: tr.cells[1].textContent.trim(),
                    price: parseFloat(cb.dataset.price)
                });
            });

            let hidden = $('entranceJson');
            if (!hidden) {
                hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.id = hidden.name = 'entranceJson';
                $('entranceFeesForm')?.appendChild(hidden);
            }
            hidden.value = JSON.stringify(selected);

            bootstrap.Modal.getInstance($('entranceModal'))?.hide();
        });

        updateEntranceTotal();


        /* ======================================================
        COST TABLE TOTALS
        ====================================================== */
        function updateCostTotals() {
            const table = $('costTable');
            if (!table) return;

            let hotelTotal = 0;
            table.querySelectorAll('.double-col').forEach(i => {
                hotelTotal += parseFloat(i.value) || 0;
            });

            $('totalDouble').textContent = hotelTotal.toFixed(2);

            const commission = parseFloat($('exploreCommission')?.value) || 0;
            const entrance = parseFloat($('entranceTickets')?.value) || 0;
            const lunches = parseFloat($('lunchesDinners')?.value) || 0;

            const grand = hotelTotal + commission;
            $('grandTotal').textContent = grand.toFixed(2);
            $('costPerPax').textContent = (grand + entrance + lunches).toFixed(2);
        }

        document.addEventListener('input', e => {
            if (
                e.target.closest('#costTable') ||
                ['exploreCommission','entranceTickets','lunchesDinners'].includes(e.target.id)
            ) {
                updateCostTotals();
                updateTransportSummary();
            }
        });


        /* ======================================================
        TRANSPORT CHART
        ====================================================== */
        function updateTransportTotals() {
            const table = $('transportTable');
            if (!table) return;

            const rate = parseFloat($('exchange_rate')?.value) || 1;

            table.querySelectorAll('tbody tr').forEach(tr => {
                const rsPerKm = parseFloat(tr.querySelector('.rsPerKm')?.value) || 0;
                const km = parseFloat(tr.querySelector('.km')?.value) || 0;
                const batta = parseFloat(tr.querySelector('.batta')?.value) || 0;
                const guide = parseFloat(tr.querySelector('.lGuideUsd')?.value) || 0;

                const totalRs = rsPerKm * km;
                const transportRs = totalRs + batta;
                const transportUsd = transportRs / rate;
                const totalCost = transportUsd + guide;

                const paxText = tr.cells[0].textContent.trim();
                let pax = paxText.includes('-')
                    ? paxText.split('-').reduce((a,b)=>+a + +b)/2
                    : parseInt(paxText) || 1;

                tr.querySelector('.totalRs').textContent = totalRs.toFixed(2);
                tr.querySelector('.transportRs').textContent = transportRs.toFixed(2);
                tr.querySelector('.transportUsd').value = transportUsd.toFixed(2);
                tr.querySelector('.totalCost').textContent = totalCost.toFixed(2);
                tr.querySelector('.costPP').textContent = (totalCost / pax).toFixed(2);
            });
        }

        function updateTransportSummary() {
            let transportTotal = 0;
            $$('#transportTable .totalCost').forEach(td => {
                transportTotal += parseFloat(td.textContent) || 0;
            });

            const costPP = parseFloat($('costPerPax')?.textContent) || 0;
            const sub = (transportTotal + costPP) * 2;
            const discount = sub * 0.10;

            $('transportTotalUSD').textContent = sub.toFixed(2);
            $('discountAmount').textContent = discount.toFixed(2);
            $('tripCost').textContent = (sub - discount).toFixed(2);
        }

        document.addEventListener('input', e => {
            if (e.target.closest('#transportTable') || e.target.id === 'exchange_rate') {
                updateTransportTotals();
                updateTransportSummary();
            }
        });

        updateCostTotals();
        updateTransportTotals();
        updateTransportSummary();


        /* ======================================================
        SAVE COSTING
        ====================================================== */
        $('saveCosting')?.addEventListener('click', () => {
            const entranceFees = $('entranceJson')?.value 
                ? JSON.parse($('entranceJson').value) 
                : [];

            const costSheet = [...$$('#costTable tbody tr')].map(tr => {
                const inputs = tr.querySelectorAll('input, select');
                return {
                    date: inputs[0]?.value || '',
                    hotel: inputs[1]?.value || '',
                    room_category: inputs[2]?.value || '',
                    meal_plan: inputs[3]?.value || '',
                    double_price: parseFloat(inputs[4]?.value) || 0
                };
            });

            const transportData = [...$$('#transportTable tbody tr')].map(tr => ({
                pax: tr.cells[0].textContent,
                vehicle: tr.cells[1].textContent,
                rsPerKm: parseFloat(tr.querySelector('.rsPerKm')?.value) || 0,
                km: parseFloat(tr.querySelector('.km')?.value) || 0,
                totalRs: parseFloat(tr.querySelector('.totalRs')?.textContent) || 0,
                days: parseFloat(tr.querySelector('.days')?.value) || 0,
                batta: parseFloat(tr.querySelector('.batta')?.value) || 0,
                transportRs: parseFloat(tr.querySelector('.transportRs')?.textContent) || 0,
                transportUsd: parseFloat(tr.querySelector('.transportUsd')?.value) || 0,
                lGuideUsd: parseFloat(tr.querySelector('.lGuideUsd')?.value) || 0,
                totalCost: parseFloat(tr.querySelector('.totalCost')?.textContent) || 0,
                costPP: parseFloat(tr.querySelector('.costPP')?.textContent) || 0
            }));

            const payload = {
                itinerary_id: <?= $itinerary['id']; ?>,
                agent_name: $('agent_name')?.value || '',
                group_name: $('group_name')?.value || '',
                costing_by: $('costing_by')?.value || '',
                costing_date: $('costing_date')?.value || '',
                exchange_rate: parseFloat($('exchange_rate')?.value) || 1,
                entrance_fees: entranceFees,
                cost_sheet: costSheet,
                hotel_total: parseFloat($('totalDouble')?.textContent) || 0,
                explore_commission: parseFloat($('exploreCommission')?.value) || 0,
                grand_total: parseFloat($('grandTotal')?.textContent) || 0,
                lunch_dinner: parseFloat($('lunchesDinners')?.value) || 0,
                cost_per_pax: parseFloat($('costPerPax')?.textContent) || 0,
                transport_json: transportData,
                transport_total: parseFloat($('transportTotalUSD')?.textContent) || 0,
                discount: parseFloat($('discountAmount')?.textContent) || 0,
                trip_full_total: parseFloat($('tripCost')?.textContent) || 0
            };

            fetch('save_costing.php', {
                method: 'POST',
                headers: {'Content-Type':'application/json'},
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                if(data.success){
                    alert('Costing saved successfully!');
                        window.location.href = 'edit-itinerary.php?id=' + payload.itinerary_id;
                } else {
                    alert('Error saving costing: ' + data.error);
                }
            })
            .catch(err => console.error(err));
        });
    });


    document.getElementById('addTransportRow')?.addEventListener('click', () => {
        const tbody = document.querySelector('#transportTable tbody');
        const tr = tbody.insertRow();
        tr.innerHTML = `
            <td>1</td>
            <td>Vehicle</td>
            <td><input class="form-control rsPerKm" type="number"></td>
            <td><input class="form-control km" type="number"></td>
            <td class="totalRs">0</td>
            <td><input class="form-control days" type="number" value="1"></td>
            <td><input class="form-control batta" type="number"></td>
            <td class="transportRs">0</td>
            <td><input class="form-control transportUsd" type="number" readonly></td>
            <td><input class="form-control lGuideUsd" type="number"></td>
            <td class="totalCost">0</td>
            <td class="costPP">0</td>
        `;
    });
</script>

</body>
</html>
