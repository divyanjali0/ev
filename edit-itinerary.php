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

// Fetch all themes and cities
$themes = $conn->query("SELECT id, theme_name FROM tour_themes ORDER BY theme_name")->fetchAll(PDO::FETCH_ASSOC);
$cities = $conn->query("SELECT id, name FROM cities ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

// Fetch latest itinerary version from history or fallback to main table
$stmt = $conn->prepare("SELECT * FROM itinerary_customer_history WHERE itinerary_id = :id ORDER BY version_number DESC LIMIT 1");
$stmt->execute(['id' => $id]);
$itinerary = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$itinerary) {
    // fallback to main table if no history exists
    $stmt = $conn->prepare("SELECT * FROM itinerary_customer WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $itinerary = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$itinerary) {
        echo "Itinerary not found!";
        exit;
    }
}

// Decode JSON arrays for dropdown pre-selection
$selectedThemes = json_decode($itinerary['theme_ids'] ?? '[]', true) ?: [];
$selectedCities = json_decode($itinerary['city_ids'] ?? '[]', true) ?: [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = [
        'vehicle_id', 'reference_no', 'start_date', 'end_date', 'nights',
        'adults', 'children_6_11', 'children_above_11', 'infants', 'hotel_rating', 'meal_plan',
        'allergy_issues', 'allergy_reason', 'title', 'full_name', 'email', 'whatsapp_code', 'whatsapp',
        'country', 'nationality', 'flight_number', 'remarks', 'pickup_location', 'dropoff_location'
    ];

    $insertData = [];
    foreach ($fields as $f) {
        $insertData[$f] = $_POST[$f] ?? null;
    }

    // Multi-select JSON fields
    $insertData['theme_ids'] = isset($_POST['theme_ids']) ? json_encode($_POST['theme_ids']) : json_encode([]);
    $insertData['city_ids']  = isset($_POST['city_ids']) ? json_encode($_POST['city_ids']) : json_encode([]);

    try {
        $conn->beginTransaction();

        // Determine next version number
        $stmt = $conn->prepare("SELECT COALESCE(MAX(version_number),0) + 1 AS next_version FROM itinerary_customer_history WHERE itinerary_id = :id");
        $stmt->execute(['id' => $id]);
        $nextVersion = $stmt->fetchColumn();

        $dayCityDetails = [];

        if (!empty($_POST['day_city'])) {
            foreach ($_POST['day_city'] as $dayNum => $cityId) {
                if (empty($cityId)) continue;

                $desc = $_POST['day_desc'][$dayNum] ?? '';
                $date = $_POST['day_date'][$dayNum] ?? '';
                $meal = $_POST['day_meal'][$dayNum] ?? '';

                $imagesArr = [];
                $uploadDir = __DIR__ . "/uploads/city_images/";
                if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);

                if (!empty($_FILES['day_images']['name'][$dayNum])) {
                    foreach ($_FILES['day_images']['name'][$dayNum] as $key => $name) {
                        $tmp = $_FILES['day_images']['tmp_name'][$dayNum][$key];
                        if (is_uploaded_file($tmp)) {
                            $ext = pathinfo($name, PATHINFO_EXTENSION);
                            $newName = uniqid('cityimg_') . '.' . $ext;
                            move_uploaded_file($tmp, $uploadDir . $newName);
                            $imagesArr[] = $newName;
                        }
                    }
                }

                $dayCityDetails[] = [
                    'day' => $dayNum,
                    'city_id' => $cityId,
                    'date' => $date,
                    'meal_plan' => $meal,
                    'description' => $desc,
                    'images' => $imagesArr
                ];
            }
        }

        $insertData['day_city_details'] = json_encode($dayCityDetails);


$hotelsData = [];

if (!empty($_POST['hotels'])) {
    foreach ($_POST['hotels'] as $dayNum => $hotelInfo) {
        if (!empty($hotelInfo['name'])) {
            $hotelsData[$dayNum] = [
                'name' => $hotelInfo['name'],
                'link' => $hotelInfo['link'] ?? ''
            ];
        }
    }
}

$insertData['hotels'] = json_encode($hotelsData);



        // Then insert into itinerary_customer_history as before
        $insertSql = "INSERT INTO itinerary_customer_history
            (vehicle_id, reference_no, itinerary_id, edited_by, edit_reason, theme_ids, city_ids, start_date, end_date, nights, adults,
            children_6_11, children_above_11, infants, hotel_rating, meal_plan, allergy_issues, allergy_reason,
            title, full_name, email, whatsapp_code, whatsapp, country, nationality, flight_number,
            pickup_location, dropoff_location, remarks, day_city_details, hotels, version_number)
            VALUES
            (:vehicle_id, :reference_no, :itinerary_id, :edited_by, :edit_reason, :theme_ids, :city_ids, :start_date, :end_date, :nights, :adults,
            :children_6_11, :children_above_11, :infants, :hotel_rating, :meal_plan, :allergy_issues, :allergy_reason,
            :title, :full_name, :email, :whatsapp_code, :whatsapp, :country, :nationality, :flight_number,
            :pickup_location, :dropoff_location, :remarks, :day_city_details,:hotels, :version_number)";

        $stmtInsert = $conn->prepare($insertSql);
        $params = array_merge($insertData, [
            'itinerary_id'   => $id,
            'edited_by'      => $_SESSION['user_id'],
            'edit_reason'    => 'Edited via dashboard',
            'version_number' => $nextVersion
        ]);
        $stmtInsert->execute($params);


        $conn->commit();

        header("Location: itenary-request.php?success=1");
        exit;

    } catch (Exception $e) {
        $conn->rollBack();
        echo "<pre>Error saving itinerary: " . $e->getMessage() . "</pre>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Itinerary | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/footer-logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>.select2-container .select2-selection--multiple { height: auto; }
            body { font-family: "Cambria", sans-serif; background-color: #f4f6f8; font-size: 12px; }

        .container { max-width: max-content; }

        #dayDetailsContainer {
    display: flex;
}
.day-block {
    margin-bottom: 20px;
}

h5 {
    font-weight: 600;
}

.day-block label {
    font-weight: 500;
}

    </style>
</head>
<body>
<div class="d-flex">
    <?php include __DIR__ . '/assets/includes/sidebar.php'; ?>
    <div class="flex-grow-1 container-fluid mt-4">
        <div class="card p-4">
            <h2 class="mb-4 text-center fw-bold">Edit Itinerary</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="accordion" id="editItineraryAccordion">

                    <!-- General Details -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingGeneral">
                            <button class="fw-bold accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGeneral" aria-expanded="true">
                                General Details
                            </button>
                        </h2>
                        <div id="collapseGeneral" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <!-- Reference & Vehicle -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Reference No</label>
                                        <input type="text" name="reference_no" class="form-control" value="<?= htmlspecialchars($itinerary['reference_no']); ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Vehicle ID</label>
                                        <input type="text" name="vehicle_id" class="form-control" value="<?= htmlspecialchars($itinerary['vehicle_id']); ?>">
                                    </div>
                                </div>

                                <!-- Dates & Nights -->
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label>Start Date</label>
                                        <input type="date" name="start_date" class="form-control" value="<?= htmlspecialchars($itinerary['start_date']); ?>" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>End Date</label>
                                        <input type="date" name="end_date" class="form-control" value="<?= htmlspecialchars($itinerary['end_date']); ?>" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Nights</label>
                                        <input type="number" name="nights" class="form-control" value="<?= htmlspecialchars($itinerary['nights']); ?>">
                                    </div>
                                </div>

                                <!-- Participants -->
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label>Adults</label>
                                        <input type="number" name="adults" class="form-control" value="<?= htmlspecialchars($itinerary['adults']); ?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>Children 6-11</label>
                                        <input type="number" name="children_6_11" class="form-control" value="<?= htmlspecialchars($itinerary['children_6_11']); ?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>Children 12+</label>
                                        <input type="number" name="children_above_11" class="form-control" value="<?= htmlspecialchars($itinerary['children_above_11']); ?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>Infants</label>
                                        <input type="number" name="infants" class="form-control" value="<?= htmlspecialchars($itinerary['infants']); ?>">
                                    </div>
                                </div>

                                <!-- Hotel & Meal -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Hotel Rating</label>
                                        <input type="text" name="hotel_rating" class="form-control" value="<?= htmlspecialchars($itinerary['hotel_rating']); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Meal Plan</label>
                                        <input type="text" name="meal_plan" class="form-control" value="<?= htmlspecialchars($itinerary['meal_plan']); ?>">
                                    </div>
                                </div>

                                <!-- Allergies -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Allergy Issues</label>
                                        <input type="text" name="allergy_issues" class="form-control" value="<?= htmlspecialchars($itinerary['allergy_issues']); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Allergy Reason</label>
                                        <textarea name="allergy_reason" class="form-control"><?= htmlspecialchars($itinerary['allergy_reason']); ?></textarea>
                                    </div>
                                </div>

                                <!-- Personal Info -->
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($itinerary['title']); ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Full Name</label>
                                        <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($itinerary['full_name']); ?>" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($itinerary['email']); ?>">
                                    </div>
                                </div>

                                <!-- WhatsApp & Contact -->
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label>WhatsApp Code</label>
                                        <input type="text" name="whatsapp_code" class="form-control" value="<?= htmlspecialchars($itinerary['whatsapp_code']); ?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>WhatsApp Number</label>
                                        <input type="text" name="whatsapp" class="form-control" value="<?= htmlspecialchars($itinerary['whatsapp']); ?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>Country</label>
                                        <input type="text" name="country" class="form-control" value="<?= htmlspecialchars($itinerary['country']); ?>">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>Nationality</label>
                                        <input type="text" name="nationality" class="form-control" value="<?= htmlspecialchars($itinerary['nationality']); ?>">
                                    </div>
                                </div>

                                <!-- Flight & Locations -->
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label>Flight Number</label>
                                        <input type="text" name="flight_number" class="form-control" value="<?= htmlspecialchars($itinerary['flight_number']); ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Pickup Location</label>
                                        <input type="text" name="pickup_location" class="form-control" value="<?= htmlspecialchars($itinerary['pickup_location']); ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Dropoff Location</label>
                                        <input type="text" name="dropoff_location" class="form-control" value="<?= htmlspecialchars($itinerary['dropoff_location']); ?>">
                                    </div>
                                </div>

                                <!-- Remarks -->
                                <div class="mb-3">
                                    <label>Remarks</label>
                                    <textarea name="remarks" class="form-control"><?= htmlspecialchars($itinerary['remarks']); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Themes & Cities -->
                    <div class="accordion-item mt-3">
                        <h2 class="accordion-header" id="headingThemesCities">
                            <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThemesCities">
                                Tour Details
                            </button>
                        </h2>
                        <div id="collapseThemesCities" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Themes</label>
                                        <select name="theme_ids[]" class="form-control select2" multiple="multiple">
                                            <?php foreach ($themes as $theme): ?>
                                                <option value="<?= $theme['id']; ?>" <?= in_array((string)$theme['id'], $selectedThemes, true) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($theme['theme_name']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Cities</label>
                                        <select name="city_ids[]" class="form-control select2" multiple="multiple">
                                            <?php foreach ($cities as $city): ?>
                                                <option value="<?= $city['id']; ?>" <?= in_array((string)$city['id'], $selectedCities, true) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($city['name']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Day-wise City Details -->
                    <div class="accordion-item mt-3">
                        <h2 class="accordion-header" id="headingCityDetails">
                            <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCityDetails">
                                Day-wise City Details
                            </button>
                        </h2>
                        <div id="collapseCityDetails" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div id="dayDetailsContainer" class="row g-3">
                                    <!-- Day 1 -->
                                    <div class="day-block col-md-6" data-day="1">
                                        <h5>Day 1</h5>
                                        <button type="button" class="mb-2 btn btn-danger btn-sm float-end remove-day-btn"><i class="bi bi-trash"></i></button>

                                        <div class="mb-2 row">
                                            <div class="col-md-6">
                                                <label>Select City</label>
                                                <select name="day_city[1]" class="form-control">
                                                    <option value="">-- Select City --</option>
                                                    <?php foreach ($selectedCities as $cityId): 
                                                        $cityName = array_values(array_filter($cities, fn($c) => $c['id'] == $cityId))[0]['name'] ?? '';
                                                    ?>
                                                    <option value="<?= $cityId; ?>"><?= htmlspecialchars($cityName); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Date</label>
                                                <input type="date" name="day_date[1]" class="form-control">
                                            </div>
                                        </div>

                                        <div class="mb-2 row">
                                            <div class="col-md-6">
                                                <label>Images</label>
                                                <input type="file" name="day_images[1][]" multiple class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Meal Plan</label>
                                                <select name="day_meal[1]" class="form-control">
                                                    <option value="">-- Select Meal Plan --</option>
                                                    <option value="Breakfast">Breakfast</option>
                                                    <option value="Lunch">Lunch</option>
                                                    <option value="Dinner">Dinner</option>
                                                    <option value="Breakfast + Lunch">Breakfast + Lunch</option>
                                                    <option value="All Meals">All Meals</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <label>Description</label>
                                            <div id="descEditor1" class="quill-editor"></div>
                                            <input type="hidden" name="day_desc[1]" id="day_desc_1">
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Day Button -->
                                <div class="mt-3">
                                    <button type="button" id="addDayBtn" class="btn btn-secondary btn-sm">Add Another Day</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Day-wise Hotel Details -->
                    <div class="accordion-item mt-3">
                        <h2 class="accordion-header" id="headingHotels">
                            <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHotels">
                                Day-wise Hotels
                            </button>
                        </h2>
                        <div id="collapseHotels" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div id="hotelContainer" class="row g-3">
                                    <!-- Hotel days will be appended here dynamically -->
                                </div>

                                <div class="mt-3">
                                    <button type="button" id="addHotelDayBtn" class="btn btn-secondary btn-sm">Add Hotel for Next Day</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3 d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-success">Update Itinerary</button>
                    <a href="itenary-request.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<script>
let dayCount = 1;
const quillEditors = {};

function initQuill(id) {
    quillEditors[id] = new Quill(`#${id}`, { theme: 'snow' });
}

initQuill('descEditor1');

function getCurrentCities() {
    return $('select[name="city_ids[]"]').val() || [];
}

// Update day dropdowns when cities change
$('select[name="city_ids[]"]').on('change', function() {
    const selectedCities = $(this).val() || [];
    $('#dayDetailsContainer select').each(function() {
        const oldVal = $(this).val();
        $(this).html('<option value="">-- Select City --</option>');
        selectedCities.forEach(function(id) {
            const text = $('select[name="city_ids[]"] option[value="' + id + '"]').text();
            $(this).append(`<option value="${id}">${text}</option>`);
        }.bind(this));
        if (selectedCities.includes(oldVal)) $(this).val(oldVal);
    });
});

// Add new day
$('#addDayBtn').click(function() {
    dayCount++;
    let cities = getCurrentCities();
    let optionsHtml = '<option value="">-- Select City --</option>';
    cities.forEach(function(id) {
        let text = $('select[name="city_ids[]"] option[value="' + id + '"]').text();
        optionsHtml += `<option value="${id}">${text}</option>`;
    });

    let dayHtml = `
    <div class="day-block col-md-6" data-day="${dayCount}">
        <h5>Day ${dayCount}</h5>
        <button type="button" class="btn btn-danger btn-sm float-end remove-day-btn"><i class="bi bi-trash"></i></button>

        <div class="mb-2 row">
            <div class="col-md-6">
                <label>Select City</label>
                <select name="day_city[${dayCount}]" class="form-control">
                    ${optionsHtml}
                </select>
            </div>
            <div class="col-md-6">
                <label>Date</label>
                <input type="date" name="day_date[${dayCount}]" class="form-control">
            </div>
        </div>

        <div class="mb-2 row">
            <div class="col-md-6">
                <label>Images</label>
                <input type="file" name="day_images[${dayCount}][]" multiple class="form-control">
            </div>
            <div class="col-md-6">
                <label>Meal Plan</label>
                <select name="day_meal[${dayCount}]" class="form-control">
                    <option value="">-- Select Meal Plan --</option>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Breakfast + Lunch">Breakfast + Lunch</option>
                    <option value="All Meals">All Meals</option>
                </select>
            </div>
        </div>

        <div class="mb-2">
            <label>Description</label>
            <div id="descEditor${dayCount}" class="quill-editor"></div>
            <input type="hidden" name="day_desc[${dayCount}]" id="day_desc_${dayCount}">
        </div>
    </div>
    `;

    $('#dayDetailsContainer').append(dayHtml);
    initQuill(`descEditor${dayCount}`);
});


// Remove day
$(document).on('click', '.remove-day-btn', function() {
    const dayBlock = $(this).closest('.day-block');
    const dayId = dayBlock.data('day');

    // Remove Quill editor instance
    if (quillEditors[`descEditor${dayId}`]) {
        delete quillEditors[`descEditor${dayId}`];
    }

    dayBlock.remove();
});

let hotelDayCount = 0;

$('#addHotelDayBtn').click(function() {
    hotelDayCount++;
    
    let hotelHtml = `
    <div class="hotel-block col-md-12" data-day="${hotelDayCount}">
        <button type="button" class="btn btn-danger btn-sm float-end remove-hotel-day-btn"><i class="bi bi-trash"></i></button>

        <div class="row">

            <div class="col-md-2 d-flex align-items-center">
                <h5>Day ${hotelDayCount} Hotel</h5>
            </div>
            <div class="col-md-5">
                <input type="text" name="hotels[${hotelDayCount}][name]" class="form-control" placeholder="Hotel Name">
            </div>
            <div class="col-md-5">
                <input type="url" name="hotels[${hotelDayCount}][link]" class="form-control" placeholder="Hotel Website">
            </div>
        </div>
    </div>
    `;
    $('#hotelContainer').append(hotelHtml);
});

// Remove hotel day
$(document).on('click', '.remove-hotel-day-btn', function() {
    $(this).closest('.hotel-block').remove();
});



// Copy Quill content before form submit
$('form').submit(function() {
    for (let i = 1; i <= dayCount; i++) {
        if (quillEditors[`descEditor${i}`]) {
            $(`#day_desc_${i}`).val(quillEditors[`descEditor${i}`].root.innerHTML);
        }
    }
});
</script>

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
