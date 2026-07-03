<?php
/**
 * نظام التهيئة الأساسي - bootstrap.php
 * إدارة الجلسات، اللغات، والأمان - Beethoven City Website
 */

// 1. بدء الجلسة بأمان
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. تعريف الثوابت الأساسية (تعديل المسار حسب بيئتك)
define('BASE_URL', '/');
define('CONTENT_PATH', realpath(__DIR__ . '/../content')); 

// 3. دالة الأمان العالمية (XSS Protection)
if (!function_exists('e')) {
    function e($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}

// 4. منطق إدارة اللغة
if (isset($_GET['lang'])) {
    $selected_lang = $_GET['lang'];
    $allowed_langs = ['ar', 'en'];

    if (in_array($selected_lang, $allowed_langs)) {
        $_SESSION['lang'] = $selected_lang;
    }
}

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'ar';
}

$current_lang = $_SESSION['lang'];

// 5. دالة جلب المحتوى المترجم
function content($page) {
    global $current_lang;

    static $loaded_content = [];

    if (isset($loaded_content[$page])) {
        return $loaded_content[$page];
    }

    $file = CONTENT_PATH . DIRECTORY_SEPARATOR . $current_lang . DIRECTORY_SEPARATOR . $page . '.php';

    if (file_exists($file)) {
        $loaded_content[$page] = require $file;
        return $loaded_content[$page];
    }

    $fallback = CONTENT_PATH . DIRECTORY_SEPARATOR . 'ar' . DIRECTORY_SEPARATOR . $page . '.php';
    if (file_exists($fallback)) {
        $loaded_content[$page] = require $fallback;
        return $loaded_content[$page];
    }

    return []; 
}

// 6. URL helper
function url($path = '') {
    return BASE_URL . ltrim($path, '/');
}

/**
 * =========================
 * ADMIN CHECK (VISUAL CMS CORE)
 * =========================
 */

define('IS_ADMIN',
    isset($_SESSION['admin_logged_in']) &&
    $_SESSION['admin_logged_in'] === true
);

