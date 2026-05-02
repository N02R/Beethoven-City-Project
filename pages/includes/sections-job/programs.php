<?php
/** @var array $programs */
$programs = $programs ?? [];
?>

<section class="program py-5">
    <div class="container">
        <div class="mb-5">
            <h2 class="sec-title fw-bold"><?= e($programs['title'] ?? '') ?></h2>
            <p class="main-p"><?= e($programs['desc'] ?? '') ?></p>
        </div>
        <div class="row g-4">
            <?php if (!empty($programs['items'])): ?>
                <?php foreach ($programs['items'] as $item): ?>
                <div class="col-md-6">
                    <!-- استخدام h-100 لضمان تساوي ارتفاع الصناديق المتجاورة -->
                    <div class="program-info h-100 <?= !empty($item['highlight']) ? 'highlight-box' : '' ?>">
                        <div class="program-content">
                            <!-- معالجة مسار الصورة الأساسية -->
                            <img src="<?= BASE_URL . $item['img'] ?>" alt="<?= e($item['title']) ?>" class="mb-3" loading="lazy">
                            
                            <h4 class="fw-bold mb-4 <?= !empty($item['highlight']) ? 'text-white' : '' ?>">
                                <?= e($item['title']) ?>
                            </h4>
                            
                            <p class="<?= !empty($item['highlight']) ? 'text-white' : '' ?>">
                                <?= e($item['desc']) ?>
                            </p>
                        </div>

                        <!-- تحسين رابط الطلب وإضافة BASE_URL لسهم الأيقونة -->
                        <a href="<?= BASE_URL . $item['link'] ?>" class="btn-info-wrapper mt-4 <?= !empty($item['highlight']) ? 'is-light' : '' ?>">
                            <h3 class="mb-0">اطلب الآن</h3>
                            <div class="arrow-icon">
                                <img src="<?= BASE_URL ?>assets/img/home/Arrow.svg" alt="سهم" loading="lazy">
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>