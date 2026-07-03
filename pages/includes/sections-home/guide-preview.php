<?php
/** @var array $guideData */

$items = $guideData['items'] ?? [];

$title = $guideData['title'] ?? 'الدليل';

if (!is_array($items) || empty($items)) {
?>

  <p class="text-center py-5">
    لا توجد مقالات حالياً
  </p>

<?php
  return;
}

$chunks = array_chunk($items, 3);
?>

<section class="guide py-2" aria-label="<?= e($title) ?>">
  <div class="custom-container">

    <h2 class="mb-2 pt-5 sec-title">
      <?= e($title) ?>
    </h2>

    <div id="carousel-guide"
         class="carousel slide"
         data-bs-ride="carousel"
         data-bs-interval="6000">

      <div class="carousel-inner">

        <?php foreach ($chunks as $i => $chunk): ?>
          <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">

            <div class="row g-4">

              <?php foreach ($chunk as $item): ?>

                <?php
                  $imageUrl = BASE_URL . ltrim($item['image'] ?? '', '/');
                ?>

                <div class="col-lg-4 col-md-6 col-sm-12">

                  <div class="card h-100 shadow-sm border-0">

                    <div class="card-body d-flex flex-column">

                      <div class="guide-img-container mb-3">

                        <img src="<?= e($imageUrl) ?>"
                             alt="<?= e($item['title'] ?? '') ?>"
                             class="img-fluid rounded-3"
                             loading="lazy">

                      </div>

                      <h5 class="card-title fw-bold">
                        <?= e($item['title'] ?? '') ?>
                      </h5>

                      <p class="card-text text-muted">
                        <?= e($item['excerpt'] ?? '') ?>
                      </p>

                      <a href="<?= BASE_URL ?>guide/<?= (int)$item['id'] ?>"
                         class="btn-link mt-auto fw-bold text-decoration-none">

                        قراءة المزيد

                        <img src="<?= BASE_URL ?>assets/img/home/Arrow.svg"
                             alt=""
                             class="ms-2"
                             loading="lazy">

                      </a>

                    </div>

                  </div>

                </div>

              <?php endforeach; ?>

            </div>

          </div>
        <?php endforeach; ?>

      </div>

      <!-- Dots -->
      <?php if (count($chunks) > 1): ?>
        <div class="dots mt-4 text-center" role="tablist">

          <?php foreach ($chunks as $i => $chunk): ?>

            <span class="dot <?= $i === 0 ? 'active' : '' ?>"
                  data-bs-target="#carousel-guide"
                  data-bs-slide-to="<?= (int)$i ?>"
                  role="tab"
                  aria-label="Slide <?= $i + 1 ?>">
            </span>

          <?php endforeach; ?>

        </div>
      <?php endif; ?>

    </div>

  </div>
</section>