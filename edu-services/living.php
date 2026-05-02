<?php
if (empty($page_content)) {
    $page_content = content('living');
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

            // 2. نصائح تقليل النفقات (صح)
            $page_content['info_section']['pre_travel'] = $info['saving_tips'];
            include "includes/sections-arrival/info-tips.php"; 

            // 3. ملاحظات هامة (نجوم)
            $page_content['info_section']['notes'] = $info['important_notes'];
            include "includes/sections-arrival/info-notes.php"; 
        ?>
    </div>
</section>