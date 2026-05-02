<?php
if (empty($page_content)) {
    $page_content = content('foundation');
}

include "includes/sections-arrival/breadcrumb.php";
include "includes/sections-arrival/custom-services.php";
$info = $page_content['info_section'];
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <?php include "includes/sections-arrival/info-head.php"; ?>

        <?php 
            $page_content['info_section']['pre_travel'] = $info['goals'];
            include "includes/sections-arrival/info-tips.php"; 
        ?>

        <div class="head-info">
            <h5 class="advice-text"><?= $info['learning_info']['title'] ?></h5>
            <p class="par-text" style="font-weight: 500;"><?= $info['learning_info']['intro'] ?></p>
            <?php foreach($info['learning_info']['points'] as $point): ?>
                <p class="par-text"><?= $point ?></p>
            <?php endforeach; ?>
        </div>

        <?php 
            $page_content['info_section']['notes'] = $info['course_types'];
            include "includes/sections-arrival/info-notes.php"; 
        ?>

        <div class="head-info">
            <h5 class="advice-text"><?= $info['uni_diff']['title'] ?></h5>
            <p class="par-text" style="font-weight: 500;"><?= $info['uni_diff']['desc'] ?></p>
            <p class="par-text"><span style="font-weight: 500;">الجامعات العامة:</span> <?= $info['uni_diff']['public'] ?></p>
            <p class="par-text"><span style="font-weight: 500;">جامعات العلوم التطبيقية:</span> <?= $info['uni_diff']['applied'] ?></p>
        </div>

        <div class="head-info py-5">
            <h5 class="advice-text"><?= $info['types_info']['title'] ?></h5>
            <p class="par-text"><?= $info['types_info']['gov'] ?></p>
            <p class="par-text"><?= $info['types_info']['private'] ?></p>
        </div>

        <?php 
            $page_content['info_section']['notes'] = $info['important_notes'];
            include "includes/sections-arrival/info-notes.php"; 
        ?>

        <div class="head-info py-5">
            <h5 class="mb-4 advice-text"><?= $info['exams']['aufnahmeprufung']['title'] ?></h5>
            <p class="par-text" style="font-weight: 500;"><?= $info['exams']['aufnahmeprufung']['text'] ?></p>
        </div>
        <div class="head-info">
            <h5 class="mb-4 advice-text"><?= $info['exams']['fsp']['title'] ?></h5>
            <p class="par-text" style="font-weight: 500;"><?= $info['exams']['fsp']['text'] ?></p>
        </div>

        <?php 
            $page_content['info_section']['pre_travel'] = $info['pre_apply_tips'];
            include "includes/sections-arrival/info-tips.php"; 
        ?>
    </div>
</section>