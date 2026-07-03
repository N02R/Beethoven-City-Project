<section class="hero py-5">

  <div class="custom-container">

    <div class="hero-container">

      <div class="hero-content">

<h1 class="<?= IS_ADMIN ? 'editable' : '' ?>" data-field="title_text">
  <?= e($hero['title_text'] ?? '') ?>
</h1>

        <p class="<?= IS_ADMIN ? 'editable' : '' ?>" data-field="description">
  <?= e($hero['description'] ?? '') ?>
</p>

        <?php if (!empty($hero['button_text'])): ?>
          <a href="<?= e($hero['button_link'] ?? '#') ?>" 
             class="btn btn-primary hero-btn">
            <?= e($hero['button_text']) ?>
          </a>
        <?php endif; ?>

      </div>

      <?php if (!empty($hero['image'])): ?>

        <?php
          $heroImage = BASE_URL . 'assets/img/' . ltrim($hero['image'], '/');
        ?>

        <div class="hero-image">
          <img src="<?= e($heroImage) ?>"
               alt="<?= e($hero['title_text'] ?? 'hero image') ?>"
               class="img-fluid"
               loading="lazy">
        </div>

      <?php endif; ?>

    </div>

  </div>

</section>

<?php if (IS_ADMIN): ?>

<script>

document.querySelectorAll('.editable').forEach(el => {

    el.addEventListener('click', function () {

        this.setAttribute('contenteditable', 'true');
        this.focus();

    });

    el.addEventListener('blur', function () {

        this.removeAttribute('contenteditable');

        console.log("Updated field:", this.dataset.field);
        console.log("Value:", this.innerText);

    });

});

</script>

<?php endif; ?>