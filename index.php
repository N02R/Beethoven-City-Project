<?php
/**
 * المحرك الرئيسي للموقع - index.php
 * نظام التوجيه الذكي وفحص المسارات - Beethoven City Website
 */

// 1. تضمين ملف الإعدادات والدوال الأساسية
require_once "includes/bootstrap.php";

// 2. تحديد الصفحة المطلوبة وتنظيف الرابط من أي إضافات ضارة
$page = $_GET['page'] ?? 'home';
$page = basename($page); // حماية ضد محاولات الوصول للمجلدات العليا (Path Traversal)

// 3. جلب نصوص اللغة المشتركة (Navbar & Footer)
// يتم استدعاؤها مرة واحدة هنا لتكون متاحة في الـ Layout لاحقاً
$nav = content('navbar'); 
$footer_data = content('footer'); 

// 4. نظام التوجيه الذكي (Routing) - فحص وجود الملف في المجلدات المسموحة
// قمنا بترتيب المجلدات لتبدأ بالأكثر استخداماً لتسريع الأداء
$allowed_folders = [
    "pages",          // الصفحات التعريفية (home, about, 404)
    "edu-services",   // الخدمات التعليمية
    "job-services",   // الخدمات المهنية
    "guides"          // الأدلة الإرشادية
];

$filePath = null;

// فحص أمني إضافي: منع طلب ملفات النظام الحساسة عبر الرابط
$forbidden_names = ['config', 'bootstrap', 'layout', 'db_connect', 'header', 'footer'];

if (!in_array($page, $forbidden_names)) {
    foreach ($allowed_folders as $folder) {
        $tempPath = "$folder/$page.php";
        if (file_exists($tempPath)) {
            $filePath = $tempPath;
            break; // توقف فور إيجاد الملف
        }
    }
}

// 5. في حال لم يتم العثور على الصفحة (معالجة الخطأ 404)
if (!$filePath) {
    $page = '404';
    $filePath = "pages/404.php";
    http_response_code(404); // إرسال حالة HTTP 404 للمتصفح ومحركات البحث
}

// 6. جلب إعدادات الصفحة ونصوصها المترجمة
// الآن نحن متأكدون أن $page إما صفحة موجودة أو أصبحت 404
$config = require "config.php";
$page_config = $config['pages'][$page] ?? $config['pages']['404'];
$page_content = content($page); 

// 7. تشغيل محرك معالجة المحتوى (Output Buffering)
ob_start();
// استدعاء الملف الذي تم إيجاده ليتم حقنه داخل متغير $content
include $filePath; 
$content = ob_get_clean();

// 8. دمج كل المكونات داخل القالب العام (Layout)
// الـ Layout هو الذي يحتوي على <html> و <head> ويقوم بطباعة $content
include "includes/layout.php";

