<section class="hero py-5">

  <div class="custom-container">

    <div class="hero-container">

      <div class="hero-content">

        <h1>
          <?= $hero['title_text'] ?? '' ?>
        </h1>

        <p>
          <?= $hero['description'] ?? '' ?>
        </p>

        <?php if (!empty($hero['button_text'])): ?>
          <a href="<?= $hero['button_link'] ?>" class="btn btn-primary hero-btn">
            <?= $hero['button_text'] ?>
          </a>
        <?php endif; ?>

      </div>

      <?php if (!empty($hero['image'])): ?>
        <div class="hero-image">
          <img src="<?= BASE_URL . 'assets/img/' . $hero['image'] ?>"
               alt="hero image"
               class="img-fluid">
        </div>
      <?php endif; ?>

    </div>

  </div>

</section>