<?php
/** @var array $chooseData */
?>

<section class="choose py-5" aria-label="<?= e($chooseData['title'] ?? 'features') ?>">
  <div class="container-fluid custom-container choose-container">

    <h2 class="mb-5 sec-title">
      <?= e($chooseData['title'] ?? 'ما الذي يميز بيتهوفن سيتي') ?>
    </h2>

    <div class="row g-3">

      <?php if (!empty($chooseData['items']) && is_array($chooseData['items'])): ?>

        <?php foreach ($chooseData['items'] as $item): ?>

          <?php
            $image = BASE_URL . ltrim($item['image'] ?? '', '/');
          ?>

          <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-12">

            <div class="card choose-card <?= !empty($item['active']) ? 'active' : '' ?>">

              <div class="card-body">

                <img src="<?= e($image) ?>"
                     alt="<?= e($item['alt'] ?? '') ?>"
                     width="60"
                     height="60"
                     loading="lazy">

                <h5 class="card-title">
                  <?= e($item['title'] ?? '') ?>
                </h5>

                <p class="card-text">
                  <?= e($item['text'] ?? '') ?>
                </p>

              </div>

            </div>

          </div>

        <?php endforeach; ?>

      <?php else: ?>

        <p class="text-center w-100">
          لا توجد بيانات حالياً
        </p>

      <?php endif; ?>

    </div>

  </div>
</section>