<?php
// جلب البيانات الأساسية
$about_data = content('about');

// استخراج المصفوفات اللازمة للأقسام
$about_main = $about_data['about_main'] ?? [];
$counters   = $about_data['counters']   ?? [];
$team       = $about_data['team']       ?? [];
$partners   = $about_data['partners']   ?? [];

// جلب الخدمات من بيانات الصفحة الرئيسية (إعادة استخدام البيانات)
$home_data = content('home');
$services = $home_data['services'] ?? [];

// --- عرض الأقسام بترتيب الصفحة النهائي ---

// 1. قسم من نحن (المعلومات والصور)
include "pages/includes/sections-about/about-info.php"; 

// 2. قسم الخدمات (المشترك مع الرئيسية)
include "pages/includes/sections-home/services.php"; 

// 3. قسم فريق العمل (السلايدر)
include "pages/includes/sections-about/team.php"; 

// 4. قسم الإحصائيات (الأرقام)
include "pages/includes/sections-about/about-counts.php"; 


// 5. قسم الشركاء (الشعارات)
include "pages/includes/sections-about/partners.php"; 
?>