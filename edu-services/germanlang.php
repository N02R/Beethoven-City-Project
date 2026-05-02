<?php
if (empty($page_content)) {
    $page_content = content('germanlang');
}

include "includes/sections-arrival/breadcrumb.php";
include "includes/sections-arrival/custom-services.php";
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <?php 
            // 1. الرأس
            include "includes/sections-arrival/info-head.php"; 

            // 2. المستويات (نجوم)
            $page_content['info_section']['notes'] = $page_content['info_section']['levels'];
            include "includes/sections-arrival/info-notes.php"; 

            // 3. المميزات (صح)
            $page_content['info_section']['pre_travel'] = $page_content['info_section']['features'];
            include "includes/sections-arrival/info-tips.php"; 

            // 4. النصائح (صح)
            $page_content['info_section']['pre_travel'] = $page_content['info_section']['tips'];
            include "includes/sections-arrival/info-tips.php"; 
        ?>
    </div>
</section>