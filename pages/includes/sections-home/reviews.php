<?php
/** 
 * @var array $reviews 
 */

$videos = $reviews['videos'] ?? [];

if (!is_array($videos) || empty($videos)) {
    // عرض رسالة بدل كسر الصفحة (أفضل في CMS)
    echo '<p class="text-center py-5">لا توجد فيديوهات حالياً</p>';
    return;
}

$title = $reviews['title'] ?? 'آراء عملاء بيتهوفن سيتي';
?>

<section class="reviews py-5" aria-label="<?= e($title) ?>">
    <div class="reviews-bg">
        <div class="custom-container">

            <h2 class="py-5 text-center sec-title">
                <?= e($title) ?>
            </h2>

        </div>
    </div>

    <div class="custom-container">
        <div class="reviews-carousel-wrapper">

            <div id="carousel-reviews" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

                <div class="carousel-inner">

                    <?php foreach ($videos as $index => $video): ?>

                        <div class="carousel-item <?= ($index === 0) ? 'active' : '' ?>">

                            <div class="video-wrapper">
                                <div class="video-container">

                                    <iframe
                                        src="<?= $video['url'] ?>"
                                        title="<?= e($video['title'] ?? '') ?>"
                                        allowfullscreen
                                        loading="lazy"
                                        style="border: 0;">
                                    </iframe>

                                </div>
                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

                <!-- Dots -->
                <div class="dots mt-4" role="tablist">

                    <?php foreach ($videos as $index => $video): ?>

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