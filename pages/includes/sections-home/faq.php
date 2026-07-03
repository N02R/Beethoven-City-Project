<?php 
/** 
 * @var array $faq 
 */

$title = $faq['title'] ?? 'الأسئلة الشائعة';
$items = $faq['items'] ?? [];
?>

<section class="popular py-5" aria-label="<?= e($title) ?>">
  <div class="container-fluid custom-container">

    <h2 class="sec-title mb-5">
      <?= e($title) ?>
    </h2>

    <div class="accordion mb-5" id="accordionFAQ">

      <?php if (!empty($items) && is_array($items)): ?>
        <?php foreach ($items as $index => $item): ?>

          <?php
            $id = $index + 1;
            $headingId = "heading" . $id;
            $collapseId = "collapse" . $id;

            $question = $item['question'] ?? '';
            $answer = $item['answer'] ?? '';
          ?>

          <div class="accordion-item">
            <h3 class="accordion-header" id="<?= $headingId ?>">

              <button class="accordion-button <?= $index === 0 ? '' : 'collapsed' ?>" 
                      type="button" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#<?= $collapseId ?>" 
                      aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" 
                      aria-controls="<?= $collapseId ?>">

                <?= e($question) ?>

              </button>

            </h3>

            <div id="<?= $collapseId ?>" 
                 class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" 
                 aria-labelledby="<?= $headingId ?>" 
                 data-bs-parent="#accordionFAQ">

              <div class="accordion-body">
                <?= nl2br(e($answer)) ?>
              </div>

            </div>
          </div>

        <?php endforeach; ?>
      <?php else: ?>

        <p class="text-center">
          <?= e(($_SESSION['lang'] ?? 'ar') === 'en'
            ? 'No FAQs available.'
            : 'لا توجد أسئلة شائعة متوفرة حالياً.') ?>
        </p>

      <?php endif; ?>

    </div>
  </div>
</section>