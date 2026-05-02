<?php
/** 
 * @var array $footer_data
 * @var array $nav
 */
?>

<!-- قسم طلب الاستشارة (Consultation Banner) -->
<section class="consult-banner-section" aria-label="<?= e($footer_data['consult_title']) ?>">
    <div class="container-fluid custom-container">
        <div class="consult-banner">
            <div class="consult-banner-inner">
                <div class="consult-banner-text">
                    <h2><?= e($footer_data['consult_title']) ?></h2>
                    <p><?= e($footer_data['consult_desc']) ?></p>
                </div>
                
                <div class="form-container" style="flex: 1; max-width: 600px;">
                    <!-- رسائل التغذية الراجعة (Form Feedback) -->
                    <?php if (isset($_SESSION['form_status'])): ?>
                        <div class="form-feedback mb-2">
                            <?php 
                                $isSuccess = $_SESSION['form_status'] == 'success';
                                $bg = $isSuccess ? '#28a745' : '#dc3545';
                                $msg = $isSuccess 
                                    ? ($_SESSION['lang'] == 'ar' ? 'تم استلام طلبك بنجاح، سنتواصل معك قريباً.' : 'Your request has been received, we will contact you soon.')
                                    : ($_SESSION['lang'] == 'ar' ? 'عذراً، البريد الإلكتروني غير صحيح.' : 'Sorry, the email address is invalid.');
                            ?>
                            <p style="color: #fff; background: <?= $bg ?>; padding: 12px; border-radius: 10px; font-size: 14px; margin-bottom: 10px;">
                                <?= $isSuccess ? '✓' : '⚠' ?> <?= $msg ?>
                            </p>
                            <?php unset($_SESSION['form_status']); ?>
                        </div>
                    <?php endif; ?>

                    <form class="consult-banner-form" action="<?= BASE_URL ?>php/send_consult.php" method="POST">
                        <input type="email" name="email" id="consult-email" 
                               placeholder="<?= e($footer_data['consult_placeholder']) ?>" required>
                        <button type="submit" aria-label="Send">
                            <img src="<?= BASE_URL ?>assets/img/home/send-2.svg" 
                                 class="<?= ($_SESSION['lang'] == 'en') ? 'mirror-on-en' : '' ?>" 
                                 alt="" aria-hidden="true">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- تذييل الصفحة الرئيسي (Main Footer) -->
<footer class="footer-section pt-5" aria-label="Footer">
    <div class="container-fluid custom-container">
        <div class="row gy-5">
            <!-- معلومات الشركة -->
            <div class="col-12 col-lg-5">
                <a href="<?= BASE_URL ?>home">
                    <img src="<?= BASE_URL ?>assets/img/logo.png" alt="Beethoven City Services Logo" 
                         class="mb-4" width="178" height="72" loading="lazy">
                </a>
                <p class="footer-desc"><?= e($footer_data['description']) ?></p>
            </div>

            <!-- روابط سريعة -->
            <div class="col-12 col-md-6 col-lg-3">
                <h3 class="footer-title"><?= e($footer_data['quick_links']) ?></h3>
                <nav class="quick-link">
                    <a href="<?= BASE_URL ?>about"><?= e($nav['about']) ?></a>
                    <a href="<?= BASE_URL ?>education"><?= e($nav['education']) ?></a>
                    <a href="<?= BASE_URL ?>job"><?= e($nav['job']) ?></a>
                    <a href="<?= BASE_URL ?>guide"><?= e($nav['guide']) ?></a>
                    <a href="<?= BASE_URL ?>contact"><?= e($nav['contact']) ?></a>
                </nav>
            </div>

            <!-- معلومات التواصل -->
            <div class="col-12 col-md-6 col-lg-4">
                <h3 class="footer-title"><?= e($footer_data['contact_us']) ?></h3>
                <div class="contact-link">
                    <a href="tel:+4917671230666">
                        <img src="<?= BASE_URL ?>assets/img/contact/call-calling.svg" alt="" width="20" height="20">
                        +49 (0) 176 71230 666
                    </a>
                    <a href="mailto:info@Beethoven-City-Services.com">
                        <img src="<?= BASE_URL ?>assets/img/contact/sms.svg" alt="" width="20" height="20">
                        info@Beethoven-City-Services.com
                    </a>
                    <div class="contact-link-item d-flex align-items-start gap-2">
                        <img src="<?= BASE_URL ?>assets/img/contact/Location.svg" alt="" width="20" height="20" class="mt-1">
                        <address style="font-size: 13px; color: #4F4F4F; font-style: normal; margin-bottom: 0; line-height: 1.6;">
                            Rheinweg 140, 53129 Bonn, Germany
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <!-- حقوق النشر والخصوصية -->
        <div class="foot-bottom d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 pb-4">
            <p class="mb-0 text-muted" style="font-size: 14px;">
                <span>&copy;</span> <?= date('Y'); ?> <?= e($footer_data['rights']) ?> | Beethoven City Services
            </p>
            <a href="<?= BASE_URL ?>privacy" class="text-decoration-none" style="font-size: 14px;">
                <?= e($footer_data['privacy_policy']) ?>
            </a>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="<?= BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/swiper-bundle.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/main.js"></script>

<script>
    // تهيئة Swiper مع تحسينات الأداء والاتجاه
    document.addEventListener('DOMContentLoaded', function() {
        if (document.querySelector(".mySwiper")) {
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 20,
                rtl: <?= ($_SESSION['lang'] == 'ar') ? 'true' : 'false' ?>, 
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    576: { slidesPerView: 2 },
                    992: { slidesPerView: 3 },
                    1400: { slidesPerView: 4 }
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                }
            });
        }
    });
</script>
</body>
</html>