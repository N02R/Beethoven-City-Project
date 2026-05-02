<?php
// 1. جلب البيانات من ملف الـ Job
$job_data = content('job');

// 2. توزيع البيانات مع التأكد من مطابقة الأسماء للملفات الفرعية
$job_hero         = $job_data['hero'] ?? [];
$why_germany      = $job_data['why_job'] ?? []; // ربط محتوى الوظائف بملف العرض الموحد
$programs         = $job_data['programs'] ?? [];
$timeline         = $job_data['timeline'] ?? [];
$offered_services = $job_data['offered_services'] ?? [];

// 3. استدعاء السيكشنز بالترتيب (مع فحص الوجود لضمان نظافة الصفحة)

if (!empty($job_hero)) {
    include "pages/includes/sections-job/job-hero.php";
}

if (!empty($why_germany)) {
    include "pages/includes/sections-education/why-germany.php";
}

if (!empty($programs)) {
    include "pages/includes/sections-job/programs.php";
}

if (!empty($timeline)) {
    include "pages/includes/sections-education/timeline.php";
}

if (!empty($offered_services)) {
    include "pages/includes/sections-education/offered-services.php";
}
?>