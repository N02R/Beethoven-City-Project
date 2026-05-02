<?php
/** 
 * @var array $choose 
 */
?>
<section class="choose py-5" aria-label="مميزات بيتهوفن سيتي">
  <div class="container-fluid custom-container choose-container">

    <h2 class="mb-5 sec-title">
      <?= e($choose['title'] ?? 'ما الذي يميز بيتهوفن سيتي') ?>
    </h2>

    <div class="row g-3">
      <?php if (!empty($choose['items']) && is_array($choose['items'])): ?>
        <?php foreach ($choose['items'] as $item): ?>
          
          <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <!-- استخدام الشرط الثلاثي لإضافة كلاس النشاط -->
            <div class="card choose-card <?= ($item['active'] ?? false) ? 'active' : '' ?>">
              <div class="card-body">
                <!-- إضافة BASE_URL لضمان تحميل الأيقونة من المسار الصحيح -->
                <img src="<?= BASE_URL . e($item['image']) ?>" 
                     alt="<?= e($item['alt'] ?? $item['title']) ?>" 
                     width="60" height="60" 
                     loading="lazy">
                
                <h5 class="card-title"><?= e($item['title']) ?></h5>
                
                <p class="card-text">
                  <?= e($item['text']) ?>
                </p>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-center w-100"><?= e($_SESSION['lang'] == 'en' ? 'Features not available.' : 'المميزات غير متوفرة حالياً.') ?></p>
      <?php endif; ?>
    </div>

  </div>
</section>