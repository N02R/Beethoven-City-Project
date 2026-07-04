<?php

/**
 * Beethoven CMS Studio
 * Admin Bootstrap
 */

// منع الوصول المباشر إذا احتجنا لاحقًا
defined('CMS_ADMIN') or define('CMS_ADMIN', true);

// بدء الجلسة
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// استدعاء إعدادات المشروع
require_once dirname(__DIR__, 2) . '/config.php';