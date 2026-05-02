<?php
/** 
 * @var array $config 
 * @var array $hero 
 */
?>
<section class="hero py-5" aria-labelledby="hero-title">
  <div class="custom-container">
    <div class="hero-container">
      <div class="hero-content">

        <!-- حماية العنوان الرئيسي -->
        <h1 id="hero-title">
          <?= e($hero['title'] ?? $config['default_title'][$_SESSION['lang']]) ?>
        </h1>

        <!-- حماية الوصف -->
        <p>
          <?= e($hero['description'] ?? $config['default_description'][$_SESSION['lang']]) ?>
        </p>

        <?php if (!empty($hero['button_text'])): ?>
            <!-- تنظيف رابط الزر ونصه -->
            <a href="<?= BASE_URL . e($hero['button_link'] ?? '') ?>" 
               class="btn btn-lg hero-btn" 
               title="<?= e($hero['button_text']) ?>"
               aria-label="<?= e($hero['button_text']) ?>">
               <?= e($hero['button_text']) ?>
            </a>
        <?php endif; ?>

      </div>

      <?php if (!empty($hero['image'])): ?>
      <div class="hero-image">
          <!-- استخدام e() لتنظيف مسار الصورة ونصوص الـ Alt -->
          <img src="<?= BASE_URL ?>assets/img/<?= e($hero['image']) ?>" 
               alt="<?= e($hero['alt_text'] ?? $hero['title'] ?? 'Beethoven City Hero') ?>" 
               class="img-fluid" 
               loading="eager">
      </div>
      <?php endif; ?>

    </div>
  </div>
</section>