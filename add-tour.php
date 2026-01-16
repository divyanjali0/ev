<?php
    session_start();
    require_once __DIR__ . '/assets/includes/db_connect.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Generate reference number
        $referenceNo = 'EV-' . strtoupper(uniqid());

        // Sanitize & prepare arrays
        $themeIds = !empty($_POST['theme_ids']) ? [(int)$_POST['theme_ids']] : [];
        $cityIds  = $_POST['city_ids'] ?? [];

        $themeIdsJson = json_encode($themeIds);
        $cityIdsJson  = json_encode(array_map('intval', $cityIds));

        // Bed types (store as JSON for future flexibility)
        $bedTypesJson = json_encode($_POST['bed_types'] ?? []);

        $stmt = $conn->prepare("
            INSERT INTO itinerary_customer (
                reference_no,
                theme_ids,
                city_ids,
                start_date,
                end_date,
                nights,
                adults,
                children_6_11,
                children_above_11,
                infants,
                hotel_rating,
                meal_plan,
                allergy_issues,
                allergy_reason,
                pickup_location,
                dropoff_location,
                title,
                full_name,
                email,
                whatsapp_code,
                whatsapp,
                country,
                flight_number,
                remarks,
                bed_types
            ) VALUES (
                :reference_no,
                :theme_ids,
                :city_ids,
                :start_date,
                :end_date,
                :nights,
                :adults,
                :children_6_11,
                :children_above_11,
                :infants,
                :hotel_rating,
                :meal_plan,
                :allergy_issues,
                :allergy_reason,
                :pickup_location,
                :dropoff_location,
                :title,
                :full_name,
                :email,
                :whatsapp_code,
                :whatsapp,
                :country,
                :flight_number,
                :remarks,
                :bed_types
            )
        ");

        $stmt->execute([
            ':reference_no'        => $referenceNo,
            ':theme_ids'           => $themeIdsJson,
            ':city_ids'            => $cityIdsJson,
            ':start_date'          => $_POST['start_date'] ?? null,
            ':end_date'            => $_POST['end_date'] ?? null,
            ':nights'              => $_POST['nights'] ?? 0,
            ':adults'              => $_POST['adults'] ?? 0,
            ':children_6_11'       => $_POST['children_6_11'] ?? 0,
            ':children_above_11'   => $_POST['children_above_11'] ?? 0,
            ':infants'             => $_POST['infants'] ?? 0,
            ':hotel_rating'        => $_POST['hotel_rating'] ?? null,
            ':meal_plan'           => $_POST['meal_plan'] ?? null,
            ':allergy_issues'      => $_POST['allergy_issues'] ?? 'No',
            ':allergy_reason'      => $_POST['allergy_reason'] ?? null,
            ':pickup_location'     => $_POST['pickup_location'] ?? null,
            ':dropoff_location'    => $_POST['dropoff_location'] ?? null,
            ':title'               => $_POST['title'] ?? null,
            ':full_name'           => $_POST['full_name'] ?? null,
            ':email'               => $_POST['email'] ?? null,
            ':whatsapp_code'       => $_POST['whatsapp_code'] ?? null,
            ':whatsapp'            => $_POST['whatsapp'] ?? null,
            ':country'             => $_POST['country'] ?? null,
            ':flight_number'       => $_POST['flight_number'] ?? null,
            ':remarks'             => $_POST['remarks'] ?? null,
            ':bed_types'           => $bedTypesJson
        ]);

        $_SESSION['success_message'] = "Tour saved successfully!";
        header("Location: itenary-request.php");
        exit;
    }

    // Fetch Tour Themes
    $themes = $conn->query("SELECT id, theme_name FROM tour_themes ORDER BY theme_name")->fetchAll(PDO::FETCH_ASSOC);

    // Fetch Cities
    $cities = $conn->query("SELECT id, name FROM cities ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

    // Fetch Country Codes
    $countryCodes = $conn->query("SELECT id, country_name, country_code FROM country_codes ORDER BY country_name")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Itinerary Requests | Dashboard</title>
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

<body>
    <div class="d-flex">
        <?php include __DIR__ . '/assets/includes/sidebar.php'; ?>
        <div class="flex-grow-1">
            <div class="container-fluid">
                <div class="dashboard-card">
                    <h4 class="mb-4 fw-bold">Add Tour</h4>
                    <form action="" method="POST">
                        <!-- Row 1 -->
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Tour Theme <span class="text-danger">*</span></label>
                                <select name="theme_ids" class="form-select" required>
                                    <option value="">Select Theme</option>
                                    <?php foreach ($themes as $theme): ?>
                                        <option value="<?= $theme['id'] ?>">
                                            <?= htmlspecialchars($theme['theme_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-8">
                                <label class="form-label">Cities <span class="text-danger">*</span></label>
                                <select name="city_ids[]" class="form-select select2" multiple required>
                                    <?php foreach ($cities as $city): ?>
                                        <option value="<?= $city['id'] ?>">
                                            <?= htmlspecialchars($city['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <hr>

                        <!-- Row 2 -->
                        <div class="row g-3 mt-2">
                            <div class="col-md-4">
                                <label class="form-label">Start Date <span class="text-danger">*</span></label>
                                <input type="date" name="start_date" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">End Date <span class="text-danger">*</span></label>
                                <input type="date" name="end_date" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Nights</label>
                                <input type="number" name="nights" id="nights" class="form-control" readonly>
                            </div>
                        </div>

                        <!-- Row 3 -->
                        <div class="row g-3 mt-2">
                            <div class="col-md-3">
                                <label class="form-label">Adults <span class="text-danger">*</span></label>
                                <input type="number" name="adults" class="form-control" required>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Children (6–11)</label>
                                <input type="number" name="children_6_11" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Children (Above 11)</label>
                                <input type="number" name="children_above_11" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Infants</label>
                                <input type="number" name="infants" class="form-control">
                            </div>
                        </div>

                        <!-- Row 4 -->
                        <div class="row g-3 mt-2">
                            <div class="col-md-3">
                                <label class="form-label">Hotel Rating <span class="text-danger">*</span></label>
                                <select name="hotel_rating" class="form-select" require>
                                    <option value="">Select</option>
                                    <option>3 Star</option>
                                    <option>4 Star</option>
                                    <option>5 Star</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Meal Plan <span class="text-danger">*</span></label>
                                <input type="text" name="meal_plan" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Allergy Issues <span class="text-danger">*</span> </label>
                                <select name="allergy_issues" class="form-select" required>
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Allergy Reason</label>
                                <input type="text" name="allergy_reason" class="form-control">
                            </div>
                        </div>

                        <hr>

                        <!-- Row 6 -->
                        <div class="row g-3 mt-2">
                            <div class="col-md-4">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <select name="title" class="form-select" required>
                                    <option>Mr</option>
                                    <option>Mrs</option>
                                    <option>Ms</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="full_name" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>

                        <!-- Row 7 -->
                        <div class="row g-3 mt-2">
                            <div class="col-md-4">
                                <label class="form-label">WhatsApp Code <span class="text-danger">*</span></label>
                                <select name="whatsapp_code" class="form-select select2" required>
                                    <option value="">Select Code</option>
                                    <?php foreach ($countryCodes as $code): ?>
                                        <option value="<?= $code['country_code'] ?>">
                                            <?= htmlspecialchars($code['country_name']) ?> (<?= $code['country_code'] ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">WhatsApp Number <span class="text-danger">*</span></label>
                                <input type="text" name="whatsapp" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Country <span class="text-danger">*</span></label>
                                <input type="text" name="country" class="form-control" required>
                            </div>
                        </div>

                        <!-- Row 8 -->
                        <div class="row g-3 mt-2">
                            <div class="col-md-4">
                                <label class="form-label">Flight Number</label>
                                <input type="text" name="flight_number" class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Pickup Location</label>
                                <input type="text" name="pickup_location" class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Dropoff Location</label>
                                <input type="text" name="dropoff_location" class="form-control">
                            </div>
                        </div>

                        <!-- Row 9 -->
                        <div class="row g-3 mt-2">
                            <div class="col-md-4">
                                <label class="form-label">Bed Types</label>
                                <input type="text" name="bed_types[]" class="form-control" placeholder="e.g. King, Twin">
                            </div>
                        </div>

                        <hr>

                        <div class="col-md-12">
                            <label class="form-label">Remarks</label>
                            <textarea name="remarks" class="form-control" rows="5"></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="mt-4 text-end">
                            <a href="itenary-request.php" class="btn btn-secondary">
                                <i class="bi bi-cancel"></i> Cancel
                            </a>

                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save"></i> Save Tour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select an option",
                allowClear: true,
                width: '100%'
            });
        });
    </script>

    <script>
        function calculateNights() {
            const start = document.querySelector('input[name="start_date"]').value;
            const end   = document.querySelector('input[name="end_date"]').value;
            const nightsInput = document.getElementById('nights');

            if (start && end) {
                const startDate = new Date(start);
                const endDate   = new Date(end);

                const diffTime = endDate - startDate;
                const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

                nightsInput.value = diffDays > 0 ? diffDays : 0;
            } else {
                nightsInput.value = '';
            }
        }

        document.querySelector('input[name="start_date"]').addEventListener('change', calculateNights);
        document.querySelector('input[name="end_date"]').addEventListener('change', calculateNights);
    </script>
</body>

</html>