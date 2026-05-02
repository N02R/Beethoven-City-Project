<?php
/** @var array $offered_services */
$offered_services = $offered_services ?? [];
?>

<section class="edu-services py-5">
    <div class="container">
        <!-- استخدام e() لحماية النصوص -->
        <h2 class="sec-title mb-3"><?= e($offered_services['title'] ?? '') ?></h2>
        <p class="mb-5 main-p"><?= e($offered_services['desc'] ?? '') ?></p>
        
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3 text-center">
            <?php if (!empty($offered_services['items'])): ?>
                <?php foreach ($offered_services['items'] as $service): ?>
                <div class="col">
                    <!-- تحسين الرابط ليكون ديناميكياً مع BASE_URL -->
                    <a href="<?= BASE_URL ?>index.php?page=<?= e($service['url']) ?>" class="text-decoration-none">
                        <div class="card service-card text-white border-0 rounded-5"
                             style="background-image: url('<?= BASE_URL ?>assets/img/<?= e($service['img']) ?>'); 
                                    background-position: <?= e($service['pos'] ?? 'center') ?>; 
                                    background-size: cover;
                                    height: 200px;"> <!-- يفضل تحديد ارتفاع ثابت للكروت إذا لم يكن محدداً في CSS -->
                            
                            <div class="card-body d-flex align-items-end justify-content-center">
                                <h6 class="card-title"><?= e($service['title']) ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>