<?php
/** 
 * @var array $reviews 
 */

// التأكد من وجود بيانات قبل عرض القسم
if (empty($reviews['videos']) || !is_array($reviews['videos'])) {
    return;
}
?>

<section class="reviews py-5" aria-label="<?= e($reviews['title'] ?? 'آراء عملاء بيتهوفن سيتي') ?>">
    <div class="reviews-bg">
        <div class="custom-container">
            <!-- حماية عنوان القسم -->
            <h2 class="py-5 text-center sec-title">
                <?= e($reviews['title'] ?? 'ماذا يقول عملاؤنا؟') ?>
            </h2>
        </div>
    </div>

    <div class="custom-container">
        <div class="reviews-carousel-wrapper">
            <div id="carousel-reviews" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

                <div class="carousel-inner">
                    <?php foreach ($reviews['videos'] as $index => $video): ?>
                        <div class="carousel-item <?= ($index === 0) ? 'active' : '' ?>">
                            <div class="video-wrapper">
                                <div class="video-container">
                                    <!-- حماية رابط الفيديو وعنوانه -->
                                    <iframe 
                                        src="<?= e($video['url']) ?>" 
                                        title="<?= e($video['title'] ?? 'فيديو رأي عميل') ?>"
                                        allowfullscreen 
                                        loading="lazy"
                                        style="border: 0;">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- النقاط التوضيحية (Dots) -->
                <div class="dots mt-4" role="tablist">
                    <?php foreach ($reviews['videos'] as $index => $video): ?>
                        <span class="dot <?= ($index === 0) ? 'active' : '' ?>" 
                              data-bs-target="#carousel-reviews"
                              data-bs-slide-to="<?= $index ?>" 
                              role="tab"
                              aria-label="عرض فيديو رقم <?= $index + 1 ?>">
                        </span>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</section>