<?php
/** @var array $info_items */
$info_items = $info_items ?? [];
?>

<section class="contact-info-section py-5">
    <div class="custom-container">
        <!-- يفضل جلب العنوان من مصفوفة اللغة أيضاً إذا كان متوفراً -->
        <h2 class="sec-title mb-4">معلومات التواصل</h2>
        <div class="contact-info-bar">
            <?php foreach ($info_items as $item): ?>
            <div class="contact-info-item">
                <div class="contact-info-icon">
                    <img src="<?= BASE_URL ?>assets/img/<?= $item['icon'] ?>" alt="<?= e($item['title']) ?>" loading="lazy" />
                </div>
                <!-- فاصل الخط (Separator) -->
                <img src="<?= BASE_URL ?>assets/img/contact us/Line 16.png" alt="separator" loading="lazy" />
                
                <?php 
                    // منطق برمجي لتحديد نوع الرابط (اتصال، إيميل، أو نص عادي)
                    $href = '#';
                    if (filter_var($item['value'], FILTER_VALIDATE_EMAIL)) {
                        $href = 'mailto:' . $item['value'];
                    } elseif (preg_match('/^[0-9\+\-\s]+$/', $item['value'])) {
                        $href = 'tel:' . str_replace(' ', '', $item['value']);
                    }
                ?>
                
                <a href="<?= $href ?>"><?= e($item['value']) ?></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>