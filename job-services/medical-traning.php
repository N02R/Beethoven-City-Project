<?php
if (empty($page_content)) {
    $page_content = content('medical-traning');
}

include "includes/sections-arrival/breadcrumb.php";
include "includes/sections-arrival/custom-services.php";
$info = $page_content['info_section'];
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <?php 
            // 1. الرأس (العنوان والوصف)
            include "includes/sections-arrival/info-head.php"; 

            // 2. الملاحظات (نظام النجوم)
            $page_content['info_section']['notes'] = $info['notes_section'];
            include "includes/sections-arrival/info-notes.php"; 
        ?>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?php foreach ($info['downloads'] as $file): ?>
                    <div class="download-card">
                        <div class="download-row">
                            <img src="<?= $file['icon'] ?>" alt="<?= $file['format'] ?>" loading="lazy"/>
                            <div class="dl-info">
                                <div class="dl-title"><?= $file['title'] ?></div>
                                <div class="dl-sub"><?= $file['sub'] ?></div>
                            </div>
                            <span class="leader d-lg-block d-md-none d-sm-none" aria-hidden="true">
                                .........................................................................................................................
                            </span>
                            <a class="download-link" href="<?= $file['link'] ?>" download>Download</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>