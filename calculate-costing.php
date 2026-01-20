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
                            <?php foreach ($dates as $index => $dateValue): ?>
                            <tr>
                                <th scope="row"><?= $index + 1 ?></th>
                                <td><input type="date" class="form-control" value="<?= $dateValue ?>"></td>
                                <td><input type="text" class="form-control" placeholder="Hotel Name"></td>
                                <td><input type="text" class="form-control" placeholder="Room Category"></td>
                                <td>
                                    <select class="form-control meal-plan">
                                        <option value="">Select Meal Plan</option>
                                        <option value="Breakfast Only">Breakfast Only</option>
                                        <option value="Half Board">Half Board</option>
                                        <option value="Full Board">Full Board</option>
                                        <option value="All Inclusive">All Inclusive</option>
                                    </select>
                                </td>                                
                                <td><input type="number" class="form-control double-col" placeholder="Double"></td>
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
                                <td><input type="number" id="exploreCommission" class="form-control" placeholder="Enter Commission" value="0"></td>
                                <td></td>
                            </tr>

                            <!-- Grand Total Row -->
                            <tr style="background-color:#cce5ff; font-weight:bold;">
                                <td colspan="5" class="text-start">Grand Total</td>
                                <td id="grandTotal" style="background-color:#99ccff;">0</td>
                                <td></td>
                            </tr>
                        </tfoot>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center align-middle">
                                <tbody>
                                    <tr>
                                        <td colspan="9" class="text-start">Total Cost for 01 DBL Room</td>
                                        <td><input type="number" id="dblRoomCost" class="form-control" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-start">Entrance Tickets</td>
                                        <td><input type="number" id="entranceTickets" class="form-control" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td  colspan="5" class="text-start">Lunches & Dinners</td>
                                        <td><input type="number" id="lunchesDinners" class="form-control" value="0"></td>
                                    </tr>
                                    <tr style="background-color:#cce5ff; font-weight:bold;">
                                        <td colspan="5"  class="text-start">Cost Per Pax - IN USD</td>
                                        <td id="costPerPax" style="background-color:#99ccff;">0</td>
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
                                        <tr>
                                            <td>02</td>
                                            <td>Car</td>
                                            <td><input type="number" class="form-control rsPerKm" value="120"></td>
                                            <td><input type="number" class="form-control km" value="0"></td>
                                            <td class="totalRs">0</td>
                                            <td><input type="number" class="form-control days" value="0"></td>
                                            <td><input type="number" class="form-control batta" value="0"></td>
                                            <td class="transportRs">0</td>
                                            <td><input type="number" class="form-control transportUsd" value="0"></td>
                                            <td><input type="number" class="form-control lGuideUsd" value="0"></td>
                                            <td class="totalCost">0</td>
                                            <td class="costPP">0</td>
                                        </tr>
                                        <tr>
                                            <td>03-06</td>
                                            <td>Van</td>
                                            <td><input type="number" class="form-control rsPerKm" value="150"></td>
                                            <td><input type="number" class="form-control km" value="3365"></td>
                                            <td class="totalRs">0</td>
                                            <td><input type="number" class="form-control days" value="21"></td>
                                            <td><input type="number" class="form-control batta" value="168000"></td>
                                            <td class="transportRs">0</td>
                                            <td><input type="number" class="form-control transportUsd" value="2402.678571"></td>
                                            <td><input type="number" class="form-control lGuideUsd" value="0"></td>
                                            <td class="totalCost">0</td>
                                            <td class="costPP">0</td>
                                        </tr>
                                        <tr>
                                            <td>07-15</td>
                                            <td>Mini Coach</td>
                                            <td><input type="number" class="form-control rsPerKm" value="200"></td>
                                            <td><input type="number" class="form-control km" value="0"></td>
                                            <td class="totalRs">0</td>
                                            <td><input type="number" class="form-control days" value="0"></td>
                                            <td><input type="number" class="form-control batta" value="0"></td>
                                            <td class="transportRs">0</td>
                                            <td><input type="number" class="form-control transportUsd" value="0"></td>
                                            <td><input type="number" class="form-control lGuideUsd" value="0"></td>
                                            <td class="totalCost">0</td>
                                            <td class="costPP">0</td>
                                        </tr>
                                        <tr>
                                            <td>16-21</td>
                                            <td>33 Seater Bus</td>
                                            <td><input type="number" class="form-control rsPerKm" value="230"></td>
                                            <td><input type="number" class="form-control km" value="0"></td>
                                            <td class="totalRs">0</td>
                                            <td><input type="number" class="form-control days" value="0"></td>
                                            <td><input type="number" class="form-control batta" value="0"></td>
                                            <td class="transportRs">0</td>
                                            <td><input type="number" class="form-control transportUsd" value="0"></td>
                                            <td><input type="number" class="form-control lGuideUsd" value="0"></td>
                                            <td class="totalCost">0</td>
                                            <td class="costPP">0</td>
                                        </tr>
                                    </tbody>
                                </table>
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
                                        <td>Transport: IN USD (Total * Pax)</td>
                                        <td id="transportTotalUSD">0</td>
                                    </tr>
                                    <tr>
                                        <td>10% Discount</td>
                                        <td id="discountAmount">0</td>
                                    </tr>
                                    <tr style="font-weight:bold; background-color:#ffe699;">
                                        <td>Cost for the Trip</td>
                                        <td id="tripCost">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const costTable = document.getElementById('costTable');
    const tableHead = document.getElementById('tableHead');
    let newColCount = 0;

    // Add new column
    document.getElementById('addColBtn').addEventListener('click', () => {
        const colName = prompt('Enter column heading:', 'Extra ' + (++newColCount));
        if (!colName) return;

        tableHead.insertBefore(createCell(colName, 'th'), tableHead.lastElementChild);
        costTable.querySelectorAll('tbody tr').forEach(row => {
            row.insertBefore(createCell('', 'td', `<input type="text" class="form-control" placeholder="${colName}">`), row.lastElementChild);
        });
    });

    // Add new row
    document.getElementById('addRowBtn').addEventListener('click', () => {
        const tbody = costTable.querySelector('tbody');
        const row = tbody.insertRow();
        const defaultCols = ['','', '', '', '', '']; 

        defaultCols.forEach((val, i) => {
            if (i === 4) { 
                row.insertCell().innerHTML = `
                    <select class="form-control meal-plan">
                        <option value="">Select Meal Plan</option>
                        <option value="Breakfast Only">Breakfast Only</option>
                        <option value="Half Board">Half Board</option>
                        <option value="Full Board">Full Board</option>
                        <option value="All Inclusive">All Inclusive</option>
                    </select>
                `;
            } else {
                row.insertCell().innerHTML = `<input type="text" class="form-control">`;
            }
        });

        // Extra dynamic columns
        const extraCols = tableHead.children.length - defaultCols.length - 2;
        for (let i = 0; i < extraCols; i++) {
            const colHeading = tableHead.children[defaultCols.length + i + 1].textContent;
            row.insertCell().innerHTML = `<input type="text" class="form-control" placeholder="${colHeading}">`;
        }

        row.insertCell().innerHTML = '<button type="button" class="btn btn-sm btn-danger remove-row">Remove</button>';
        updateRowNumbers();
    });

    // Remove row
    document.addEventListener('click', e => {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
            updateRowNumbers();
        }
    });

    // Update row numbers
    function updateRowNumbers() {
        costTable.querySelectorAll('tbody tr').forEach((tr, i) => tr.querySelector('th').textContent = i + 1);
    }

    function createCell(text, type = 'td', html = '') {
        const cell = document.createElement(type);
        if (html) cell.innerHTML = html;
        else cell.textContent = text;
        return cell;
    }

    function sortTableByDate() {
        const tbody = costTable.querySelector('tbody');
        Array.from(tbody.rows)
            .sort((a, b) => new Date(a.cells[1].querySelector('input').value) - new Date(b.cells[1].querySelector('input').value))
            .forEach(row => tbody.appendChild(row));
        updateRowNumbers();
    }


    function updateTotals() {
        let totalDouble = 0;

        // Sum all Double column values
        costTable.querySelectorAll('tbody tr').forEach(tr => {
            totalDouble += parseFloat(tr.querySelector('.double-col').value) || 0;
        });
        document.getElementById('totalDouble').textContent = totalDouble.toFixed(2);

        // Get Explore Commission value
        const commission = parseFloat(document.getElementById('exploreCommission').value) || 0;

        // Calculate Grand Total
        const grandTotal = totalDouble + commission;
        document.getElementById('grandTotal').textContent = grandTotal.toFixed(2);

        // Get other cost items
        const dblRoom = parseFloat(document.getElementById('dblRoomCost').value) || 0;
        const entrance = parseFloat(document.getElementById('entranceTickets').value) || 0;
        const lunches = parseFloat(document.getElementById('lunchesDinners').value) || 0;

        // Cost Per Pax = grandTotal + dblRoom + entrance + lunches
        const costPerPax = grandTotal + dblRoom + entrance + lunches;
        document.getElementById('costPerPax').textContent = costPerPax.toFixed(2);
    }

    // Recalculate totals when any input changes
    costTable.addEventListener('input', updateTotals);
    document.getElementById('exploreCommission').addEventListener('input', updateTotals);
    document.getElementById('dblRoomCost').addEventListener('input', updateTotals);
    document.getElementById('entranceTickets').addEventListener('input', updateTotals);
    document.getElementById('lunchesDinners').addEventListener('input', updateTotals);

    // Update totals on row add/remove
    document.getElementById('addRowBtn').addEventListener('click', updateTotals);
    document.getElementById('addColBtn').addEventListener('click', updateTotals);
    document.addEventListener('click', e => {
        if (e.target.classList.contains('remove-row')) updateTotals();
    });

    // Initial total calculation
    updateTotals();

    function updateTransportTotals() {
    const rows = document.querySelectorAll('#transportTable tbody tr');

    rows.forEach(tr => {
        const rsPerKm = parseFloat(tr.querySelector('.rsPerKm').value) || 0;
        const km = parseFloat(tr.querySelector('.km').value) || 0;
        const days = parseFloat(tr.querySelector('.days').value) || 0;
        const batta = parseFloat(tr.querySelector('.batta').value) || 0;
        const transportUsd = parseFloat(tr.querySelector('.transportUsd').value) || 0;
        const lGuideUsd = parseFloat(tr.querySelector('.lGuideUsd').value) || 0;

        // Calculated fields
        const totalRs = rsPerKm * km;
        const transportRs = totalRs + batta;
        const totalCost = transportRs + transportUsd + lGuideUsd;
        let pax = tr.cells[0].textContent.split('-');
        let paxCount = pax.length === 2 ? (parseInt(pax[1]) + parseInt(pax[0])) / 2 : parseInt(pax[0]); // approximate if range
        const costPP = paxCount ? totalCost / paxCount : totalCost;

        tr.querySelector('.totalRs').textContent = totalRs.toFixed(2);
        tr.querySelector('.transportRs').textContent = transportRs.toFixed(2);
        tr.querySelector('.totalCost').textContent = totalCost.toFixed(2);
        tr.querySelector('.costPP').textContent = costPP.toFixed(2);
    });
}

