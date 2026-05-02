<?php
/** @var array $why_germany */
$why_germany = $why_germany ?? [];
?>

<section class="study py-5">
    <div class="custom-container">
        <div class="mb-5">
            <h2 class="sec-title"><?= e($why_germany['title'] ?? '') ?></h2>
            <p class="main-p"><?= e($why_germany['subtitle'] ?? '') ?></p>
        </div>
        <div class="row g-3">
            <?php if (!empty($why_germany['cards'])): ?>
                <?php foreach ($why_germany['cards'] as $card): ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card choose-card h-100">
                        <div class="card-body">
                            <!-- تم ترك الرابط # كما هو في تصميمك، مع معالجة مسار الأيقونة -->
                            <a href="#">
                                <img src="<?= BASE_URL . ($card['icon'] ?? '') ?>" alt="<?= e($card['title'] ?? '') ?>" loading="lazy" />
                            </a>
                            <h5 class="card-title"><?= e($card['title'] ?? '') ?></h5>
                            <p class="card-text"><?= e($card['text'] ?? '') ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>