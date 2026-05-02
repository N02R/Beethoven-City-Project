<?php
/** @var array $whatsapp */
$whatsapp = $whatsapp ?? [];
?>

<section class="whatsapp-section py-5">
    <div class="custom-container">
        <div class="whatsapp-box text-center">
            <h2 class="whatsapp-title">
                <?= e($whatsapp['title'] ?? '') ?>
            </h2>
            
            <?php 
                // معالجة الرابط برمجياً لضمان أنه رابط سليم
                $waLink = $whatsapp['link'] ?? '#';
                // إذا لم يكن الرابط يبدأ بـ http، يمكننا افتراض أنه رقم هاتف وإضافته لتنسيق واتساب
                if ($waLink !== '#' && !str_starts_with($waLink, 'http')) {
                    $waLink = 'https://wa.me/' . str_replace(['+', ' '], '', $waLink);
                }
            ?>

            <a href="<?= e($waLink) ?>" target="_blank" rel="noopener" class="btn whatsapp-btn">
                <?= e($whatsapp['btn_text'] ?? 'تواصل معنا') ?>
            </a>
        </div>
    </div>
</section>