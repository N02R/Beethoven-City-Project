<?php if (isset($page_content['info_section']['pre_travel'])): 
    $tips = $page_content['info_section']['pre_travel'];
    
    // 1. كلاس الأعمدة الافتراضي
    $default_grid_class = $tips['column_class'] ?? 'col-lg-6 col-md-6 col-sm-12'; 
    
    // 2. كلاس العنوان
    $title_class = $tips['title_class'] ?? 'advice-text';
    
    // 3. كلاس الحاوية
    $wrapper_class = $tips['wrapper_class'] ?? 'advice-check';
?>
    <div class="<?= $wrapper_class ?> py-5">
        <h5 class="<?= $title_class ?>"><?= $tips['title'] ?? '' ?></h5>
        
        <?php if (isset($tips['sub_title'])): ?>
             <h6><?= $tips['sub_title'] ?></h6>
        <?php endif; ?>

        <?php if (isset($tips['desc'])): ?>
            <p><?= $tips['desc'] ?></p>
        <?php endif; ?>
        
        <div class="row">
            <?php 
            $list_items = $tips['items'] ?? ($tips['checks'] ?? []);
            if (is_array($list_items)):
                foreach ($list_items as $item): 
                    // معالجة البيانات (نص أو مصفوفة) لضمان عدم توقف الكود
                    $item_text = is_array($item) ? ($item['text'] ?? '') : $item;
                    $item_class = is_array($item) ? ($item['class'] ?? $default_grid_class) : $default_grid_class;
                ?>
                    <div class="<?= $item_class ?>">
                        <p>✅ <?= $item_text ?></p>
                    </div>
                <?php endforeach; 
            endif; ?>
        </div>
    </div>
<?php endif; ?>