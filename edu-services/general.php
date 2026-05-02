<?php
if (empty($page_content)) {
    $page_content = content('general');
}

include "includes/sections-arrival/breadcrumb.php";
include "includes/sections-arrival/custom-services.php";
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <?php 
            // 1. الرأس
            include "includes/sections-arrival/info-head.php"; 

            // 2. الملاحظة (باستخدام مكون النجوم)
            $page_content['info_section']['notes'] = $page_content['info_section']['notes_section'];
            include "includes/sections-arrival/info-notes.php"; 
        ?>

        <div class="row mt-4">
            <div class="col-12">
                <?php foreach ($page_content['info_section']['downloads'] as $file): ?>
                    <div class="download-card mb-3">
                        <div class="download-row">
                            <img src="<?= $file['icon'] ?>" alt="<?= $file['format'] ?>" />
                            <div class="dl-info">
                                <div class="dl-title"><?= $file['title'] ?></div>
                            </div>
                            <span class="leader d-lg-block d-md-none d-sm-none" aria-hidden="true">
                                ..............................................................................
                            </span>
                            <a class="download-link" href="<?= $file['link'] ?>" download>Download</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>