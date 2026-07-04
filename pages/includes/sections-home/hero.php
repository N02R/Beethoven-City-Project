<section class="hero py-5">

  <div class="custom-container">

    <div class="hero-container">

      <div class="hero-content">

        <h1>
          <?= e($hero['title_text'] ?? 'مرحباً بك في موقعنا') ?>
        </h1>

        <p>
          <?= e($hero['description'] ?? 'نقدم أفضل الخدمات التعليمية') ?>
        </p>

        <a href="<?= e($hero['button_link'] ?? '#') ?>" class="btn hero-btn">
          <?= e($hero['button_text'] ?? 'ابدأ الآن') ?>
        </a>

      </div>

      <div class="hero-image">

        <?php if (!empty($hero['image'])): ?>
          <img src="<?= BASE_URL . 'assets/img/' . e($hero['image']) ?>">
        <?php endif; ?>

      </div>

    </div>

  </div>

</section>