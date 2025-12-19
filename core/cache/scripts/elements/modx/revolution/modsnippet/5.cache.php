<?php  return 'ob_start();

    include (\'config-details.php\');
    include \'assets/includes/db_connect.php\';

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
    }

    $citiesData = [];

    $query = "
        SELECT id, name, images
        FROM cities
        ORDER BY name ASC
    ";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $citiesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<body id="selectToursPage">
    <!-- Hero starts -->
    <section id="hero">
        <img src="assets/images/tour-hero.jpg" alt="Explore Vacations - Tours">
        <div class="hero-content">
            <h1>Tours</h1>
        </div>
    </section>
    <!-- Hero ends -->

    <!-- Customize Tours section starts -->
    <section id="select-city" class="py-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="[[~3]]">Tours</a></li>
                    <?php if (!empty($themesData)): ?>
                        <?php foreach ($themesData as $t): ?>
                            <li class="breadcrumb-item active">
                                <?php echo htmlspecialchars($t[\'theme_name\']); ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ol>
            </nav>

            <div class="row g-4 mt-3 d-flex justify-content-center">
                <?php if (!empty($citiesData)): ?>
                  <?php foreach ($citiesData as $city): ?>
                        <?php 
                            $cityImages = json_decode($city[\'images\'], true); 
                            $firstImage = !empty($cityImages) ? \'assets/\' . $cityImages[0] : \'\';
                        ?>
                        <div class="col-12 col-lg-3 col-md-6">
                            <div  class="card h-100 shadow-sm city-card selectable-city" data-city-id="<?php echo $city[\'id\']; ?>" >
                                <!-- Checkbox -->
                                <div class="city-checkbox">
                                    <input type="checkbox" name="cities[]" value="<?php echo $city[\'id\']; ?>">
                                </div>
                                <img src="<?php echo htmlspecialchars($firstImage); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($city[\'name\']); ?>">

                                <div class="card-body text-center">
                                    <h3 class="card-title">
                                        <?php echo htmlspecialchars($city[\'name\']); ?>
                                    </h3>
                                </div>

                            </div>
                        </div>
                        <?php endforeach; ?>

                    <div class="text-center mt-4">
                        <button id="planTripBtn" class="planTripBtn btn btn-success px-4"style="display:none;">
                            Plan Trip
                        </button>
                    </div>
                    <?php else: ?>
                    <div class="col-12 text-center">
                        <p class="text-muted">No cities found.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener(\'DOMContentLoaded\', function () {

            const cards = document.querySelectorAll(\'.selectable-city\');
            const planTripBtn = document.getElementById(\'planTripBtn\');

            // Toggle checkbox selection
            cards.forEach(card => {
                card.addEventListener(\'click\', function (e) {
                    if (e.target.tagName === \'INPUT\') return;

                    const checkbox = card.querySelector(\'input[type="checkbox"]\');
                    checkbox.checked = !checkbox.checked;
                    card.classList.toggle(\'selected\', checkbox.checked);
                    togglePlanButton();
                });
            });

            // Checkbox change event
            document.querySelectorAll(\'.city-checkbox input\').forEach(cb => {
                cb.addEventListener(\'change\', function () {
                    cb.closest(\'.selectable-city\').classList.toggle(\'selected\', cb.checked);
                    togglePlanButton();
                });
            });

            // Show/hide Plan Trip button
            function togglePlanButton() {
                const checked = document.querySelectorAll(\'.city-checkbox input:checked\');
                planTripBtn.style.display = checked.length ? \'inline-block\' : \'none\';
            }

            // Redirect to customize-tour.php with selected cities and themes
            planTripBtn.addEventListener(\'click\', () => {
                const selectedCities = Array.from(
                    document.querySelectorAll(\'.city-checkbox input:checked\')
                ).map(cb => cb.value);

                const themeIDs = new URLSearchParams(window.location.search).get(\'themes\') || \'\';

                // Base URL: use customize-tour.php directly
                const baseUrl = "[[~9]]";

                // Correct separator for query parameters
                const separator = baseUrl.includes(\'?\') ? \'&\' : \'?\';

                // Build URL safely
                const url = `${baseUrl}${separator}themes=${encodeURIComponent(themeIDs)}&cities=${encodeURIComponent(selectedCities.join(\',\'))}`;

                window.location.href = url;
            });

        });
    </script>
</body>

<?php
return ob_get_clean();
return;
';