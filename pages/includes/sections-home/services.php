<?php
/** @var array $servicesData */
?>

<section class="services py-5" aria-label="خدماتنا المميزة">
  <div class="custom-container">

    <h2 class="mb-5 sec-title">
      خدماتنا
    </h2>

    <div class="row g-4">

      <?php if (!empty($servicesData) && is_array($servicesData)): ?>
        <?php foreach ($servicesData as $item): ?>

          <div class="col-lg-6 col-md-6 col-sm-12">

            <a href="<?= BASE_URL . $item['link'] ?>"
               class="card-link text-decoration-none"
               aria-label="<?= $item['alt'] ?>">

              <div class="card">

                <!-- نفس ستايلك بالضبط -->
                <img src="<?= BASE_URL . $item['image'] ?>"
                     alt="<?= $item['alt'] ?>"
                     width="600" height="400"
                     loading="lazy"
                     class="card-bg-img">

                <div class="card-info">
                  <h3><?= $item['title'] ?></h3>

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