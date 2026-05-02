<?php
if (empty($page_content)) {
    $page_content = content('packages');
}

include "includes/sections-arrival/breadcrumb.php";
include "includes/sections-arrival/custom-services.php";
$info = $page_content['info_section'];
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <?php 
            // 1. الرأس
            include "includes/sections-arrival/info-head.php"; 

            // 2. الملاحظات (نجوم)
            $page_content['info_section']['notes'] = $info['notes_section'];
            include "includes/sections-arrival/info-notes.php"; 
        ?>

        <div class="dl-card py-5">
            <div class="row g-4">
                <?php foreach ($info['packages_list'] as $pkg): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card <?= $pkg['active'] ? 'card-active' : '' ?>">
                            <h5 class="text-bg text-center <?= $pkg['active'] ? 'text-bg-active' : '' ?>">
                                <?= $pkg['title'] ?>
                            </h5>
                            <div class="card-body">
                                <img src="assets/img/education/Grouppdf.png" alt="PDF" />
                                <div class="card-body-info">
                                    <a href="<?= $pkg['link'] ?>" class="<?= $pkg['active'] ? 'text-active' : '' ?>" download>
                                        Download
                                    </a>
                                    <p class="<?= $pkg['active'] ? 'text-active' : '' ?>">
                                        <?= $pkg['desc'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>