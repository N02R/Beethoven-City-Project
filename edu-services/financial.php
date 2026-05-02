<?php
if (empty($page_content)) {
    $page_content = content('financial');
}

include "includes/sections-arrival/breadcrumb.php";
include "includes/sections-arrival/custom-services.php";
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <?php 
            // 1. الرأس
            include "includes/sections-arrival/info-head.php"; 
        ?>
        
        <h5 class="advice-text mt-5"><?= $page_content['info_section']['head']['extra_head']['title'] ?></h5>
        <p><?= $page_content['info_section']['head']['extra_head']['text'] ?></p>

        <?php
            // 2. خيارات الضمان (صح)
            $page_content['info_section']['pre_travel'] = $page_content['info_section']['options'];
            include "includes/sections-arrival/info-tips.php"; 

            // 3. الحساب المغلق (نجوم)
            $page_content['info_section']['notes'] = $page_content['info_section']['blocked_account'];
            include "includes/sections-arrival/info-notes.php"; 
        ?>

        <div class="py-5">
            <?php foreach ($page_content['info_section']['external_links'] as $link): ?>
                <div class="link <?= $link['class'] ?> mb-4">
                    <p class="text-center">
                        <a href="<?= $link['url'] ?>" style="text-decoration: none; color: inherit;">
                            <?= $link['text'] ?>
                        </a>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>