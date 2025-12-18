<?php  return 'include \'assets/includes/db_connect.php\';
$stmt = $conn->query("
    SELECT id, name, description, image, days, reviews
    FROM tours
    ORDER BY id ASC
");
$tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if (!empty($tours)): ?>
<div class="swiper featured-tours-swiper">
    <div class="swiper-wrapper mb-5">

        <?php foreach ($tours as $tour): ?>
            <div class="swiper-slide">
                <div class="card h-100">

                    <img
                        src="assets/images/featured-trips/<?php echo htmlspecialchars($tour[\'image\']); ?>"
                        alt="<?php echo htmlspecialchars($tour[\'name\']); ?>"
                        class="img-fluid"
                    >

                    <div class="card-body" style="height:200px;">
                        <h3 class="card-title">
                            <?php echo htmlspecialchars($tour[\'name\']); ?>
                        </h3>

                        <p class="card-text">
                            <?php echo htmlspecialchars($tour[\'description\']); ?>
                        </p>

                        <hr class="mt-1">

                        <div class="d-flex justify-content-between">
                            <span><?php echo (int)$tour[\'days\']; ?> Days</span>
                            <span>
                                <?php echo (float)$tour[\'reviews\']; ?> ★
                                (<?php echo (int)$tour[\'reviews\']; ?> reviews)
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <div class="swiper-pagination"></div>
</div>
<?php endif;
return;
';