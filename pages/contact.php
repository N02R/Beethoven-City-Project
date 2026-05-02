<?php
// جلب البيانات
$contact_data = content('contact');

// استخراج المصفوفات مع قيم افتراضية
$hero       = $contact_data['hero'] ?? [];
$info_items = $contact_data['info_items'] ?? [];
$whatsapp   = $contact_data['whatsapp'] ?? [];

// --- عرض الأقسام بالترتيب ---

// 1. هيرو الصفحة
if (!empty($hero)) {
    include "pages/includes/sections-contact/contact-hero.php";
}

// 2. معلومات التواصل الأساسية
if (!empty($info_items)) {
    include "pages/includes/sections-contact/contact-info.php";
}

// 3. سكشن الواتساب السريع
if (!empty($whatsapp)) {
    include "pages/includes/sections-contact/whatsapp-contact.php";
}
?>