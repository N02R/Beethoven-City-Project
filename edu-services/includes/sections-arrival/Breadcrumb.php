<div class="custom-container pt-5">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-start">
      
      <!-- رابط الرئيسية: التأكد من وجود النص أو وضع كلمة افتراضية -->
      <li class="breadcrumb-item">
          <a href="<?= BASE_URL ?>home"><?= $page_content['breadcrumb']['home'] ?? 'الرئيسية' ?></a>
      </li>

      <!-- القسم الأوسط: نتحقق من وجوده وأنه ليس فارغاً -->
      <?php if (!empty($page_content['breadcrumb']['parent'])): ?>
      <li class="breadcrumb-item">
          <a href="#"><?= $page_content['breadcrumb']['parent'] ?></a>
      </li>
      <?php endif; ?>

      <!-- الصفحة الحالية: نضع قيمة فارغة كخيار بديل لتجنب الخطأ -->
      <li class="breadcrumb-item active" aria-current="page">
          <?= $page_content['breadcrumb']['current'] ?? '' ?>
      </li>

    </ol>
  </nav>
</div>