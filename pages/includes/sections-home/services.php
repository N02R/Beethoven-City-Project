<?php
/**
 * @var array $servicesData
 */
?>

<section class="services py-5" aria-label="services">

  <div class="custom-container">

    <h2 class="mb-5">
      خدماتنا
    </h2>

    <div class="row g-4">

      <?php if (!empty($servicesData)): ?>

        <?php foreach ($servicesData as $item): ?>

          <div class="col-lg-6 col-md-6 col-sm-12">

            <a href="<?= $item['link'] ?>" class="text-decoration-none">

              <div class="card">

<img src="<?= BASE_URL . $item['image'] ?>"
     alt="<?= $item['alt'] ?>"
     loading="lazy">

                <h3><?= $item['title'] ?></h3>

              </div>

            </a>

          </div>

        <?php endforeach; ?>

      <?php else: ?>

        <p>لا توجد خدمات حالياً</p>

      <?php endif; ?>

    </div>

  </div>

</section>