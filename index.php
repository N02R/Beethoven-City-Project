<?php

header('Content-Type: text/html; charset=utf-8');

require_once __DIR__ . "/includes/bootstrap.php";
require_once __DIR__ . "/app/Services/HomeService.php";

/**
 * ============================
 * 0. اتصال قاعدة البيانات
 * ============================
 */
$conn = new mysqli("127.0.0.1", "root", "", "cms_dev");
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

/**
 * ============================
 * 1. تحديد الصفحة
 * ============================
 */
$page = $_GET['page'] ?? 'home';
$page = trim($page);
$page = basename($page);

/**
 * ============================
 * 2. بيانات مشتركة
 * ============================
 */
$nav = content('navbar');
$footer_data = content('footer');

/**
 * ============================
 * 3. إعداد config
 * ============================
 */
$config = require __DIR__ . "/config.php";
$page_config = $config['pages'][$page] ?? $config['pages']['404'];

/**
 * ============================
 * 4. بيانات الصفحة من DB (Home فقط)
 * ============================
 */
$hero = null;
$services = [];

if ($page === 'home') {

    $lang = $_SESSION['lang'] ?? 'ar';

    // Hero
    $hero = HomeService::getHero($conn, $lang);

    // Services
    $services = HomeService::getServices($conn, $lang);
}

/**
 * ============================
 * 5. تحديد ملف العرض
 * ============================
 */
$filePath = __DIR__ . "/pages/{$page}.php";

if (!file_exists($filePath)) {
    $filePath = __DIR__ . "/pages/404.php";
    http_response_code(404);
    $page = '404';
}

/**
 * ============================
 * 6. Render page
 * ============================
 */
ob_start();
include $filePath;
$content = ob_get_clean();

/**
 * ============================
 * 7. Layout
 * ============================
 */
include __DIR__ . "/includes/layout.php";