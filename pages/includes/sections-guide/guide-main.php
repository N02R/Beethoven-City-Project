<?php
/** @var array $hero */
/** @var array $articles */
$hero = $hero ?? [];
$articles = $articles ?? [];
?>

<section class="guide py-5">
    <div class="custom-container">
        <div class="text-center mb-5">
            <h2 class="sec-title mb-3"><?= e($hero['title'] ?? 'دليل بيتهوفن الشامل') ?></h2>
            <p class="main-p mx-auto" style="max-width: 700px;">
                <?= e($hero['desc'] ?? '') ?>
            </p>
        </div>

        <div class="row g-4">
            <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $article): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden">
                        <div class="card-img-wrapper">
                            <!-- إضافة BASE_URL لمسار صورة المقال -->
                            <img src="<?= BASE_URL ?>assets/img/<?= e($article['img']) ?>" 
                                 alt="<?= e($article['title']) ?>" 
                                 class="card-img-top img-fluid" 
                                 loading="lazy">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold"><?= e($article['title']) ?></h5>
                            <p class="card-text flex-grow-1 text-muted small"><?= e($article['desc']) ?></p>
                            
                            <!-- معالجة رابط المقال وأيقونة السهم -->
                            <a href="<?= BASE_URL . e($article['url']) ?>" class="btn btn-link text-decoration-none fw-bold p-0 mt-3 d-flex align-items-center gap-2 text-primary">
                                قراءة المزيد
                                <img src="<?= BASE_URL ?>assets/img/home/Arrow..svg" alt="arrow" width="18" loading="lazy">
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>