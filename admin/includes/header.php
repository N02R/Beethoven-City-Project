<?php
/**
 * Admin Header - Beethoven CMS Studio
 */

if (!defined('CMS_ADMIN')) {
    define('CMS_ADMIN', true);
}

$lang = $_SESSION['lang'] ?? 'ar';
$admin_name = $_SESSION['admin_name'] ?? 'Admin';
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= $lang === 'en' ? 'ltr' : 'rtl' ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCS Admin Panel</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">

    <!-- Main Site Styles (optional) -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

    <!-- 🟦 Admin Design System (IMPORTANT) -->
    <link rel="stylesheet" href="<?= BASE_URL ?>admin/assets/css/design-system.css">

    <!-- Admin Layout Styles (optional future) -->
    <link rel="stylesheet" href="<?= BASE_URL ?>admin/assets/css/layout.css">

</head>

<body class="admin-body">

<!-- 🟦 TOP BAR -->
<div style="background:#1e63ff;color:white;padding:10px 20px;display:flex;justify-content:space-between;align-items:center;">

    <div>
        <strong>BCS Studio</strong>
    </div>

    <div>
        Welcome, <?= htmlspecialchars($admin_name) ?>

        <a href="<?= BASE_URL ?>admin/auth/logout.php"
           style="color:white;margin-left:15px;text-decoration:underline;">
            Logout
        </a>
    </div>

</div>