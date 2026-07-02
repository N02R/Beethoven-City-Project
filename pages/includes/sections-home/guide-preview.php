<?php
/** 
 * @var array $guide
 */

$guideData = $guide ?? [];

if (empty($guideData)) {
    return;
}

$chunks = array_chunk($guideData, 3);

$isEn = ($_SESSION['lang'] == 'en');

$title = $isEn ? 'Beethoven Comprehensive Guide' : 'دليل بيتهوفن الشامل';

$desc = $isEn 
    ? 'Everything you need to know about studying and working in Germany.' 
    : 'كل ما تحتاج معرفته عن الدراسة والعمل في ألمانيا، من القبول الجامعي حتى التدريب المهني.';

$readMore = $isEn ? 'Read More' : 'قراءة المزيد';
?>

<section class="guide py-2" aria-label="<?= e($title) ?>">
  <div class="custom-container">

    <h2 class="mb-2 pt-5 sec-title"><?= e($title) ?></h2>

    <p class="main-p"><?= e($desc) ?></p>

    <?php if (!empty($chunks)): ?>

      <div id="carousel-guide"
           class="carousel slide"
           data-bs-ride="carousel"
           data-bs-interval="6000">

        <div class="carousel-inner">

          <?php foreach ($chunks as $i => $chunk): ?>

            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">

              <div class="row g-4">

                <?php foreach ($chunk as $item): ?>

                  <div class="col-lg-4 col-md-6 col-sm-12">

                    <div class="card h-100 shadow-sm border-0">

                      <div class="card-body d-flex flex-column">

                        <div class="guide-img-container mb-3">

                          <img src="<?= BASE_URL . $item['image'] ?>"
                               alt="<?= $item['title'] ?>"
                               class="img-fluid rounded-3"
                               loading="lazy">

                        </div>

                        <h5 class="card-title fw-bold">
                          <?= $item['title'] ?>
                        </h5>

                        <p class="card-text text-muted">
                          <?= $item['excerpt'] ?>
                        </p>

                        <a href="<?= BASE_URL ?>guide/<?= $item['id'] ?>"
                           class="btn-link mt-auto fw-bold text-decoration-none">

                          <?= $readMore ?>

                          <img src="<?= BASE_URL ?>assets/img/home/Arrow..svg"
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

        <?php if (count($chunks) > 1): ?>

          <div class="dots mt-4" role="tablist">

            <?php foreach ($chunks as $i => $chunk): ?>

              <span class="dot <?= $i === 0 ? 'active' : '' ?>"
                    data-bs-target="#carousel-guide"
                    data-bs-slide-to="<?= $i ?>"
                    role="tab"
                    aria-label="Slide <?= $i + 1 ?>"></span>

            <?php endforeach; ?>

          </div>

        <?php endif; ?>

      </div>

    <?php else: ?>

      <p class="text-center text-muted">
        <?= $isEn ? 'No articles available yet.' : 'لا توجد مقالات في الدليل حالياً.' ?>
      </p>

    <?php endif; ?>

  </div>
</section>