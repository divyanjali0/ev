<?php
include MODX_BASE_PATH . 'assets/includes/db_connect.php';

// Path to local JSON file with reviews
$reviewsFile = MODX_BASE_PATH . 'assets/data/reviews.json';

// Load JSON data
$reviewsData = file_exists($reviewsFile) ? file_get_contents($reviewsFile) : '{}';
$data = json_decode($reviewsData, true);
$reviews = $data['reviews'] ?? [];

if (empty($reviews)) {
    return '';
}

// Chunk reviews into groups of 2 for slides
$chunks = array_chunk($reviews, 2);

$output = '<div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel">';
$output .= '<div class="carousel-inner">';

foreach ($chunks as $index => $chunk) {
    $output .= '<div class="carousel-item'.($index === 0 ? ' active' : '').'">
                    <div class="row justify-content-center g-4">';

    foreach ($chunk as $review) {

        $photo = htmlspecialchars($review['profile_photo_url'] ?? 'assets/images/default-user.png');
        $name  = ucwords(strtolower($review['author_name'] ?? ''));
        $time  = htmlspecialchars($review['relative_time_description'] ?? '');
        $text  = trim($review['text'] ?? '');

        $short  = mb_substr($text, 0, 220);
        $isLong = mb_strlen($text) > 220;

        $rating = isset($review['rating']) ? (int) round($review['rating']) : 0;
        $stars  = '';
        for ($i = 1; $i <= 5; $i++) {
            $stars .= $i <= $rating ? '<span style="color:#cab449ff;">&#9733;</span>' : '<span style="color:#ddd;">&#9733;</span>';
        }

        $output .= '<div class="col-12 col-lg-6">
                        <div class="review-card h-100 p-4 text-center">

                            <img src="'.$photo.'" class="mb-3" width="100" height="80" alt="User Photo">

                            <div class="mb-2">'.$stars.'</div>

                            <p class="review-text">
                                <span class="short-text">'.htmlspecialchars($short.($isLong ? '...' : '')).'</span>';

        if ($isLong) {
            $output .= '<span class="full-text d-none">'.htmlspecialchars($text).'</span>
                        <a href="#" class="read-more text-decoration-none ms-1">Read more</a>';
        }

        $output .= '</p>
                            <h5 class="mt-3 mb-0">'.$name.'</h5>
                            <small class="text-muted">'.$time.'</small>
                        </div>
                    </div>';
    }
    $output .= '</div></div>'; // row + carousel-item
}

$output .= '</div>'; // carousel-inner

// Carousel controls
$output .= '<button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>';

$output .= '</div>'; // reviewCarousel

return $output;
return;
