<?php
/**
 * View Only - 404 Page
 * هذا الملف مسؤول فقط عن العرض بدون أي منطق بيانات
 */

http_response_code(404);

// البيانات تأتي من ErrorController
$page_content = $page_content ?? [];
?>

<section class="error-404-section">
  <div class="container-fluid">

    <div class="error-number-wrap">
      <div class="error-digits">

        <span>4</span>

        <div class="astronaut-wrap">
          <div class="float-anim">

            <!-- SVG كما هو بدون أي تعديل -->
            <svg class="astronaut-svg" viewBox="0 0 120 160" fill="none" xmlns="http://www.w3.org/2000/svg">
              <!-- ضع SVG الخاص بك هنا كما هو -->
            </svg>

          </div>
        </div>

        <span>4</span>

      </div>
    </div>

    <h1 class="error-404-title">
      <?= e($page_content['title'] ?? 'الصفحة غير متوفرة!') ?>
    </h1>

    <p class="error-404-desc">
      <?= e($page_content['desc'] ?? 'عذراً، الرابط الذي تحاول الوصول إليه غير موجود أو تم نقله.') ?>
    </p>

    <a href="<?= BASE_URL ?>" class="btn-go-home">
      <?= e($page_content['back_btn'] ?? 'العودة الى الرئيسية') ?>
    </a>

  </div>
</section>