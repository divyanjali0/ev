<?php  return 'ob_start();

include (\'config-details.php\');
    include \'assets/includes/db_connect.php\';
    include \'assets/includes/save_itenary.php\';

    // Get selected city IDs
    $cityIDs = isset($_GET[\'cities\']) ? $_GET[\'cities\'] : \'\';
    $cityIDsArray = array_filter(explode(\',\', $cityIDs));

    $selectedCities = [];

    if (!empty($cityIDsArray)) {
        $placeholders = rtrim(str_repeat(\'?,\', count($cityIDsArray)), \',\');
        $query = "
            SELECT id, name
            FROM cities
            WHERE id IN ($placeholders)
        ";
        $stmt = $conn->prepare($query);
        $stmt->execute($cityIDsArray);
        $selectedCities = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Get selected theme IDs from URL
    $themeIDs = isset($_GET[\'themes\']) ? $_GET[\'themes\'] : \'\';
    $themeIDsArray = array_filter(explode(",", $themeIDs));

    $themesData = [];
    $allImages = [];

    if (!empty($themeIDsArray)) {

        // Create dynamic placeholders (?, ?, ?)
        $placeholders = rtrim(str_repeat(\'?,\', count($themeIDsArray)), \',\');
        $query = "SELECT * FROM tour_themes WHERE id IN ($placeholders)";
        $stmt = $conn->prepare($query);
        $stmt->execute($themeIDsArray);
        $themesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Collect all images into one array
        foreach ($themesData as $theme) {
            $images = json_decode($theme[\'theme_images\'], true);

            if ($images) {
                foreach ($images as $img) {
                    $allImages[] = $img;
                }
            }
        }
    }

    // Fetch country codes from DB
    $countryCodes = [];
    try {
        $stmt = $conn->prepare("SELECT country_name, country_code FROM country_codes ORDER BY country_name ASC");
        $stmt->execute();
        $countryCodes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        // Handle error
        error_log("Error fetching country codes: " . $e->getMessage());
    }

?>

<head>
    <style>

.is-invalid {
    border-color: #dc3545;
}

        .dropdown-menu {
            display: none;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .dropdown-menu.show {
            display: block;
            max-height: 500px; 
        }

        .input-group-sm > .btn, .input-group-sm > .form-control {
            height: 30px;
            font-size: 0.875rem;
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            font-size: 1.5rem;
            justify-content: flex-start;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #ddd;
            cursor: pointer;
            margin-right: 5px;
            transition: color 0.2s;
        }

        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: gold;
        }
    </style>
</head>

<body id="toursCustomizePage">
    <!-- Hero section starts -->
    <section id="hero">
        <img src="assets/images/cutomize-tour-hero.jpg" alt="Explore Vacations - Tours">
        <div class="hero-content">
            <h1>Customize Tours</h1>
        </div>
    </section>
    <!-- Hero section ends -->

    <!-- Customize Tours section starts -->
    <section id="customize-tour" class="py-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="[[~8]]">Cities</a></li>
                    <?php if (!empty($themesData)): ?>
                        <?php foreach ($themesData as $t): ?>
                            <li class="breadcrumb-item active">
                                <?php echo htmlspecialchars($t[\'theme_name\']); ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ol>
            </nav>

            <h2 class="heading mb-4">Plan Your Tour..</h2>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div id="tourCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php if (!empty($allImages)): ?>
                                    <?php foreach ($allImages as $index => $img): ?>
                                        <div class="carousel-item <?php echo $index === 0 ? \'active\' : \'\'; ?>">
                                            <img src="assets/<?php echo ltrim($img, \'/\'); ?>" class="d-block w-100 rounded" alt="Tour Image">
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="carousel-item active">
                                        <img src="assets/images/default-theme.jpg" class="d-block w-100 rounded" alt="No Image">
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="carousel-indicators">
                                <?php foreach ($allImages as $index => $img): ?>
                                    <button type="button" data-bs-target="#tourCarousel" data-bs-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? \'active\' : \'\'; ?>" aria-current="<?php echo $index === 0 ? \'true\' : \'false\'; ?>" aria-label="Slide <?php echo $index + 1; ?>"></button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

           <div id="customizeForm">
                <div class="intro row align-items-center mt-4">
                    <div class="col">
                        <p class="mb-0">
                            ✨Customize your trip, and send us your plan. We\'ll guide you through the next steps and put together a full itinerary with cozy stays 🏨, fun activities 🎉, and all the details you need...
                        </p>
                    </div>
                </div>
                <hr>

                <form method="post" action="" id="customTourForm">
                    <div class="row g-4">
                        <!-- Right Column -->
                        <div class="col-lg-7">
                            <!-- Dates & Guests -->
                            <div class="card mb-4 border-0">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Dates<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="date" class="form-control text-center" name="start_date" placeholder="Start Date">
                                            <input type="date" class="form-control text-center" name="end_date" placeholder="End Date">
                                            <input type="text" class="form-control text-center" name="nights" placeholder="Nights" min="1">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Guests<span class="text-danger">*</span></label>
                                        <div class="dropdown">
                                            <button class="form-control text-start" type="button" id="guestDropdownButton">
                                                2 Adults, 0 Children, 0 Infants
                                            </button>
                                            <div class="dropdown-menu p-3" id="guestDropdownMenu" style="min-width: 250px;">
                                                <!-- Adults -->
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span>Adults</span>
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <button class="btn btn-outline-secondary decrement" type="button" data-target="adults">-</button>
                                                        <input type="number" class="form-control text-center" id="adults" value="2" min="1" readonly>
                                                        <button class="btn btn-outline-secondary increment" type="button" data-target="adults">+</button>
                                                    </div>
                                                </div>
                                                <!-- Children 6-11 -->
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span>Children (6-11)</span>
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <button class="btn btn-outline-secondary decrement" type="button" data-target="children_6_11">-</button>
                                                        <input type="number" class="form-control text-center" id="children_6_11" value="0" min="0" readonly>
                                                        <button class="btn btn-outline-secondary increment" type="button" data-target="children_6_11">+</button>
                                                    </div>
                                                </div>
                                                <!-- Children 12+ -->
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span>Children (12+)</span>
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <button class="btn btn-outline-secondary decrement" type="button" data-target="children_above_11">-</button>
                                                        <input type="number" class="form-control text-center" id="children_above_11" value="0" min="0" readonly>
                                                        <button class="btn btn-outline-secondary increment" type="button" data-target="children_above_11">+</button>
                                                    </div>
                                                </div>
                                                <!-- Infants -->
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span>Infants</span>
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <button class="btn btn-outline-secondary decrement" type="button" data-target="infants">-</button>
                                                        <input type="number" class="form-control text-center" id="infants" value="0" min="0" readonly>
                                                        <button class="btn btn-outline-secondary increment" type="button" data-target="infants">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="adults" id="adults_hidden">
                                        <input type="hidden" name="children_6_11" id="children_6_11_hidden">
                                        <input type="hidden" name="children_above_11" id="children_above_11_hidden">
                                        <input type="hidden" name="infants" id="infants_hidden">
                                    </div>

                                    <!-- Hotel Rating -->
                                    <div class="col-12 col-md-6 mt-3">
                                        <label class="form-label fw-semibold">Preferred Hotel Rating<span class="text-danger">*</span></label>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hotelRating" id="rating3" value="3">
                                                <label class="form-check-label" for="rating3">3 <span style="color:#ab9629">&#9733;</span></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hotelRating" id="rating4" value="4">
                                                <label class="form-check-label" for="rating4">4 <span style="color:#ab9629">&#9733;</span></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hotelRating" id="rating5" value="5">
                                                <label class="form-check-label" for="rating5">5 <span style="color:#ab9629">&#9733;</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pickup / Dropoff -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="pickupLocation" class="form-label fw-semibold">Pickup Location<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="pickupLocation" name="pickupLocation" placeholder="Enter pickup location" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="dropoffLocation" class="form-label fw-semibold">Dropoff Location<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="dropoffLocation" name="dropoffLocation" placeholder="Enter dropoff location" required>
                                </div>
                            </div>

                            <!-- Meal Plan & Allergy -->
                            <div class="row g-3 mb-4">
                                <div class="col-12 mb-3">
                                    <label class="form-label fw-semibold d-block">Preferred Meal Plan<span class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealPlan" id="mealPlan1" value="Breakfast Only">
                                        <label class="form-check-label" for="mealPlan1">Breakfast Only</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealPlan" id="mealPlan2" value="Half Board">
                                        <label class="form-check-label" for="mealPlan2">Half Board</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealPlan" id="mealPlan3" value="Full Board">
                                        <label class="form-check-label" for="mealPlan3">Full Board</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealPlan" id="mealPlan4" value="All Inclusive">
                                        <label class="form-check-label" for="mealPlan4">All Inclusive</label>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label fw-semibold d-block">Do you have any meal allergy issues?<span class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealAllergy" id="mealAllergyYes" value="Yes">
                                        <label class="form-check-label" for="mealAllergyYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealAllergy" id="mealAllergyNo" value="No">
                                        <label class="form-check-label" for="mealAllergyNo">No</label>
                                    </div>
                                    <div class="mt-2" id="allergyDetails" style="display:none;">
                                        <input type="text" class="form-control" name="allergy_reason" placeholder="Please specify your allergy">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label fw-semibold d-block">Bed Types & Quantity</label>

                                    <div class="col-12 d-flex flex-column flex-sm-row gap-3">

                                        <div class="d-flex justify-content-between align-items-center mb-2 w-100">
                                            <span>Single Room</span>
                                            <input type="number" name="bed_types[single]" class="form-control w-25 pe-0" min="0" placeholder="0">
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-2 w-100">
                                            <span>Double Room</span>
                                            <input type="number" name="bed_types[double]" class="form-control w-25 pe-0" min="0" placeholder="0">
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-2 w-100">
                                            <span>Twin Room</span>
                                            <input type="number" name="bed_types[twin]" class="form-control w-25 pe-0" min="0" placeholder="0">
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-2 w-100">
                                            <span>Triple Room</span>
                                            <input type="number" name="bed_types[triple]" class="form-control w-25 pe-0" min="0" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- Personal Info & Submit -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-2">
                                    <label for="title" class="form-label fw-semibold small">Title<span class="text-danger">*</span></label>
                                    <select class="form-select" id="title" name="title" required>
                                        <option value="" selected disabled>Select</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Ms">Ms</option>
                                        <option value="Dr">Dr</option>
                                        <option value="Prof">Prof</option>
                                    </select>
                                </div>

                                <div class="col-md-8">
                                    <label for="fullName" class="form-label fw-semibold">Full Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="whatsappCode" class="form-label fw-semibold small mt-2">Code<span class="text-danger">*</span></label>
                                    <select class="form-select" id="whatsappCode" name="whatsappCode" required>
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($countryCodes as $c): ?>
                                            <option value="<?php echo htmlspecialchars($c[\'country_code\']); ?>">
                                                <?php echo htmlspecialchars($c[\'country_name\'] . \' (\' . $c[\'country_code\'] . \')\'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- <label for="whatsapp" class="form-label fw-semibold mt-2">WhatsApp Number<span class="text-danger">*</span></label>
                                    <input type="phone" class="form-control" id="whatsapp" name="whatsapp" placeholder="Enter WhatsApp number" required> -->
                                </div>

                                <div class="col-md-3">
                                    <!-- <label for="whatsappCode" class="form-label fw-semibold small">Code<span class="text-danger">*</span></label>
                                    <select class="form-select" id="whatsappCode" name="whatsappCode" required>
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($countryCodes as $c): ?>
                                            <option value="<?php echo htmlspecialchars($c[\'country_code\']); ?>">
                                                <?php echo htmlspecialchars($c[\'country_name\'] . \' (\' . $c[\'country_code\'] . \')\'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select> -->
                                    <label for="whatsapp" class="form-label fw-semibold mt-2">WhatsApp Number<span class="text-danger">*</span></label>
                                    <input type="phone" class="form-control" id="whatsapp" name="whatsapp" placeholder="Enter WhatsApp" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="country" class="form-label fw-semibold">Country<span class="text-danger">*</span></label>
                                    <select class="form-select" id="country" name="country" required>
                                        <option value="" selected disabled>Select your country</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="flightNumber" class="form-label fw-semibold">Flight Number</label>
                                    <input type="text" class="form-control" id="flightNumber" name="flightNumber" placeholder="Enter flight number">
                                </div>

                                <div class="col-12">
                                    <label for="remarks" class="form-label fw-semibold">Remarks</label>
                                    <textarea class="form-control" id="remarks" name="remarks" rows="4" placeholder="Please specify any additional requirements or information not covered above."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Left Column -->
                        <div class="col-lg-5 border-start ps-4">
                            <!-- Vehicle Selection -->
                            <div class="mb-4">
                                <h3 name="vehicleId">Select Preferred Vehicle</h3>
                                <small class="text-danger d-block mb-3">**For indicative purposes only</small>

                                <div class="row g-4">
                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM vehicles ORDER BY id ASC");
                                    $stmt->execute();
                                    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    if (!empty($vehicles)):
                                        foreach ($vehicles as $v):
                                            $id = (int)$v[\'id\'];
                                            $category = htmlspecialchars($v[\'category\']);
                                            $passengers = htmlspecialchars($v[\'passenger_count\']);
                                            $image = htmlspecialchars($v[\'image\'] ?: \'assets/images/vehicles/default.jpg\');
                                    ?>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="card h-100 text-center shadow-sm vehicle-card" data-vehicle-id="<?= $id ?>">
                                            <img src="<?= $image ?>" class="card-img-top img-fluid" alt="<?= $category ?>" style="height:10rem;object-fit:cover;">
                                            <div class="card-body d-flex flex-column justify-content-center" style="padding:0;">
                                                <h3><?= $category ?></h3>
                                                <p class="card-text">Passengers: <?= $passengers ?></p>
                                                <input class="form-check-input d-none" type="radio" name="vehicle_id" id="vehicle<?= $id ?>" value="<?= $id ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        endforeach;
                                    else:
                                    ?>
                                    <div class="col">
                                        <p class="text-center">No vehicles found.</p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if (!empty($selectedCities)): ?>
                            <!-- Selected Cities -->
                            <div class="mb-4">
                                <h3>Selected Cities</h3>
                                <div class="row">
                                    <?php foreach ($selectedCities as $city): ?>
                                        <div class="col-md-6 col-lg-6 mb-2">
                                            <div class="card p-2 text-center" style="border-radius:0;">
                                                <?php echo htmlspecialchars($city[\'name\']); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Tour Map -->
                            <div class="mb-4">
                                <h3>Tour Map</h3>
                                <div id="map" style="height:250px;width:100%;"></div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div id="formError" class="alert alert-danger d-none"></div>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary submit-button">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <!-- Customize Tours section ends -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBl50Q8W4ZF2_EkOJ1lnRoVxO1IdjIupjM&libraries=places&callback=initMap" async defer></script>

    <script>
        const btn = document.getElementById(\'guestDropdownButton\');
        const menu = document.getElementById(\'guestDropdownMenu\');
        const ids = [\'adults\',\'children_6_11\',\'children_above_11\',\'infants\'];

        btn.addEventListener(\'click\', () => menu.classList.toggle(\'show\'));
        document.addEventListener(\'click\', e => { if(!btn.contains(e.target)&&!menu.contains(e.target)) menu.classList.remove(\'show\'); });

        function update() {
            const adults = +document.getElementById(\'adults\').value;
            const children = ids.slice(1).reduce((s,id)=>s + +document.getElementById(id).value,0);
            btn.textContent = `${adults} Adults, ${children} Children`;

            document.getElementById(\'adults_hidden\').value = adults;
            document.getElementById(\'children_6_11_hidden\').value = document.getElementById(\'children_6_11\').value;
            document.getElementById(\'children_above_11_hidden\').value = document.getElementById(\'children_above_11\').value;
            document.getElementById(\'infants_hidden\').value = document.getElementById(\'infants\').value;
        }

        document.querySelectorAll(\'.increment,.decrement\').forEach(b=>{
            b.addEventListener(\'click\', ()=>{
                const i = document.getElementById(b.dataset.target);
                const min = +i.min||0;
                i.value = Math.max(min, +i.value + (b.classList.contains(\'increment\')?1:-1));
                update();
            });
        });

        update();

    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const start = document.querySelector(\'input[name="start_date"]\');
            const end = document.querySelector(\'input[name="end_date"]\');
            const nights = document.querySelector(\'input[name="nights"]\');
            const today = new Date().toISOString().split(\'T\')[0];

            start.min = today;
            end.min = today;

            const calcNights = () => {
                const diff = (new Date(end.value) - new Date(start.value)) / (1000 * 60 * 60 * 24);
                nights.value = diff > 0 ? `${diff} night${diff > 1 ? \'s\' : \'\'}` : \'\';
            };

            start.addEventListener(\'change\', () => {
                if (end.value && new Date(end.value) < new Date(start.value)) end.value = nights.value = \'\';
                end.min = start.value;
                calcNights();
            });

            end.addEventListener(\'change\', calcNights);
        });
    </script>

    <script>
        let map;
        let geocoder;
        let bounds;
        let markers = [];
        let pathCoordinates = []; 

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                center: { lat: 7.8731, lng: 80.7718 } 
            });

            geocoder = new google.maps.Geocoder();
            bounds = new google.maps.LatLngBounds();

            const selectedCities = <?php echo json_encode($selectedCities); ?>;

            if (selectedCities.length === 0) return;

            // Create numbered markers
            let geocodePromises = selectedCities.map((city, index) => geocodeCity(city.name, index + 1));

            Promise.all(geocodePromises).then(coords => {
                pathCoordinates = coords.filter(c => c !== null); 

                if (pathCoordinates.length > 1) {
                    const tourPath = new google.maps.Polyline({
                        path: pathCoordinates,
                        geodesic: true,
                        strokeColor: \'#FF0000\',
                        strokeOpacity: 0.7,
                        strokeWeight: 4
                    });
                    tourPath.setMap(map);
                }

                bounds = new google.maps.LatLngBounds();
                pathCoordinates.forEach(coord => bounds.extend(coord));
                map.fitBounds(bounds);
            });

            initAutocomplete();
        }

        function geocodeCity(cityName, labelNumber) {
            return new Promise((resolve, reject) => {
                geocoder.geocode({ address: cityName + \', Sri Lanka\' }, (results, status) => {
                    if (status === \'OK\') {
                        const location = results[0].geometry.location;

                        new google.maps.Marker({
                            map: map,
                            position: location,
                            title: cityName,
                            label: {
                                text: labelNumber.toString(),
                                color: "white",
                                fontWeight: "bold"
                            }
                        });

                        resolve(location);
                    } else {
                        console.warn(\'Geocode failed for:\', cityName, status);
                        resolve(null); 
                    }
                });
            });
        }

        function initAutocomplete() {
            const pickupInput = document.getElementById(\'pickupLocation\');
            const dropoffInput = document.getElementById(\'dropoffLocation\');

            const options = {
                types: [\'geocode\', \'establishment\'],
                componentRestrictions: { country: \'LK\' } 
            };

            if (pickupInput) {
                new google.maps.places.Autocomplete(pickupInput, options);
            }

            if (dropoffInput) {
                new google.maps.places.Autocomplete(dropoffInput, options);
            }
        }
    </script>

    <script>
        const yesRadio = document.getElementById(\'mealAllergyYes\');
        const noRadio = document.getElementById(\'mealAllergyNo\');
        const allergyInput = document.getElementById(\'allergyDetails\');

        yesRadio.addEventListener(\'change\', () => {
            allergyInput.style.display = yesRadio.checked ? \'block\' : \'none\';
        });

        noRadio.addEventListener(\'change\', () => {
            allergyInput.style.display = \'none\';
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const countrySelect = document.getElementById("country");
            fetch("https://restcountries.com/v3.1/all?fields=name")
                .then(res => res.json())
                .then(data => Array.isArray(data) && 
                    data.sort((a,b) => a.name.common.localeCompare(b.name.common))
                        .forEach(c => countrySelect.add(new Option(c.name.common, c.name.common)))
                )
                .catch(err => console.error("Error fetching countries:", err));
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            <?php if (!empty($_SESSION[\'itinerary_success\']) && !empty($_SESSION[\'pdf_to_download\'])): ?>
                Swal.fire({
                    icon: \'success\',
                    title: \'Submitted Successfully\',
                    text: \'Your tour request has been received.\',
                    confirmButtonText: \'Download Itinerary\'
                }).then(() => {
                    window.open(\'<?php echo $_SESSION[\'pdf_to_download\']; ?>\', \'_blank\');
                    window.location.reload();
                    window.location.href = \'./\'; 
                });
                <?php
                unset($_SESSION[\'itinerary_success\'], $_SESSION[\'pdf_to_download\']);
                ?>
            <?php endif; ?>
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.getElementById("customTourForm");
            const submitBtn = form.querySelector(".submit-button");
            const errorBox = document.getElementById("formError");

            form.addEventListener("submit", function (e) {
                errorBox.classList.add("d-none");
                errorBox.innerHTML = "";

                let errors = [];

                // ======================
                // Basic required fields
                // ======================
                const requiredFields = [
                    { id: "pickupLocation", label: "Pickup Location" },
                    { id: "dropoffLocation", label: "Dropoff Location" },
                    { id: "title", label: "Title" },
                    { id: "fullName", label: "Full Name" },
                    { id: "email", label: "Email" },
                    { id: "whatsappCode", label: "WhatsApp Code" },
                    { id: "whatsapp", label: "WhatsApp Number" },
                    { id: "country", label: "Country" },
                ];

                requiredFields.forEach(field => {
                    const el = document.getElementById(field.id);
                    if (!el || !el.value.trim()) {
                        errors.push(field.label);
                        el?.classList.add("is-invalid");
                    } else {
                        el.classList.remove("is-invalid");
                    }
                });

                // ======================
                // Dates validation
                // ======================
                const startDate = document.querySelector(\'input[name="start_date"]\');
                const endDate   = document.querySelector(\'input[name="end_date"]\');
                const nights    = document.querySelector(\'input[name="nights"]\');

                if (!startDate.value) errors.push("Start Date");
                if (!endDate.value) errors.push("End Date");
                if (!nights.value) errors.push("Number of Nights");

                // ======================
                // Hotel rating
                // ======================
                if (!document.querySelector(\'input[name="hotelRating"]:checked\')) {
                    errors.push("Preferred Hotel Rating");
                }

                // ======================
                // Meal plan
                // ======================
                if (!document.querySelector(\'input[name="mealPlan"]:checked\')) {
                    errors.push("Meal Plan");
                }

                // ======================
                // Vehicle
                // ======================
                if (!document.querySelector(\'input[name="vehicle_id"]:checked\')) {
                    errors.push("Select Preferred Vehicle");
                }


                // ======================
                // Allergy issues
                // ======================
                const allergyYes = document.getElementById("mealAllergyYes");
                const allergyNo  = document.getElementById("mealAllergyNo");
                const allergyReason = document.querySelector(\'input[name="allergy_reason"]\');

                if (!allergyYes.checked && !allergyNo.checked) {
                    errors.push("Meal Allergy Selection");
                }

                if (allergyYes.checked && (!allergyReason || !allergyReason.value.trim())) {
                    errors.push("Allergy Details");
                    allergyReason?.classList.add("is-invalid");
                } else {
                    allergyReason?.classList.remove("is-invalid");
                }

                if (errors.length > 0) {
                    e.preventDefault();

                    errorBox.innerHTML = `
                        <strong>Please fill the following required fields:</strong>
                        <ul class="mb-0">
                            ${[...new Set(errors)].map(e => `<li>${e}</li>`).join("")}
                        </ul>
                    `;
                    errorBox.classList.remove("d-none");

                    submitBtn.disabled = false;
                    submitBtn.innerHTML = "Submit";
                    return;
                }

                submitBtn.disabled = true;
                submitBtn.innerHTML = "Submitting...";
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll(".vehicle-card");

            cards.forEach(card => {
                card.addEventListener("click", function() {
                    cards.forEach(c => c.classList.remove("selected"));
                    this.classList.add("selected");
                    const radio = this.querySelector(\'input[type="radio"]\');
                    if(radio) radio.checked = true;
                });
            });
        });
    </script>

</body>

<?php
return ob_get_clean();
return;
';