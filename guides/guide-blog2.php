<?php
// جلب المحتوى
$page_content = content('guide-blog2');

// 1. استدعاء الهيرو (قالب مشترك)
include "includes/sections-arrival/custom-services.php";

$info = $page_content['info_section'];
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <div class="head-info">
            <h2 class="main-text"><?= $info['head']['title'] ?></h2>
            <p class="par-text"><?= $info['head']['desc'] ?></p>
        </div>
    </div>
</section>

<?php 
    $why_germany = $page_content['why_germany'];
    include "includes/sections-education/why-germany.php"; 
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <div class="advice-check py-5">
            <h5 class="advice-text"><?= $info['checklist']['title'] ?></h5>
            <div class="row">
                <?php foreach ($info['checklist']['items'] as $check_item): ?>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <p>✅ <?= $check_item ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php 
    $timeline = $page_content['timeline'];
    include "includes/sections-education/timeline.php"; 
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <div class="advice-stars my-5">
            <h5 class="mb-4 advice-text"><?= $info['notes_section']['title'] ?></h5>
            <ul class="star-list">
                <?php foreach ($info['notes_section']['items'] as $note): ?>
                    <li>
                        <p>
                            <img src="assets/img/education/starList.svg" alt="" class="ms-2" loading="lazy"/>
                            <span class="fw-bold"><?= $note['title'] ?></span> <?= $note['content'] ?>
                        </p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>