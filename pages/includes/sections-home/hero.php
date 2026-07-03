<section class="hero py-5">

  <div class="custom-container">

    <div class="hero-container">

      <div class="hero-content">

        <h1>
          <?= e($hero['title_text'] ?? '') ?>
        </h1>

        <p>
          <?= e($hero['description'] ?? '') ?>
        </p>

        <?php if (!empty($hero['button_text'])): ?>
          <a href="<?= e($hero['button_link'] ?? '#') ?>" 
             class="btn btn-primary hero-btn">
            <?= e($hero['button_text']) ?>
          </a>
        <?php endif; ?>

      </div>

      <?php if (!empty($hero['image'])): ?>

        <?php
          $heroImage = BASE_URL . 'assets/img/' . ltrim($hero['image'], '/');
        ?>

        <div class="hero-image">
          <img src="<?= e($heroImage) ?>"
               alt="<?= e($hero['title_text'] ?? 'hero image') ?>"
               class="img-fluid"
               loading="lazy">
        </div>

      <?php endif; ?>

    </div>

  </div>

</section>