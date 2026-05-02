<?php
/**
 * صفحة المحتوى المحمي - BCS-bachelor.php
 */

if (empty($page_content)) {
    $page_content = content('BCS-bachelor');
}

// 1. المسار
include "includes/sections-arrival/breadcrumb.php";

// 2. مكون الحماية بكلمة المرور
include "includes/sections-arrival/password-protected.php";
?>