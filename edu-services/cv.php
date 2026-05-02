<?php
/**
 * صفحة السيرة الذاتية - cv.php
 */

if (empty($page_content)) {
    $page_content = content('cv');
}

// 1. المكونات العلوية
include "includes/sections-arrival/breadcrumb.php";
include "includes/sections-arrival/custom-services.php";
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <?php 
            // 2. العنوان والوصف
            include "includes/sections-arrival/info-head.php"; 

            // 3. النصائح السريعة (نظام الصح ✅)
            // نمرر مصفوفة 'cv_tips' لتظهر بمكون info-tips
            $page_content['info_section']['pre_travel'] = $page_content['info_section']['cv_tips'];
            include "includes/sections-arrival/info-tips.php"; 

            // 4. تحميل الملفات
            include "includes/sections-arrival/download-section.php"; 
        ?>
    </div>
</section>