<?php
// جلب بيانات التعليم من ملف البيانات (content function)
$edu_data = content('education');

// استخراج المصفوفات مع ضمان قيم افتراضية لمنع ظهور الـ Warnings
$edu_hero         = $edu_data['edu_hero'] ?? [];
$why_germany      = $edu_data['why_germany'] ?? [];
$timeline         = $edu_data['timeline'] ?? [];
$offered_services = $edu_data['offered_services'] ?? [];

// --- استدعاء الأقسام بالترتيب التشغيلي ---

// 1. القسم التعريفي العلوي
if (!empty($edu_hero)) {
    include "pages/includes/sections-education/edu-hero.php";
}

// 2. قسم "لماذا ألمانيا" (البطاقات)
if (!empty($why_germany)) {
    include "pages/includes/sections-education/why-germany.php";
}

// 3. قسم الخطوات الزمنية (المسار)
if (!empty($timeline)) {
    include "pages/includes/sections-education/timeline.php";
}

// 4. قسم الخدمات التعليمية المتاحة
if (!empty($offered_services)) {
    include "pages/includes/sections-education/offered-services.php";
}
?>