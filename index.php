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
 * HOME DATA (UNIFIED CONTRACT)
 * ============================
 */

$hero = [];
$servicesData = [];
$chooseData = [];
$reviewsData = [];
$guideData = [];

if ($page === 'home') {

    $lang = $_SESSION['lang'] ?? 'ar';

    // HERO
    $hero = HomeService::getHero($conn, $lang);

    // SERVICES
    $servicesData = [
        'title' => 'خدماتنا',
        'items' => HomeService::getServices($conn, $lang)
    ];

    // CHOOSE
    $chooseData = [
        'title' => 'ما الذي يميز بيتهوفن سيتي',
        'items' => HomeService::getChoose($conn, $lang)
    ];

    // REVIEWS
    $reviewsData = HomeService::getReviews($conn, $lang);

    // GUIDE
    $guideData = [
        'title' => 'دليل بيتهوفن',
        'items' => HomeService::getGuide($conn, $lang)
    ];
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