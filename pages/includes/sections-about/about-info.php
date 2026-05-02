<?php 
// هذا السطر يمنع الخط الأحمر ويحمي الكود من الانهيار
$about_main = $about_main ?? []; 
?>
<section class="about py-5">
    <div class="custom-container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-2 order-lg-1">
                <h2 class="sec-title mb-3"><?= e($about_main['title']) ?></h2>
                <p class="about-par mb-4"><?= e($about_main['description']) ?></p>
                
                <div class="row g-3 mb-4">
                    <?php if (!empty($about_main['features'])): ?>
                        <?php foreach ($about_main['features'] as $feature): ?>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body p-0">
                                    <div class="title mb-2">
                                        <span class="icon-wrap">
                                            <img src="<?= BASE_URL . $feature['icon'] ?>" alt="<?= e($feature['title']) ?>" loading="lazy">
                                        </span>
                                        <span><?= e($feature['title']) ?></span>
                                    </div>
                                    <p class="card-text"><?= e($feature['text']) ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <a href="<?= BASE_URL . $about_main['button_link'] ?>" class="btn btn-about"><?= e($about_main['button_text']) ?></a>
            </div>

            <div class="col-lg-6 order-1 order-lg-2 position-relative">
                <div class="image-stack">
                    <img src="<?= BASE_URL . $about_main['images']['main'] ?>" alt="عمل جماعي" class="img-fluid main-img" loading="lazy">
                    <div class="sub-img-wrapper">
                        <img src="<?= BASE_URL . $about_main['images']['sub'] ?>" alt="Beethoven City" class="img-fluid sub-img" loading="lazy">
                        <div class="dots-bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>