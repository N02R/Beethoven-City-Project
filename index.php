<?php

header('Content-Type: text/html; charset=utf-8');

require_once __DIR__ . "/includes/bootstrap.php";

/**
 * 1. تحديد الصفحة من الرابط
 */
$page = $_GET['page'] ?? 'home';
$page = trim($page);
$page = basename($page);

/**
 * 2. البيانات المشتركة
 */
$nav = content('navbar');
$footer_data = content('footer');

/**
 * 3. المجلدات المسموحة
 */
$allowed_folders = [
    "pages",
    "edu-services",
    "job-services",
    "guides"
];

$filePath = null;

/**
 * 4. أسماء محظورة
 */
$forbidden_names = [
    'config',
    'bootstrap',
    'layout',
    'db_connect',
    'header',
    'footer'
];

/**
 * 5. البحث عن الصفحة داخل الملفات
 */
if (!in_array($page, $forbidden_names)) {

    foreach ($allowed_folders as $folder) {

        $path1 = __DIR__ . "/$folder/$page.php";
        $path2 = __DIR__ . "/$folder/$page/index.php";

        if (is_file($path1)) {
            $filePath = $path1;
            break;
        }

        if (is_file($path2)) {
            $filePath = $path2;
            break;
        }
    }
}

/**
 * 6. صفحة 404
 */
if (!$filePath) {
    $page = '404';
    $filePath = __DIR__ . "/pages/404.php";
    http_response_code(404);
}

/**
 * 7. إعدادات الصفحة
 */
$config = require __DIR__ . "/config.php";
$page_config = $config['pages'][$page] ?? $config['pages']['404'];
$page_content = content($page);

// 🔥 جلب Hero من قاعدة البيانات
$hero = null;

if ($page === 'home') {

    $stmt = $conn->prepare("SELECT * FROM pages WHERE slug = ? AND lang = ?");
    $slug = 'home_hero';
    $lang = $_SESSION['lang'] ?? 'ar';

    $stmt->bind_param("ss", $slug, $lang);
    $stmt->execute();

    $result = $stmt->get_result();
    $hero = $result->fetch_assoc();
}

/**
 * ============================
 * 🔥 8. DATABASE LAYER (HOME فقط)
 * ============================
 */

$dbPage = null;

if ($page === 'home') {

    $conn = new mysqli("127.0.0.1", "root", "", "cms_dev");
    $conn->set_charset("utf8mb4");

    $stmt = $conn->prepare("SELECT title, content FROM pages WHERE slug = ? AND lang = ?");
    $lang = $_SESSION['lang'] ?? 'ar';

    $stmt->bind_param("ss", $page, $lang);
    $stmt->execute();

    $result = $stmt->get_result();
    $dbPage = $result->fetch_assoc();
}

/**
 * 9. Render المحتوى
 */
ob_start();
include $filePath;
$content = ob_get_clean();

/**
 * ============================
 * 🔥 10. دمج DB مع النظام
 * ============================
 */

if ($dbPage) {
    // إذا الصفحة موجودة في قاعدة البيانات
    $content = $dbPage['content'];

    // تحديث العنوان (اختياري)
    $page_config['title'][$_SESSION['lang'] ?? 'ar'] = $dbPage['title'];
}

/**
 * 11. layout
 */
include __DIR__ . "/includes/layout.php";