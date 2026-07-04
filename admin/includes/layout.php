<?php
/**
 * BCS Admin Layout System - SaaS Style
 */

if (!defined('CMS_ADMIN')) {
    define('CMS_ADMIN', true);
}

if (!isset($content)) {
    $content = '';
}

$lang = $_SESSION['lang'] ?? 'ar';
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= $lang === 'en' ? 'ltr' : 'rtl' ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCS Admin Panel</title>

    <!-- 🟦 Bootstrap -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- 🟦 Bootstrap Icons (IMPORTANT) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- 🟦 Design System -->
    <link rel="stylesheet" href="/admin/assets/css/design-system.css">

    <style>
        body {
            background: #f4f6fb;
        }

        .sidebar {
            width: 260px;
            background: #0f172a;
            min-height: 100vh;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #cbd5e1;
            text-decoration: none;
            padding: 10px 12px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #1e293b;
            color: #fff;
        }

        .sidebar h2 {
            color: #1e63ff;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .topbar {
            background: #fff;
            padding: 15px 20px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-box {
            margin-top: 20px;
        }
    </style>

</head>

<body>

<div class="d-flex">

    <!-- 🟦 SIDEBAR -->
    <aside class="sidebar">

        <h2>BCS CMS</h2>

        <a href="/admin/dashboard/index.php">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="#">
            <i class="bi bi-file-earmark-text"></i> Pages
        </a>

        <a href="#">
            <i class="bi bi-images"></i> Media
        </a>

        <a href="#">
            <i class="bi bi-people"></i> Users
        </a>

        <a href="#">
            <i class="bi bi-gear"></i> Settings
        </a>

    </aside>

    <!-- 🟦 MAIN -->
    <div class="flex-grow-1 p-4">

        <!-- TOPBAR -->
        <div class="topbar mb-3">

            <div>
                👋 Welcome Back
            </div>

            <a href="/admin/auth/logout.php" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>

        </div>

        <!-- CONTENT -->
        <div class="content-box">
            <?= $content ?>
        </div>

    </div>

</div>

</body>
</html>