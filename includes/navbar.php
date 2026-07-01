<?php
/**
 * @var string $page
 * @var array $nav
 */

$current_page = $page ?? 'home';
?>

<header>

    <!-- الشريط العلوي -->
    <nav class="nav-top navbar py-2" aria-label="روابط التواصل الاجتماعي">
        <div class="container-fluid custom-container d-flex align-items-center justify-content-between">

            <a class="navbar-brand d-none d-lg-flex" href="<?= BASE_URL ?>home">
                <img src="<?= BASE_URL ?>assets/img/logo.png" alt="Beethoven City Services Logo" width="178" height="72">
            </a>

            <div class="social-icons d-none d-lg-flex gap-3">
                <a href="https://www.facebook.com/BeethovenCityService" target="_blank" rel="noopener noreferrer">
                    <img src="<?= BASE_URL ?>assets/img/socialicons/Facebook.png" alt="Facebook">
                </a>
                <a href="https://www.instagram.com/beethoven_city_service" target="_blank" rel="noopener noreferrer">
                    <img src="<?= BASE_URL ?>assets/img/socialicons/Instagram.png" alt="Instagram">
                </a>
                <a href="https://wa.me/4917671230666" target="_blank" rel="noopener noreferrer">
                    <img src="<?= BASE_URL ?>assets/img/socialicons/whatsapp.png" alt="Whatsapp">
                </a>
                <a href="https://youtube.com/@learning_german_language" target="_blank" rel="noopener noreferrer">
                    <img src="<?= BASE_URL ?>assets/img/socialicons/youtube.png" alt="Youtube">
                </a>
            </div>

        </div>
    </nav>

    <!-- القائمة الرئيسية -->
    <nav id="main-header" class="navbar navbar-expand-lg py-3" aria-label="القائمة الرئيسية">
        <div class="container-fluid custom-container d-flex align-items-center justify-content-between">

            <a class="navbar-brand d-lg-none" href="<?= BASE_URL ?>home">
                <img src="<?= BASE_URL ?>assets/img/logo.png" alt="Logo" width="120" height="49">
            </a>

            <a class="navbar-brand logo-scroll" href="<?= BASE_URL ?>home">
                <img src="<?= BASE_URL ?>assets/img/logo.png" alt="Logo" width="120" height="49">
            </a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav gap-3">

                    <?php
                    $menu_items = [
                        'home'      => $nav['home'] ?? 'الرئيسية',
                        'about'     => $nav['about'] ?? 'عن الشركة',
                        'education' => $nav['education'] ?? 'التعليم العالي',
                        'job'       => $nav['job'] ?? 'التدريب المهني',
                        'guide'     => $nav['guide'] ?? 'دليل بيتهوفن',
                        'contact'   => $nav['contact'] ?? 'تواصل معنا'
                    ];

                    foreach ($menu_items as $key => $label):
                        $isActive = ($current_page === $key) ? 'active' : '';
                    ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $isActive ?>"
                               href="<?= BASE_URL . $key ?>">
                                <?= e($label) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>

            <!-- زر الموبايل -->
            <button class="navbar-toggler d-lg-none" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- اللغة -->
            <div class="dropdown">
                <button class="btn lang-switch d-flex align-items-center gap-2"
                        type="button" data-bs-toggle="dropdown">

                    <img src="<?= BASE_URL ?>assets/img/home/global.svg" width="20" height="20">

                    <span>
                        <?= ($_SESSION['lang'] == 'en') ? 'English' : 'العربية' ?>
                    </span>

                    <img src="<?= BASE_URL ?>assets/img/home/arowwdown.svg" width="16" height="16">
                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <a class="dropdown-item <?= ($_SESSION['lang'] == 'ar') ? 'active' : '' ?>"
                           href="?lang=ar">
                            العربية
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item <?= ($_SESSION['lang'] == 'en') ? 'active' : '' ?>"
                           href="?lang=en">
                            English
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title">
                <a href="<?= BASE_URL ?>home">
                    <img src="<?= BASE_URL ?>assets/img/logo.png" height="50">
                </a>
            </h5>

            <button type="button" class="btn-close"
                    data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">
            <ul class="navbar-nav">

                <?php foreach ($menu_items as $key => $label): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page === $key) ? 'active' : '' ?>"
                           href="<?= BASE_URL . $key ?>">
                            <?= e($label) ?>
                        </a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>

    </div>

</header>