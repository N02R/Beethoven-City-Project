<section class="count">
    <div class="custom-container">
        <div class="row g-4">
            <?php if (!empty($counters)): ?>
                <?php foreach ($counters as $counter): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="count-card">
                        <div class="count-img">
                            <!-- إضافة BASE_URL للمسار مع حماية النص -->
                            <img src="<?= BASE_URL . $counter['icon'] ?>" alt="<?= e($counter['label']) ?>" loading="lazy">
                        </div>
                        <div class="count-info">
                            <span><?= e($counter['number']) ?></span>
                            <p><?= e($counter['label']) ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>