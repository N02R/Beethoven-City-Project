<?php
/** @var array $edu_hero */
$edu_hero = $edu_hero ?? [];
?>

<section class="education py-5">
    <div class="custom-container">
        <div class="row align-items-stretch g-5">
            <div class="col-lg-6">
                <!-- إذا كانت الخلفية تظهر عبر CSS (background-image) فالمكان صحيح -->
                <!-- أما إذا كانت صورة متغيرة، يفضل وضع وسم img هنا مع BASE_URL -->
                <div class="img-hero"></div>
            </div>
            <div class="col-lg-6">
                <div class="education-info pt-2">
                    <h2 class="sec-title"><?= e($edu_hero['title'] ?? '') ?></h2>
                    <p class="main-p"><?= e($edu_hero['description'] ?? '') ?></p>
                    
                    <?php if (!empty($edu_hero['btn_url'])): ?>
                    <a href="<?= BASE_URL . $edu_hero['btn_url'] ?>" class="btn btn-education">
                        <?= e($edu_hero['btn_text'] ?? 'المزيد') ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>