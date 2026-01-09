<div class="full-page-border"></div>
<div class="page-content">

<div class="cover-title"><?= $cover['trip_name'] ?? '' ?></div>
<div class="cover-heading"><?= $cover['heading'] ?? '' ?></div>
<div class="cover-subheading"><?= $cover['sub_heading'] ?? '' ?></div>

<?php if (!empty($cover['image']) && file_exists(__DIR__ . '/../uploads/cover_images/' . $cover['image'])): ?>
    <div class="cover-image">
        <img src="<?= __DIR__ . '/../uploads/cover_images/' . $cover['image'] ?>" />
    </div>
<?php endif; ?>

<div class="cover-description"><?= $cover['description'] ?? '' ?></div>

</div>
