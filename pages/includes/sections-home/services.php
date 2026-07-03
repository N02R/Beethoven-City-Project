<?php
/** @var array $servicesData */
?>

<section class="services py-5" aria-label="<?= e($servicesData['title'] ?? 'services') ?>">
  <div class="custom-container">

    <h2 class="mb-5 sec-title">
      <?= e($servicesData['title'] ?? 'خدماتنا') ?>
    </h2>

    <div class="row g-4">

      <?php if (!empty($servicesData['items']) && is_array($servicesData['items'])): ?>

        <?php foreach ($servicesData['items'] as $item): ?>

          <?php
            $link  = BASE_URL . ltrim($item['link'] ?? '', '/');
            $image = BASE_URL . ltrim($item['image'] ?? '', '/');
          ?>

          <div class="col-lg-6 col-md-6 col-sm-12">

            <a href="<?= e($link) ?>"
               class="card-link text-decoration-none"
               aria-label="<?= e($item['alt'] ?? '') ?>">

              <div class="card">

                <img src="<?= e($image) ?>"
                     alt="<?= e($item['alt'] ?? '') ?>"
                     width="600"
                     height="400"
                     loading="lazy"
                     class="card-bg-img">

                <div class="card-info">
                  <h3><?= e($item['title'] ?? '') ?></h3>

                  <img src="<?= BASE_URL ?>assets/img/home/Arrow.svg"
                       alt=""
                       aria-hidden="true"
                       loading="lazy">
                </div>

              </div>

            </a>

          </div>

        <?php endforeach; ?>

      <?php else: ?>

        <p class="text-center">
          لا توجد خدمات حالياً
        </p>

      <?php endif; ?>

    </div>

  </div>
</section>