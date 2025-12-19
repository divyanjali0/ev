<?php  return 'include MODX_BASE_PATH . \'assets/includes/db_connect.php\';

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

if (empty($reviews)) {
    return \'\';
}

// Chunk reviews into groups of 2 for slides
$chunks = array_chunk($reviews, 2);

$output = \'<div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel">\';
$output .= \'<div class="carousel-inner">\';

foreach ($chunks as $index => $chunk) {
    $output .= \'<div class="carousel-item\'.($index === 0 ? \' active\' : \'\').\'">
                    <div class="row justify-content-center g-4">\';
    foreach ($chunk as $review) {

        $photo = htmlspecialchars($review[\'profile_photo_url\'] ?? \'\');
        $name  = ucwords(strtolower($review[\'author_name\'] ?? \'\'));
        $time  = htmlspecialchars($review[\'relative_time_description\'] ?? \'\');
        $text  = trim($review[\'text\'] ?? \'\');

        $short  = mb_substr($text, 0, 220);
        $isLong = mb_strlen($text) > 220;

        $stars = \'\';
        for ($i = 1; $i <= 5; $i++) {
            $stars .= \'<span style="color:#cab449ff;">&#9733;</span>\';
        }

        $output .= \'<div class="col-12 col-lg-6">
                        <div class="review-card h-100 p-4 text-center">

                            <img src="\'.$photo.\'" onerror="this.src=\\\'assets/images/default-user.png\\\';"
                                 class="mb-3 rounded-circle" width="80" height="80" alt="User Photo">

                            <div class="mb-2">\'.$stars.\'</div>

                            <p class="review-text">
                                <span class="short-text">\'.htmlspecialchars($short.($isLong ? \'...\' : \'\')).\'</span>\';

        if ($isLong) {
            $output .= \'<span class="full-text d-none">\'.htmlspecialchars($text).\'</span>
                        <a href="#" class="read-more text-decoration-none ms-1">Read more</a>\';
        }

        $output .= \'</p>
                            <h5 class="mt-3 mb-0">\'.$name.\'</h5>
                            <small class="text-muted">\'.$time.\'</small>
                        </div>
                    </div>\';
    }
    $output .= \'</div></div>\'; // row + carousel-item
}

$output .= \'</div>\'; // carousel-inner

// Carousel controls
$output .= \'<button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>\';

$output .= \'</div>\'; // reviewCarousel

return $output;
return;
';