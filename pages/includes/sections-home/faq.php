<?php
/** 
 * @var array $faq 
 */
?>
<section class="popular py-5" aria-label="الأسئلة الشائعة عن الدراسة في ألمانيا">
  <div class="container-fluid custom-container">

    <h2 class="sec-title mb-5">
      <?= e($faq['title'] ?? 'الأسئلة الشائعة') ?>
    </h2>

    <div class="accordion mb-5" id="accordionFAQ">

      <?php if (!empty($faq['items']) && is_array($faq['items'])): ?>
        <?php foreach ($faq['items'] as $index => $item): ?>

          <?php
            // توليد معرفات فريدة لكل عنصر في الأكورديون
            $id = $index + 1;
            $headingId = "heading" . $id;
            $collapseId = "collapse" . $id;
          ?>

          <div class="accordion-item">
            <h3 class="accordion-header" id="<?= $headingId ?>">
              <button class="accordion-button <?= $index === 0 ? '' : 'collapsed' ?>" 
                      type="button" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#<?= $collapseId ?>" 
                      aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" 
                      aria-controls="<?= $collapseId ?>">
                
                <!-- حماية نص السؤال -->
                <?= e($item['question']) ?>

              </button>
            </h3>

            <div id="<?= $collapseId ?>" 
                 class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" 
                 aria-labelledby="<?= $headingId ?>" 
                 data-bs-parent="#accordionFAQ">

              <div class="accordion-body">
                <!-- حماية نص الإجابة مع السماح بكسر الأسطر (New Lines) -->
                <?= nl2br(e($item['answer'])) ?>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-center"><?= e($_SESSION['lang'] == 'en' ? 'No FAQs available.' : 'لا توجد أسئلة شائعة متوفرة حالياً.') ?></p>
      <?php endif; ?>

    </div>
  </div>
</section>