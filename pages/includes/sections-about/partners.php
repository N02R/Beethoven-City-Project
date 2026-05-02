<?php
/** @var array $partners */
$partners = $partners ?? [];
?>

<section class="partenar py-5">
    <div class="custom-container">
        <h2 class="sec-title mb-5"><?= e($partners['title']) ?></h2>
        <div class="row row-cols-2 row-cols-md-4 g-4 align-items-center justify-content-center">
            
            <?php if (!empty($partners['logos'])): ?>
                <?php foreach ($partners['logos'] as $logo): ?>
                <div class="col">
                    <div class="partner-item text-center">
                        <!-- إضافة BASE_URL للمسار لضمان ظهور الصور في كل الصفحات -->
                        <img src="<?= BASE_URL . $logo ?>" alt="Partner Logo" class="img-fluid" loading="lazy" />
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</section>