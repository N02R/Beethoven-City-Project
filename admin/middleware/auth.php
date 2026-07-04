<?php

/**
 * Beethoven CMS Studio
 * Authentication Middleware
 */

require_once __DIR__ . '/../includes/bootstrap.php';

// إذا لم يكن المدير مسجل دخول
if (empty($_SESSION['admin_logged_in'])) {

    header("Location: ../auth/login.php");
    exit;
}