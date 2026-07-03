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
$page = strtolower(trim($page));

/**
 * ============================
 * GLOBAL DATA (NAV / FOOTER / ETC)
 * ============================
 */
require_once __DIR__ . "/app/Services/GlobalService.php";

$globalData = GlobalService::getGlobalData($page);

/**
 * ============================
 * CONTROLLER LOADER (AUTO MVC)
 * ============================
 */
$lang = $_SESSION['lang'] ?? 'ar';

$controllerClass = ucfirst($page) . 'Controller';
$controllerFile  = __DIR__ . "/app/Controllers/{$controllerClass}.php";

$data = [];

if (file_exists($controllerFile)) {

    require_once $controllerFile;

    if (class_exists($controllerClass)) {
        $data = $controllerClass::index($conn, $lang);
    }

} else {

    // fallback to error controller
    http_response_code(404);

    require_once __DIR__ . "/app/Controllers/ErrorController.php";

    if (class_exists('ErrorController')) {
        $data = ErrorController::index($conn, $lang);
    }
}

/**
 * ============================
 * MERGE DATA
 * ============================
 * global + page data
 */
$pageData = array_merge($globalData, $data);

/**
 * ============================
 * PASS DATA TO VIEW
 * ============================
 */
extract($pageData);

/**
 * ============================
 * LOAD VIEW FILE
 * ============================
 */
$filePath = __DIR__ . "/pages/{$page}.php";

if (!file_exists($filePath)) {

    http_response_code(404);

    $filePath = __DIR__ . "/pages/404.php";
    $page = '404';
}

/**
 * ============================
 * RENDER OUTPUT
 * ============================
 */
ob_start();
include $filePath;
$content = ob_get_clean();

include __DIR__ . "/includes/layout.php";