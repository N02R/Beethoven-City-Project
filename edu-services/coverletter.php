<?php
/**
 * صفحة خطاب الطلب - coverletter.php
 * الإصدار المصحح لمنع تكرار المحتوى
 */

if (empty($page_content)) {
    $page_content = content('coverletter');
}

// 1. المكونات العلوية
include "includes/sections-arrival/breadcrumb.php";
include "includes/sections-arrival/custom-services.php";
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <?php 
            // 2. العنوان والوصف (العنصر الرئيسي في الأعلى)
            include "includes/sections-arrival/info-head.php"; 

            // --- حل مشكلة التكرار ---

            // أ. نحفظ الملاحظات الهامة الأصلية في متغير مؤقت قبل التعديل على المصفوفة
            $original_notes = $page_content['info_section']['notes']; 

            // ب. إظهار "النقاط" بنظام النجوم (⭐)
            // نخصص 'points' لتكون هي المدخل لمكون info-notes
            $page_content['info_section']['notes'] = $page_content['info_section']['points'];
            include "includes/sections-arrival/info-notes.php"; 

            // ج. إظهار "الملاحظات الهامة" بنظام الصح (✅)
            // نمرر المتغير المؤقت الذي يحوي الملاحظات الحقيقية لمكون info-tips
            $page_content['info_section']['pre_travel'] = $original_notes;
            include "includes/sections-arrival/info-tips.php"; 

            // 5. مكون تحميل الملفات (Word / PDF)
            include "includes/sections-arrival/download-section.php"; 
        ?>
    </div>
</section>