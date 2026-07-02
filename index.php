<?php

header('Content-Type: text/html; charset=utf-8');

require_once __DIR__ . "/includes/bootstrap.php";
require_once __DIR__ . "/app/Services/HomeService.php";

/**
 * ============================
 * DB CONNECTION
 * ============================
 */
$conn = new mysqli("127.0.0.1", "root", "", "cms_dev");
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

/**
 * ============================
 * PAGE
 * ============================
 */
$page = $_GET['page'] ?? 'home';
$page = basename(trim($page));

/**
 * ============================
 * COMMON DATA
 * ============================
 */
$nav = content('navbar');
$footer_data = content('footer');

$config = require __DIR__ . "/config.php";
$page_config = $config['pages'][$page] ?? $config['pages']['404'];

/**
 * ============================
 * HOME DATA
 * ============================
 */
$hero = [];
$services = [];
$choose = [];
$reviews = [];
$guide = [];

if ($page === 'home') {

    $lang = $_SESSION['lang'] ?? 'ar';

    $hero     = HomeService::getHero($conn, $lang);
    $services = HomeService::getServices($conn, $lang);
    $choose   = HomeService::getChoose($conn, $lang);
    $reviews  = HomeService::getReviews($conn, $lang);
    $guide    = HomeService::getGuide($conn, $lang);
}

/**
 * ============================
 * LOAD PAGE FILE
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
 * RENDER
 * ============================
 */
ob_start();
include $filePath;
$content = ob_get_clean();

include __DIR__ . "/includes/layout.php";