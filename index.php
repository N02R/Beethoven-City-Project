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
var_dump($page);
var_dump(__DIR__ . "/pages/{$page}.php");
/**
 * ============================
 * GLOBAL CONTENT
 * ============================
 */
require_once __DIR__ . "/app/Services/GlobalService.php";

$globalData = GlobalService::getGlobalData(strtolower($page));
extract($globalData);

/**
 * ============================
 * CONTROLLER LOADER (AUTO)
 * ============================
 */
$lang = $_SESSION['lang'] ?? 'ar';

$controllerClass = $page . 'Controller';
$controllerFile = __DIR__ . "/app/Controllers/{$controllerClass}.php";

$data = [];

if (file_exists($controllerFile)) {

    require_once $controllerFile;

    if (class_exists($controllerClass)) {
        $data = $controllerClass::index($conn, $lang);
    }

} else {

    http_response_code(404);

    require_once __DIR__ . "/app/Controllers/ErrorController.php";

    $data = ErrorController::index($conn, $lang);
}

/**
 * ============================
 * VIEW DATA
 * ============================
 */
extract($data);

/**
 * ============================
 * LOAD VIEW
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