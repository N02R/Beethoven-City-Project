<?php

/**
 * صفحة الاستقبال والمواصلات والسكن - arrival.php
 */

// 1. المكونات العلوية
include "includes/sections-arrival/breadcrumb.php";
include "includes/sections-arrival/custom-services.php";
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <?php 
            // استدعاء المكونات بالترتيب المطلوب لصفحة الاستقبال
            include "includes/sections-arrival/info-head.php";   // العنوان والوصف
            include "includes/sections-arrival/info-tips.php";   // قسم النصائح والـ ✅
            include "includes/sections-arrival/info-notes.php";  // قسم الملاحظات والنجوم ⭐
        ?>
    </div>
</section>