<?php
/**
 * Hero Section - Home Page
 */

if (!isset($hero)) {
    $hero = [];
}
?>

<section class="hero py-5">

  <div class="custom-container">

    <div class="hero-container">

      <!-- 🟢 TEXT CONTENT -->
      <div class="hero-content">

        <h1 class="<?= IS_ADMIN ? 'editable' : '' ?>" data-field="title_text">
            <?= e($hero['title_text'] ?? 'مرحباً بك في موقعنا') ?>
        </h1>

        <p class="<?= IS_ADMIN ? 'editable' : '' ?>" data-field="description">
            <?= e($hero['description'] ?? 'نقدم أفضل الخدمات التعليمية والاحترافية') ?>
        </p>

        <a href="<?= e($hero['button_link'] ?? '#') ?>" 
           class="btn btn-primary <?= IS_ADMIN ? 'editable' : '' ?>" 
           data-field="button_text">

            <?= e($hero['button_text'] ?? 'ابدأ الآن') ?>

        </a>

      </div>

      <!-- 🟢 IMAGE -->
      <div class="hero-image">

        <?php if (!empty($hero['image'])): ?>
            
            <img src="<?= BASE_URL . 'assets/img/' . e($hero['image']) ?>" 
                 class="img-fluid" 
                 alt="<?= e($hero['alt_text'] ?? 'hero image') ?>">

        <?php else: ?>

            <img src="<?= BASE_URL . 'assets/img/default-hero.png' ?>" 
                 class="img-fluid" 
                 alt="hero">

        <?php endif; ?>

      </div>

    </div>

  </div>

</section>

<?php if (IS_ADMIN): ?>
<!-- 🟢 INLINE EDIT SCRIPT (Stage 1 فقط: Live Edit بدون حفظ) -->
<script>

document.querySelectorAll('.editable').forEach(el => {

    el.addEventListener('click', function () {
        this.setAttribute('contenteditable', 'true');
        this.focus();
    });

    el.addEventListener('blur', function () {
        this.removeAttribute('contenteditable');

        console.log("Edited:", {
            field: this.dataset.field,
            value: this.innerText.trim()
        });
    });

});

</script>
<?php endif; ?>