<?php
/** 
 * @var array $config 
 * @var array|null $hero 
 */
?>

<section class="hero py-5" aria-labelledby="hero-title">
  <div class="custom-container">
    <div class="hero-container">

      <div class="hero-content">

        <!-- العنوان -->
        <h1 id="hero-title">
          <?= e($hero['title'] ?? $config['default_title'][$_SESSION['lang'] ?? 'ar']) ?>
        </h1>

        <!-- الوصف -->
        <p>
          <?= e($hero['description'] ?? $config['default_description'][$_SESSION['lang'] ?? 'ar']) ?>
        </p>

        <!-- الزر -->
        <?php if (!empty($hero['button_text'])): ?>
          <a 
            href="<?= BASE_URL . ($hero['button_link'] ?? 'index.php?page=contact') ?>" 
            class="btn btn-lg hero-btn"
            title="<?= e($hero['button_text']) ?>"
            aria-label="<?= e($hero['button_text']) ?>"
          >
            <?= e($hero['button_text']) ?>
          </a>
        <?php endif; ?>

      </div>

      <!-- الصورة -->
      <?php if (!empty($hero['image'])): ?>
        <div class="hero-image">
          <img 
            src="<?= BASE_URL ?>assets/img/<?= e($hero['image']) ?>" 
            alt="<?= e($hero['alt_text'] ?? $hero['title'] ?? 'Beethoven City Hero') ?>" 
            class="img-fluid" 
            loading="eager"
          >
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>