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
define('BASE_URL', 'http://localhost/beethoven-city-website/');
define('CONTENT_PATH', realpath(__DIR__ . '/../content')); 

// 3. دالة الأمان العالمية (XSS Protection)
// نضعها هنا لتكون متاحة في كل صفحات الموقع (Header, Navbar, Content)
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
    
    // إذا كنتِ تريدين تنظيف الرابط بعد تغيير اللغة (اختياري)
    /*
    $params = $_GET;
    unset($params['lang']);
    $query = http_build_query($params);
    $url = strtok($_SERVER['REQUEST_URI'], '?') . ($query ? '?' . $query : '');
    header("Location: " . $url);
    exit;
    */
}

// تعيين اللغة الافتراضية إذا لم تكن موجودة
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'ar';
}

$current_lang = $_SESSION['lang'];

// 5. دالة جلب المحتوى المترجم (Optimized & Secure)
function content($page) {
    global $current_lang; // استخدام المتغير المعرف أعلاه
    
    // استخدام متغير static لحفظ البيانات في الذاكرة أثناء تشغيل الصفحة الواحدة
    static $loaded_content = [];

    if (isset($loaded_content[$page])) {
        return $loaded_content[$page];
    }

    // بناء المسار الآمن للملف
    $file = CONTENT_PATH . DIRECTORY_SEPARATOR . $current_lang . DIRECTORY_SEPARATOR . $page . '.php';

    if (file_exists($file)) {
        $loaded_content[$page] = require $file;
        return $loaded_content[$page];
    }
    
    // الاحتياط (Fallback) للغة العربية في حال عدم وجود ملف للغة الحالية
    $fallback = CONTENT_PATH . DIRECTORY_SEPARATOR . 'ar' . DIRECTORY_SEPARATOR . $page . '.php';
    if (file_exists($fallback)) {
        $loaded_content[$page] = require $fallback;
        return $loaded_content[$page];
    }

    return []; 
}

// 6. دوال مساعدة إضافية (اختياري - لتحسين الروابط)
function url($path = '') {
    return BASE_URL . ltrim($path, '/');
}