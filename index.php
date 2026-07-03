<?php

header('Content-Type: text/html; charset=utf-8');

require_once __DIR__ . "/includes/bootstrap.php";

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
 * ROUTING
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

$lang = $_SESSION['lang'] ?? 'ar';

/**
 * ============================
 * LOAD CONTROLLER
 * ============================
 */
$pageData = [];

if ($page === 'home') {

    require_once __DIR__ . "/app/Controllers/HomeController.php";

    $pageData = HomeController::index($conn, $lang);
}

/**
 * ============================
 * LOAD VIEW
 * ============================
 */
$filePath = __DIR__ . "/pages/{$page}.php";

if (!file_exists($filePath)) {
    $filePath = __DIR__ . "/pages/404.php";
    http_response_code(404);
}

ob_start();
include $filePath;
$content = ob_get_clean();

include __DIR__ . "/includes/layout.php";