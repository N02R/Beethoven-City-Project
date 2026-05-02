<?php
/** @var array $timeline */
$timeline = $timeline ?? [];
?>

<section class="timeline-section py-5">
    <div class="custom-container">
        <div class="mb-5">
            <h2 class="sec-title"><?= e($timeline['title'] ?? '') ?></h2>
            <p class="main-p"><?= e($timeline['desc'] ?? '') ?></p>
        </div>
        
        <?php if (isset($timeline['style']) && $timeline['style'] === 'map' && !empty($timeline['steps'])): ?>
            <!-- نسخة سطح المكتب (الخريطة) -->
            <div class="map-container d-none d-lg-block">
                <div class="map-box">
                    <!-- استخدام BASE_URL للمسارات الأساسية -->
                    <img src="<?= BASE_URL ?>assets/img/vector/Vector.png" alt="base" class="line-base" loading="lazy">
                    <img src="<?= BASE_URL ?>assets/img/vector/Vector-1.png" alt="active" class="line-active" loading="lazy">
                    
                    <?php foreach ($timeline['steps'] as $index => $step): ?>
                        <div class="step-wrapper step-<?= $index + 1 ?>">
                            <div class="step-img-num">
                                <img src="<?= BASE_URL ?>assets/img/vector/<?= e($step['num_img']) ?>" alt="step number" loading="lazy">
                            </div>
                            <div class="icon-main">
                                <img src="<?= BASE_URL ?>assets/img/vector/<?= e($step['icon']) ?>" alt="step icon" loading="lazy">
                            </div>
                            <div class="info-content">
                                <h3><?= e($step['title']) ?></h3>
                                <span class="dot <?= e($step['dot_color'] ?? '') ?>"></span>
                                <h4><?= e($step['sub_title'] ?? '') ?></h4>
                                <p><?= e($step['desc']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- نسخة الجوال (تظهر تلقائياً إذا لم يكن الستايل map أو على الشاشات الصغيرة) -->
        <div class="mobile-timeline <?= (isset($timeline['style']) && $timeline['style'] === 'map') ? 'd-lg-none' : '' ?>">
            <?php if (!empty($timeline['steps'])): ?>
                <?php foreach ($timeline['steps'] as $step): ?>
                    <div class="m-step">
                        <div class="m-number-box">
                            <span class="m-num"><?= e($step['id'] ?? '') ?></span>
                        </div>
                        <div class="m-content">
                            <div class="m-header">
                                <div class="m-icon">
                                    <img src="<?= BASE_URL ?>assets/img/vector/<?= e($step['icon']) ?>" alt="icon" loading="lazy">
                                </div>
                                <h3><?= e($step['title']) ?></h3>
                            </div>
                            <?php if(!empty($step['sub_title'])): ?>
                                <h4><?= e($step['sub_title']) ?></h4>
                            <?php endif; ?>
                            <p><?= e($step['desc']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>