<?php  return 'include (\'config-details.php\');
    include \'assets/includes/db_connect.php\';

    $query = "SELECT * FROM tour_themes";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $themes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
    if (count($themes) > 0) {
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
                    <div class="theme-card card h-100 shadow-sm selectable-card" data-theme-id="\' . $row[\'id\'] . \'">
                        <img src="\' . $imgPath . \'" class="card-img-top" alt="\' . htmlspecialchars($row[\'theme_name\']) . \'">
                        <div class="card-body text-center">
                            <h3 class="card-title">\' . htmlspecialchars($row[\'theme_name\']) . \'</h3>
                        </div>
                    </div>
                </div>
            \';
        }

        echo \'</div>\';
    } else {
        echo "<p class=\'text-center mt-4\'>No tour themes found.</p>";
    }
return;
';