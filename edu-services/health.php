<?php
if (empty($page_content)) {
    $page_content = content('health');
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

            // 2. لماذا التأمين (صح)
            $page_content['info_section']['pre_travel'] = $info['importance'];
            include "includes/sections-arrival/info-tips.php"; 

            // 3. الوثائق (نجوم)
            $page_content['info_section']['notes'] = $info['documents'];
            include "includes/sections-arrival/info-notes.php"; 
        ?>

        <p class="advice-text mt-4"><?= $info['booking_links']['intro'] ?></p>
        
        <?php foreach ($info['booking_links']['links'] as $link): ?>
            <div class="link <?= $link['class'] ?>">
                <p class="text-center">
                    <a href="<?= $link['url'] ?>" style="text-decoration: none; color: inherit;">
                        <?= $link['text'] ?>
                    </a>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</section>