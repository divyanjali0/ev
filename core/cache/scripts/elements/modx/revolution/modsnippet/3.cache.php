<?php  return 'include (\'config-details.php\');
    include \'assets/includes/db_connect.php\';

    $query = "SELECT * FROM tour_themes";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $themes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
    if (count($themes) > 0) {

    echo \'<div class="mb-4">\';
    echo \'<h3 class="card-title fw-semibold" style="font-family:Cambria; font-size:22px;">Step 1: Select a theme preferred for your journey</h3>\';
    echo \'<p class="text-muted">Choose one of the themes below to start customizing your tour.</p>\';
    echo \'</div>\';

        echo \'<div class="row g-4">\';

        foreach ($themes as $row) {

            $images = json_decode($row[\'theme_images\'], true);

            if (!$images || count($images) === 0) {
                $imgPath = \'assets/images/default-theme.jpg\';
            } else {
                $imgPath = \'assets/\' . ltrim($images[0], \'/\');
            }

            echo \'
            <div class="col-md-4 col-lg-3">
                <div class="theme-card card h-100 shadow-sm selectable-card">
                    <div class="image-wrapper">
                        <img src="\' . $imgPath . \'" class="card-img-top" alt="\' . htmlspecialchars($row[\'theme_name\']) . \'">
                        <div class="overlay">
                            <button 
                                class="btn btn-primary select-theme-btn"
                                data-theme-id="\' . $row[\'id\'] . \'">
                                Select Theme
                            </button>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title">\' . htmlspecialchars($row[\'theme_name\']) . \'</h3>
                    </div>
                </div>
            </div>\';
        }

        echo \'</div>\';
    } else {
        echo "<p class=\'text-center mt-4\'>No tour themes found.</p>";
    }
return;
';