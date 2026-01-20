<?php
include MODX_BASE_PATH . 'assets/includes/db_connect.php';

// Path to local JSON file with reviews
$reviewsFile = MODX_BASE_PATH . 'assets/data/reviews-zh.json';

// Load JSON data
$reviewsData = file_exists($reviewsFile) ? file_get_contents($reviewsFile) : '{}';
$data = json_decode($reviewsData, true);
$reviews = $data['reviews'] ?? [];

if (empty($reviews)) {
    return '';
}

// 2 testimonials per slide
$chunks = array_chunk($reviews, 3);

$output  = '<div class="testimonial-section text-center">';
$output .= '<div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">';
$output .= '<div class="carousel-inner">';

foreach ($chunks as $index => $chunk) {

    $output .= '<div class="carousel-item' . ($index === 0 ? ' active' : '') . '">
                    <div class="row justify-content-center g-4">';

    foreach ($chunk as $review) {

        $name  = ucwords(strtolower($review['author_name'] ?? ''));
        $time  = htmlspecialchars($review['relative_time_description'] ?? '');
        $text  = trim($review['text'] ?? '');

        $short  = mb_substr($text, 0, 260);
        $isLong = mb_strlen($text) > 260;

        $rating = isset($review['rating']) ? (int) round($review['rating']) : 0;
        $stars  = '';

        for ($i = 1; $i <= 5; $i++) {
            $stars .= $i <= $rating
                ? '<span style="color:#cab449ff;">&#9733;</span>'
                : '<span style="color:#ddd;">&#9733;</span>';
        }

        $output .= '
            <div class="col-12 col-lg-4">
                <div class="testimonial-card h-100 p-4">

                    <div class="testimonial-stars mb-2">
                        ' . $stars . '
                    </div>

                    <p class="review-text">
                        <span class="short-text">'
                            . htmlspecialchars($short . ($isLong ? '...' : '')) .
                        '</span>';

        if ($isLong) {
            $output .= '
                        <span class="full-text d-none">' . htmlspecialchars($text) . '</span>
                        <a href="#" class="read-more text-decoration-none ms-1">Read more</a>';
        }

        $output .= '
                    </p>

                    <div class="testimonial-footer mt-3">
                        <strong>' . $name . '</strong><br>
                        <small class="text-muted">' . $time . '</small>
                    </div>

                </div>
            </div>';
    }

    $output .= '</div></div>';
}

$output .= '</div>'; // carousel-inner
$output .= '</div>'; // carousel

$output .= '
    <div class="mt-4">
        <a href="https://www.google.com/search?sca_esv=7968779fbfd70ae6&biw=1920&bih=945&aic=0&si=AL3DRZEsmMGCryMMFSHJ3StBhOdZ2-6yYkXd_doETEE1OR-qOcH0eRgzMulOFty5HQHfaUzm95AD7Y8lRakJJ8dKpnLO8Kw6LDyN2QvTiSaYPWYW-vYp2uMbofRq0OzYN8awNPIFkmV2Q7ZSrkSyXWEY283PAj7Gqw%3D%3D&q=Explore+Vacations+Sri+Lanka+Reviews&sa=X&ved=2ahUKEwjPt5GUjfuRAxVaa2wGHRgzGawQ0bkNegQIGxAE"
   class="btn btn-primary border-radius-0"
   target="_blank"
   rel="noopener noreferrer">
    View all reviews
</a>

    </div>
';

$output .= '</div>'; // testimonial-section

return $output;
return;
