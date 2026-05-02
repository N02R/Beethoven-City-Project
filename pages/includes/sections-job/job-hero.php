<?php
/** @var array $job_hero */
$job_hero = $job_hero ?? [];
?>

<section class="job py-5">
    <div class="custom-container">
        <div class="row align-items-stretch g-5">
            <div class="col-lg-6">
                <div class="job-info pt-2">
                    <h2 class="sec-title"><?= e($job_hero['title'] ?? '') ?></h2>
                    <p class="main-p"><?= e($job_hero['description'] ?? '') ?></p>
                    
                    <?php if (!empty($job_hero['btn_url'])): ?>
                        <!-- إضافة BASE_URL للرابط لضمان توجيه صحيح -->
                        <a href="<?= BASE_URL . $job_hero['btn_url'] ?>" class="btn btn-job">
                            <?= e($job_hero['btn_text'] ?? 'المزيد') ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- الاعتماد على CSS لتعيين الخلفية في img-hero قرار سليم تقنياً للتحكم في الارتفاع -->
                <div class="img-hero"></div>
            </div>
        </div>
    </div>
</section>