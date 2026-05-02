<?php
/**
 * صفحة التحقق من الشهادات - check.php
 */

if (empty($page_content)) {
    $page_content = content('check');
}

include "includes/sections-arrival/breadcrumb.php";
include "includes/sections-arrival/custom-services.php";
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <?php 
            include "includes/sections-arrival/info-head.php";    // مشترك
            include "includes/sections-arrival/info-notes.php";   // مشترك (النجوم)
            include "includes/sections-arrival/service-details.php"; // خاص بهذه الصفحة
        ?>
    </div>
</section>