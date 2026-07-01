<?php

// تحديد ترميز الصفحة (حل مشكلة العربية)
header('Content-Type: text/html; charset=utf-8');

/**
 * المحرك الرئيسي للموقع - index.php
 * نظام التوجيه الذكي وفحص المسارات - Beethoven City Website
 */

// 1. تضمين ملف الإعدادات والدوال الأساسية
require_once __DIR__ . "/includes/bootstrap.php";

// 2. تحديد الصفحة المطلوبة وتنظيف الرابط
$page = $_GET['page'] ?? 'home';
$page = basename($page); // حماية ضد Path Traversal

// 3. جلب البيانات المشتركة (Navbar & Footer)
$nav = content('navbar');
$footer_data = content('footer');

// 4. المجلدات المسموح بها للصفحات
$allowed_folders = [
    "pages",
    "edu-services",
    "job-services",
    "guides"
];

$filePath = null;

// 5. منع أسماء حساسة
$forbidden_names = [
    'config',
    'bootstrap',
    'layout',
    'db_connect',
    'header',
    'footer'
];

// البحث عن الصفحة داخل المجلدات
if (!in_array($page, $forbidden_names)) {
    foreach ($allowed_folders as $folder) {
        $tempPath = $folder . "/" . $page . ".php";

        if (file_exists($tempPath)) {
            $filePath = $tempPath;
            break;
        }
    }
}

// 6. صفحة 404 إذا لم يتم العثور على الصفحة
if (!$filePath) {
    $page = '404';
    $filePath = "pages/404.php";
    http_response_code(404);
}

// 7. تحميل إعدادات الصفحة
$config = require __DIR__ . "/config.php";
$page_config = $config['pages'][$page] ?? $config['pages']['404'];
$page_content = content($page);

// 8. تشغيل Output Buffering
ob_start();
include $filePath;
$content = ob_get_clean();

// 9. عرض القالب النهائي (Layout)
include __DIR__ . "/includes/layout.php";