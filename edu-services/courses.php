<?php
/**
 * صفحة الدورات التحضيرية للغة - courses.php
 */

if (empty($page_content)) {
    $page_content = content('courses');
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

            // 3. أهداف الدورة (باستخدام مكون الـ ✅)
            // قمنا بتغيير المفتاح برمجياً ليقرأ من 'goals' بدلاً من 'pre_travel'
            $page_content['info_section']['pre_travel'] = $page_content['info_section']['goals'];
            include "includes/sections-arrival/info-tips.php"; 

            // 4. النص الأحمر التحذيري
            if (isset($page_content['info_section']['warning_text'])): ?>
                <p class="red-text"><?= $page_content['info_section']['warning_text'] ?></p>
            <?php endif; 

            // 5. أماكن الالتحاق والتكلفة
            include "includes/sections-arrival/course-locations.php"; 
        ?>
    </div>
</section>