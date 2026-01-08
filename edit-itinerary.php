<?php
session_start();
require_once __DIR__ . '/assets/includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Get itinerary ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: itenary-request.php");
    exit;
}

$id = $_GET['id'];

// Fetch all themes and cities for dropdowns
$themes = $conn->query("SELECT id, theme_name FROM tour_themes ORDER BY theme_name")->fetchAll(PDO::FETCH_ASSOC);
$cities = $conn->query("SELECT id, name FROM cities ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

// Fetch itinerary data
$sql = "SELECT * FROM itinerary_customer WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);
$itinerary = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$itinerary) {
    echo "Itinerary not found!";
    exit;
}

$selectedThemes = json_decode($itinerary['theme_ids'], true) ?: [];
$selectedCities = json_decode($itinerary['city_ids'], true) ?: [];


// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = [
        'vehicle_id', 'reference_no', 'start_date', 'end_date', 'nights',
        'adults', 'children_6_11', 'children_above_11', 'infants', 'hotel_rating', 'meal_plan',
        'allergy_issues', 'allergy_reason', 'title', 'full_name', 'email', 'whatsapp_code', 'whatsapp',
        'country', 'nationality', 'flight_number', 'remarks', 'pickup_location', 'dropoff_location'
    ];

    $updateData = [];
    foreach ($fields as $f) {
        $updateData[$f] = $_POST[$f] ?? null;
    }

    // Handle theme_ids and city_ids from multi-select
    $updateData['theme_ids'] = isset($_POST['theme_ids']) ? implode(',', $_POST['theme_ids']) : '';
    $updateData['city_ids'] = isset($_POST['city_ids']) ? implode(',', $_POST['city_ids']) : '';

    $setSql = implode(", ", array_map(fn($f) => "$f = :$f", array_merge($fields, ['theme_ids','city_ids'])));
    $updateSql = "UPDATE itinerary_customer SET $setSql, updated_at = NOW() WHERE id = :id";
    $stmt = $conn->prepare($updateSql);
    $updateData['id'] = $id;
    $stmt->execute($updateData);

    header("Location: itenary-request.php?success=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Itinerary | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .select2-container .select2-selection--multiple { height: auto; }
    </style>
</head>
<body>
<div class="d-flex">
    <?php include __DIR__ . '/assets/includes/sidebar.php'; ?>
    <div class="flex-grow-1 container-fluid mt-4">

        <div class="card p-4">
            <h2 class="mb-4 text-center fw-bold">Edit Itinerary</h2>

            <div class="accordion" id="editItineraryAccordion">

                <!-- Accordion 1: General & Trip Details -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingGeneral">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGeneral" aria-expanded="true" aria-controls="collapseGeneral">
                            General & Trip Details
                        </button>
                    </h2>
                    <div id="collapseGeneral" class="accordion-collapse collapse show" aria-labelledby="headingGeneral" data-bs-parent="#editItineraryAccordion">
                        <div class="accordion-body">
                            <form method="POST">

                                <!-- Reference & Vehicle -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Reference No</label>
                                        <input type="text" name="reference_no" class="form-control" value="<?= htmlspecialchars($itinerary['reference_no']); ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Vehicle ID</label>
                                        <input type="text" name="vehicle_id" class="form-control" value="<?= htmlspecialchars($itinerary['vehicle_id']); ?>">
                                    </div>
                                </div>

                                <!-- Dates & Nights -->
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Start Date</label>
                                        <input type="date" name="start_date" class="form-control" value="<?= htmlspecialchars($itinerary['start_date']); ?>" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">End Date</label>
                                        <input type="date" name="end_date" class="form-control" value="<?= htmlspecialchars($itinerary['end_date']); ?>" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Nights</label>
                                        <input type="number" name="nights" class="form-control" value="<?= htmlspecialchars($itinerary['nights']); ?>">
                                    </div>
                                </div>

                                <!-- Participants -->
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Adults</label>
                                        <input type="number" name="adults" class="form-control" value="<?= htmlspecialchars($itinerary['adults']); ?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Children 6-11</label>
                                        <input type="number" name="children_6_11" class="form-control" value="<?= htmlspecialchars($itinerary['children_6_11']); ?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Children 12+</label>
                                        <input type="number" name="children_above_11" class="form-control" value="<?= htmlspecialchars($itinerary['children_above_11']); ?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Infants</label>
                                        <input type="number" name="infants" class="form-control" value="<?= htmlspecialchars($itinerary['infants']); ?>">
                                    </div>
                                </div>

                                <!-- Hotel & Meal -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Hotel Rating</label>
                                        <input type="text" name="hotel_rating" class="form-control" value="<?= htmlspecialchars($itinerary['hotel_rating']); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Meal Plan</label>
                                        <input type="text" name="meal_plan" class="form-control" value="<?= htmlspecialchars($itinerary['meal_plan']); ?>">
                                    </div>
                                </div>

                                <!-- Allergies -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Allergy Issues</label>
                                        <input type="text" name="allergy_issues" class="form-control" value="<?= htmlspecialchars($itinerary['allergy_issues']); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Allergy Reason</label>
                                        <textarea name="allergy_reason" class="form-control"><?= htmlspecialchars($itinerary['allergy_reason']); ?></textarea>
                                    </div>
                                </div>

                                <!-- Personal Info -->
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($itinerary['title']); ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($itinerary['full_name']); ?>" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($itinerary['email']); ?>">
                                    </div>
                                </div>

                                <!-- WhatsApp & Contact -->
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">WhatsApp Code</label>
                                        <input type="text" name="whatsapp_code" class="form-control" value="<?= htmlspecialchars($itinerary['whatsapp_code']); ?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">WhatsApp Number</label>
                                        <input type="text" name="whatsapp" class="form-control" value="<?= htmlspecialchars($itinerary['whatsapp']); ?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Country</label>
                                        <input type="text" name="country" class="form-control" value="<?= htmlspecialchars($itinerary['country']); ?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Nationality</label>
                                        <input type="text" name="nationality" class="form-control" value="<?= htmlspecialchars($itinerary['nationality']); ?>">
                                    </div>
                                </div>

                                <!-- Flight & Locations -->
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Flight Number</label>
                                        <input type="text" name="flight_number" class="form-control" value="<?= htmlspecialchars($itinerary['flight_number']); ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Pickup Location</label>
                                        <input type="text" name="pickup_location" class="form-control" value="<?= htmlspecialchars($itinerary['pickup_location']); ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Dropoff Location</label>
                                        <input type="text" name="dropoff_location" class="form-control" value="<?= htmlspecialchars($itinerary['dropoff_location']); ?>">
                                    </div>
                                </div>

                                <!-- Remarks -->
                                <div class="mb-3">
                                    <label class="form-label">Remarks</label>
                                    <textarea name="remarks" class="form-control"><?= htmlspecialchars($itinerary['remarks']); ?></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Accordion 2: Themes & Cities -->
                <div class="accordion-item mt-3">
                    <h2 class="accordion-header" id="headingThemesCities">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThemesCities" aria-expanded="false" aria-controls="collapseThemesCities">
                            Themes & Cities
                        </button>
                    </h2>
                    <div id="collapseThemesCities" class="accordion-collapse collapse" aria-labelledby="headingThemesCities" data-bs-parent="#editItineraryAccordion">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Themes</label>
                                    <select name="theme_ids[]" class="form-control select2" multiple="multiple">
                                        <?php foreach ($themes as $theme): ?>
                                            <option value="<?= $theme['id']; ?>" <?= in_array((string)$theme['id'], $selectedThemes, true) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($theme['theme_name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <?php if (!empty($selectedThemes)): ?>
                                        <div class="mt-2">
                                            <strong>Selected Themes:</strong>
                                            <?php foreach ($themes as $theme): ?>
                                                <?php if (in_array((string)$theme['id'], $selectedThemes, true)): ?>
                                                    <span class="badge bg-primary me-1"><?= htmlspecialchars($theme['theme_name']); ?></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Cities</label>
                                    <select name="city_ids[]" class="form-control select2" multiple="multiple">
                                        <?php foreach ($cities as $city): ?>
                                            <option value="<?= $city['id']; ?>" <?= in_array((string)$city['id'], $selectedCities, true) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($city['name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <?php if (!empty($selectedCities)): ?>
                                        <div class="mt-2">
                                            <strong>Selected Cities:</strong>
                                            <?php foreach ($cities as $city): ?>
                                                <?php if (in_array((string)$city['id'], $selectedCities, true)): ?>
                                                    <span class="badge bg-success me-1"><?= htmlspecialchars($city['name']); ?></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-3 d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-success">Update Itinerary</button>
                <a href="itenary-request.php" class="btn btn-secondary">Cancel</a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Select options",
        allowClear: true,
        width: '100%'
    });
});
</script>
</body>
</html>
