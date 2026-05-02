<?php if (isset($page_content['info_section']['extra_content'])): 
    $extra = $page_content['info_section']['extra_content']; ?>
    
    <div class="links">
        <!-- تأمين نص المقدمة -->
        <p class="mt-5"><?= $extra['intro'] ?? '' ?></p>
        
        <!-- التحقق من الروابط قبل الدوران -->
        <?php if (isset($extra['links']) && is_array($extra['links'])): ?>
            <?php foreach ($extra['links'] as $link): ?>
                <a href="<?= $link ?>" target="_blank" class="d-block mb-2"><?= $link ?></a>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- تأمين النص الثانوي -->
        <p class="mt-5"><?= $extra['secondary_text'] ?? '' ?></p>
        
        <!-- التحقق من الـ spans قبل الدوران -->
        <?php if (isset($extra['spans']) && is_array($extra['spans'])): ?>
            <?php foreach ($extra['spans'] as $span): ?>
                <span class="span-list d-block mb-2"><?= $span ?></span>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- تأمين نص التذييل -->
        <p class="mt-5"><?= $extra['footer_text'] ?? '' ?></p>
    </div>
    
<?php endif; ?>