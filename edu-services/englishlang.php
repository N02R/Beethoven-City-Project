<?php
/**
 * صفحة الدراسة بالإنجليزية - englishlang.php
 */

if (empty($page_content)) {
    $page_content = content('englishlang');
}

include "includes/sections-arrival/breadcrumb.php";
include "includes/sections-arrival/custom-services.php";
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <?php 
            // 1. العنوان والوصف
            include "includes/sections-arrival/info-head.php"; 

            // 2. من يمكنه الاستفادة (نظام الصح ✅)
            // نمرر المصفوفة لقسم pre_travel
            $page_content['info_section']['pre_travel'] = $page_content['info_section']['eligibility'];
            include "includes/sections-arrival/info-tips.php"; 

            // 3. متطلبات اللغة (نظام النجوم ⭐)
            // نمرر المصفوفة لقسم notes ليعمل مكون النجوم
            $page_content['info_section']['notes'] = $page_content['info_section']['requirements'];
            include "includes/sections-arrival/info-notes.php"; 
        ?>

        <div class="note mt-5">
            <p><?php echo $page_content['info_section']['note_bottom']; ?></p>
        </div>
    </div>
</section>