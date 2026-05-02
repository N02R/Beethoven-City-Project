<?php
/**
 * صفحة الدليل الشامل (Guide Page)
 * تقوم بجلب المقالات والبيانات التعريفية وعرضها عبر السيكشن المخصص
 */

// 1. جلب البيانات من المجلد الخاص باللغة/المحتوى
$guide_data = content('guide');

// 2. تعريف المتغيرات التي يتوقعها ملف guide-main.php
$hero     = $guide_data['hero'] ?? [];
$articles = $guide_data['articles'] ?? [];

// 3. استدعاء السيكشن (View)
// يفضل دائماً التأكد من وجود بيانات قبل الاستدعاء لضمان نظافة المخرجات
if (!empty($articles) || !empty($hero)) {
    include "pages/includes/sections-guide/guide-main.php";
} else {
    // اختياري: يمكنك وضع رسالة "لا توجد مقالات حالياً" هنا
    echo '<div class="container py-5 text-center"><p>لا توجد مقالات متوفرة حالياً.</p></div>';
}
?>