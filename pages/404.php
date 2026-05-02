<?php
/**
 * صفحة الخطأ 404 - يتم استدعاؤها عبر index.php
 */
http_response_code(404);

// جلب المحتوى الخاص بالخطأ من ملفات اللغة (إذا كان متوفراً)
$page_content = content('error_404') ?? [];
?>

<section class="error-404-section">
  <div class="container-fluid">

    <div class="error-number-wrap">
      <div class="error-digits">
        <span>4</span>

        <div class="astronaut-wrap">
          <div class="float-anim">
            <!-- الـ SVG الخاص برائد الفضاء رائع جداً كما هو -->
            <svg class="astronaut-svg" viewBox="0 0 120 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- ... محتوى الـ SVG ... -->
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

    <!-- التأكد من استخدام BASE_URL للرجوع للرئيسية -->
    <a href="<?= BASE_URL ?>" class="btn-go-home">
        <?= e($page_content['back_btn'] ?? 'العودة الى الرئيسية') ?>
    </a>

  </div>
</section>