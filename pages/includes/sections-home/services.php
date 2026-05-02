<?php
/** 
 * @var array $services 
 */
?>
<section class="services py-5" aria-label="خدماتنا المميزة">
  <div class="custom-container">

    <h2 class="mb-5 sec-title">
      <?= e($services['title'] ?? 'خدماتنا') ?>
    </h2>

    <div class="row g-4">
      <?php if (!empty($services['items']) && is_array($services['items'])): ?>
        <?php foreach ($services['items'] as $item): ?>
          
          <div class="col-lg-6 col-md-6 col-sm-12">
            <!-- استخدام BASE_URL لضمان عمل الروابط النظيفة -->
            <a href="<?= BASE_URL . e($item['link'] ?? '#') ?>" 
               class="card-link text-decoration-none" 
               aria-label="<?= e($item['alt'] ?? $item['title']) ?>">

              <div class="card">
                <!-- استخدام BASE_URL للصور مهم جداً للأداء والأرشفة -->
                <img src="<?= BASE_URL . e($item['image']) ?>" 
                     alt="<?= e($item['alt'] ?? '') ?>" 
                     width="600" height="400" 
                     loading="lazy" 
                     class="card-bg-img">

                <div class="card-info">
                  <h3><?= e($item['title']) ?></h3>
                  <!-- إضافة BASE_URL لأيقونة السهم -->
                  <img src="<?= BASE_URL ?>assets/img/home/Arrow.svg" alt="" aria-hidden="true" loading="lazy">
                </div>
              </div>
            </a>
          </div>

        <?php endforeach; ?>
      <?php else: ?>
        <!-- نص احتياطي في حال عدم وجود بيانات -->
        <p class="text-center"><?= e($_SESSION['lang'] == 'en' ? 'No services available.' : 'لا توجد خدمات لعرضها حالياً.') ?></p>
      <?php endif; ?>
    </div>

  </div>
</section>