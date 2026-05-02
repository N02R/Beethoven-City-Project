<?php
/** @var array $team */
$team = $team ?? [];
?>

<section class="team py-5">
    <div class="custom-container">
        <div class="team-text mb-5">
            <h2 class="sec-title"><?= e($team['title']) ?></h2>
            <p class="description main-p"><?= e($team['description']) ?></p>
        </div>
        
        <div class="swiper-container-wrapper">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php if (!empty($team['members'])): ?>
                        <?php foreach ($team['members'] as $member): ?>
                        <div class="swiper-slide">
                            <div class="team-card">
                                <!-- معالجة مسار الصورة تقنياً -->
                                <img src="<?= BASE_URL . $member['image'] ?>" alt="<?= e($member['name']) ?>" loading="lazy" />
                                <div class="info <?= !empty($member['is_active']) && $member['is_active'] ? 'active' : '' ?>">
                                    <h5><?= e($member['name']) ?></h5>
                                    <p><?= e($member['position']) ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="swiper-nav-wrapper">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>