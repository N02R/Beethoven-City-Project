<?php if (isset($page_content['info_section']['notes'])): 
    $notes = $page_content['info_section']['notes'];
    
    // 1. كلاس الأعمدة
    $grid_class = $notes['column_class'] ?? 'col-lg-12 col-md-12 col-sm-12'; 
    
    // 2. كلاس العنوان (advice-text أو note-text)
    $title_class = $notes['title_class'] ?? 'note-text';
    
    // 3. كلاس الحاوية (advice-stars أو غيره)
    $wrapper_class = $notes['wrapper_class'] ?? 'advice-stars';
?>
    <div class="<?= $wrapper_class ?> my-5">
        <!-- تأمين العنوان -->
        <h5 class="mb-4 <?= $title_class ?>"><?= $notes['title'] ?? '' ?></h5>
        
        <ul class="star-list">
            <div class="row"> 
                <!-- التأكد من وجود المصفوفة items وأنها ليست فارغة قبل الدوران -->
                <?php if (isset($notes['items']) && is_array($notes['items'])): ?>
                    <?php foreach ($notes['items'] as $item): ?>
                        <div class="<?= $grid_class ?>">
                            <li>
                                <p>
                                    <img src="<?= BASE_URL ?>assets/img/education/starList.svg" alt="" 
                                         class="<?= ($lang ?? 'ar') == 'ar' ? 'ms-2' : 'me-2' ?>" loading="lazy">
                                    <?= $item ?>
                                </p>
                            </li>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </ul>
    </div>
<?php endif; ?>