<?php
/**
 * الصفحة الرئيسية - home.php
 * تقوم بجلب البيانات وتوزيعها على السكاشن المختلفة
 */

// 1. جلب بيانات الصفحة بناءً على اللغة المفعلة
$data = content('home');

// 2. توزيع البيانات على متغيرات (مع التأكد من أنها مصفوفات)
$hero     = $data['hero'] ?? [];
$services = $data['services'] ?? [];
$choose   = $data['choose'] ?? [];
$reviews  = $data['reviews'] ?? [];
$guide    = $data['guide'] ?? [];
$faq      = $data['faq'] ?? [];

/**
 * 3. استدعاء السكاشن بالترتيب
 * ملاحظة أمنية: نستخدم include لضمان استمرار عمل الصفحة حتى لو فُقد سكشن معين
 */

// مسار المجلد الذي يحتوي على السكاشن (لتسهيل الكتابة)
$sectionsPath = "pages/includes/sections-home/";

include $sectionsPath . "hero.php"; 
include $sectionsPath . "services.php"; 
include $sectionsPath . "choose.php"; 
include $sectionsPath . "reviews.php"; 
include $sectionsPath . "guide-preview.php"; 
include $sectionsPath . "faq.php"; 
?>