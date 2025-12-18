<?php  return 'include \'assets/includes/db_connect.php\';

$apiKey  = "AIzaSyBl50Q8W4ZF2_EkOJ1lnRoVxO1IdjIupjM";
$placeId = "ChIJpV-pH0vw4joREeE9so6gzEI";

$url = "https://maps.googleapis.com/maps/api/place/details/json"
     . "?place_id={$placeId}"
     . "&fields=rating,reviews.author_name,reviews.text,"
     . "reviews.relative_time_description,reviews.profile_photo_url,"
     . "reviews.rating"
     . "&key={$apiKey}";

$response = @file_get_contents($url);
$data = $response ? json_decode($response, true) : [];

$reviews = $data[\'result\'][\'reviews\'] ?? [];
?>

<?php if (!empty($reviews)): ?>
<div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner text-center">

        <?php foreach ($reviews as $index => $review): ?>
            <div class="carousel-item <?php echo $index === 0 ? \'active\' : \'\'; ?>">
                <div class="review-content px-3">

                    <img
                        src="<?php echo htmlspecialchars($review[\'profile_photo_url\'] ?? \'\'); ?>"
                        onerror="this.src=\'assets/images/default-user.png\';"
                        class="mb-3 rounded-circle"
                        width="90"
                        height="90"
                        alt="User Photo"
                    >

                    <!-- Rating Stars -->
                    <div class="mb-2">
                        <?php
                            $rating = isset($review[\'rating\']) ? (int) round($review[\'rating\']) : 0;
                            for ($i = 1; $i <= 5; $i++):
                                echo \'<span style="color:#cab449ff;">&#9733;</span>\';
                            endfor;
                        ?>
                    </div>

                    <!-- Review Text -->
                    <?php
                        $full   = trim($review[\'text\'] ?? \'\');
                        $short  = mb_substr($full, 0, 220);
                        $isLong = mb_strlen($full) > 220;
                    ?>
                    <p class="review-text">
                        <span class="short-text">
                            <?php echo htmlspecialchars($short . ($isLong ? \'...\' : \'\')); ?>
                        </span>

                        <?php if ($isLong): ?>
                            <span class="full-text d-none">
                                <?php echo htmlspecialchars($full); ?>
                            </span>
                            <a href="#" class="read-more text-decoration-none ms-1">
                                Read more
                            </a>
                        <?php endif; ?>
                    </p>

                    <h5 class="mt-3 mb-0">
                        <?php echo ucwords(strtolower($review[\'author_name\'] ?? \'\')); ?>
                    </h5>
                    <small class="text-muted">
                        <?php echo htmlspecialchars($review[\'relative_time_description\'] ?? \'\'); ?>
                    </small>

                </div>
            </div>
        <?php endforeach; ?>
</div>
                <div class="swiper-pagination"></div>

    </div>
</div>
<?php endif;
return;
';