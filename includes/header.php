<?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']): ?>
    <div id="cms-status" style="position:fixed;top:10px;right:10px;background:#000;color:#fff;padding:5px 10px;z-index:99999;">
        ADMIN MODE
    </div>
<?php endif; ?>
<?php 
/** 
 * @var array $config 
 * @var string $page 
 * @var array $page_config 
 */

if (!defined('BASE_URL')) { exit('No direct script access allowed'); }

// اللغة الحالية
$lang = $_SESSION['lang'] ?? 'ar'; 
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= ($lang == 'en') ? 'ltr' : 'rtl' ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- العناوين مع حماية XSS -->
    <title>
        <?= e(($page_config['title'][$lang] ?? $config['default_title'][$lang])) . " | " . e($config['site_name']); ?>
    </title>

    <meta name="description" 
          content="<?= e($page_config['description'][$lang] ?? $config['default_description'][$lang]); ?>">

    <!-- روابط اللغة للـ SEO -->
    <link rel="alternate" hreflang="ar" href="<?= BASE_URL . $page ?>/ar" />
    <link rel="alternate" hreflang="en" href="<?= BASE_URL . $page ?>/en" />
    <link rel="alternate" hreflang="x-default" href="<?= BASE_URL . $page ?>/ar" />

    <!-- ملفات الـ CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/header.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/footer.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/responsive-index.css">

    <?php if (isset($page_config['css']) && is_array($page_config['css'])): ?>
        <?php foreach ($page_config['css'] as $css_file): ?>
            <?php if (!empty($css_file)): ?>
                <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/<?= e($css_file) ?>">
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($lang == 'en'): ?>
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style-ltr.css">
    <?php endif; ?>

    <?php if ($page === '404'): ?>
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/error.css">
    <?php endif; ?>

</head>

<body class="lang-<?= e($lang) ?> <?= IS_ADMIN ? 'is-admin' : '' ?>">

<!-- 🧠 Visual CMS BAR (Admin only) -->
<?php include __DIR__ . '/editor-bar.php'; ?>

<!-- Loader -->
<div id="loader-wrapper" role="status" aria-live="polite">
    <div class="loader"></div>
</div>

<?php if ($_SESSION['admin_logged_in'] ?? false): ?>
<button id="toggleEdit"
        style="position:fixed;bottom:20px;left:20px;z-index:99999;">
    Toggle Edit Mode
</button>
<?php endif; ?>