// Recalculate on input
document.querySelectorAll('#transportTable input').forEach(input => {
    input.addEventListener('input', updateTransportTotals);
});

// Initial calculation
updateTransportTotals();

function updateTransportSummary() {
    // Get total Transport USD from Transport Chart
    let totalTransportUSD = 0;
    document.querySelectorAll('#transportTable tbody tr').forEach(tr => {
        totalTransportUSD += parseFloat(tr.querySelector('.totalCost').textContent) || 0;
    });

    // Get total pax from itinerary (sum adults + children + infants)
    const adults = parseInt("<?= $itinerary['adults'] ?? 0 ?>");
    const children_6_11 = parseInt("<?= $itinerary['children_6_11'] ?? 0 ?>");
    const children_above_11 = parseInt("<?= $itinerary['children_above_11'] ?? 0 ?>");
    const infants = parseInt("<?= $itinerary['infants'] ?? 0 ?>");
    const totalPax = adults + children_6_11 + children_above_11 + infants;

    const transportUSDTotal = totalTransportUSD * totalPax;
    const discount = transportUSDTotal * 0.10; // 10%
    const tripCost = transportUSDTotal - discount;

    document.getElementById('transportTotalUSD').textContent = transportUSDTotal.toFixed(2);
    document.getElementById('discountAmount').textContent = discount.toFixed(2);
    document.getElementById('tripCost').textContent = tripCost.toFixed(2);
}

// Call this function whenever Transport Chart changes
document.querySelectorAll('#transportTable input').forEach(input => {
    input.addEventListener('input', updateTransportSummary);
});

// Initial calculation
updateTransportSummary();


</script>
</body>
</html>
