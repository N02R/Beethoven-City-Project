<?php

header('Content-Type: text/html; charset=utf-8');

require_once __DIR__ . "/includes/bootstrap.php";

/**
 * ============================
 * 0. DB Connection
 * ============================
 */
$conn = new mysqli("127.0.0.1", "root", "", "cms_dev");
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

/**
 * 1. تحديد الصفحة
 */
$page = $_GET['page'] ?? 'home';
$page = trim($page);
$page = basename($page);

/**
 * 2. بيانات مشتركة (File system)
 */
$nav = content('navbar');
$footer_data = content('footer');

/**
 * 3. البحث عن ملفات الصفحة
 */
$allowed_folders = ["pages", "edu-services", "job-services", "guides"];

$filePath = null;

$forbidden_names = [
    'config','bootstrap','layout','db_connect','header','footer'
];

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
 * 4. 404
 */
if (!$filePath) {
    $page = '404';
    $filePath = __DIR__ . "/pages/404.php";
    http_response_code(404);
}

/**
 * 5. Config
 */
$config = require __DIR__ . "/config.php";
$page_config = $config['pages'][$page] ?? $config['pages']['404'];
$page_content = content($page);

/**
 * ============================
 * 6. HERO (DB فقط للـ home)
 * ============================
 */
$hero_db = null;

if ($page === 'home') {

    $slug = 'home_hero';
    $lang = $_SESSION['lang'] ?? 'ar';

    $stmt = $conn->prepare("
        SELECT * FROM pages 
        WHERE slug = ? AND lang = ?
    ");

    $stmt->bind_param("ss", $slug, $lang);
    $stmt->execute();

    $result = $stmt->get_result();
    $hero_db = $result->fetch_assoc();
}

/**
 * 7. Render file-based page
 */
ob_start();
include $filePath;
$content = ob_get_clean();

/**
 * ============================
 * 8. Layout
 * ============================
 */
include __DIR__ . "/includes/layout.php";