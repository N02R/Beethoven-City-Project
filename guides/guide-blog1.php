<?php
// تأكدي من جلب المحتوى إذا لم يكن موجوداً (لأن index.php هو من يستدعيه)
if (empty($page_content)) {
    $page_content = content('guide-blog1');
}

// 1. استدعاء الهيرو - استخدام المسار النسبي الصحيح للخروج من مجلد guides
include "edu-services/includes/sections-arrival/custom-services.php";

$info = $page_content['info_section'];
?>

<section class="custom-services-info py-5">
    <div class="custom-container">
        <div class="head-info mb-5">
            <h2 class="main-text"><?= $info['head']['title'] ?></h2>
            <p class="par-text"><?= $info['head']['desc'] ?></p>
        </div>

        <div class="advice-stars my-5">
            <h5 class="mb-4 note-text"><?= $info['notes_section']['title'] ?></h5>
            <ul class="star-list p-0">
                <?php foreach ($info['notes_section']['items'] as $item): ?>
                    <li class="mb-4 list-unstyled">
                        <div class="d-flex align-items-start mb-2">
                            <img src="assets/img/education/starList.svg" alt="" class="ms-2 mt-1" width="20" loading="lazy"/>
                            <?php if (isset($item['title'])): ?>
                                <h6 class="fw-bold m-0"><?= $item['title'] ?></h6>
                            <?php endif; ?>
                        </div>
                        
                        <div class="ps-md-5 content-area">
                            <?= $item['content'] ?? '' ?>
                            
                            <?php if (isset($item['list_items'])): ?>
                                <ul class="mt-3 custom-num-list">
                                    <?php foreach ($item['list_items'] as $index => $li): ?>
                                        <li class="mb-2">
                                            <p class="mb-0"><?= ($index + 1) . '. ' . $li ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<?php 
    if (isset($page_content['why_germany'])) {
        $why_germany = $page_content['why_germany'];
        // تأكدي من الخروج للمجلد الرئيسي للوصول لـ includes
        include "../includes/sections-education/why-germany.php"; 
    }
?>

<?php 
    if (isset($page_content['timeline'])) {
        $timeline = $page_content['timeline'];
        // تأكدي من الخروج للمجلد الرئيسي للوصول لـ includes
        include "../includes/sections-education/timeline.php"; 
    }
?>