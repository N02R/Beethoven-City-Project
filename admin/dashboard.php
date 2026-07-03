<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

$adminName = $_SESSION['admin_name'] ?? 'Admin';
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .sidebar {
            height: 100vh;
            background: #1f2937;
            color: #fff;
            position: fixed;
            width: 250px;
        }

        .sidebar a {
            color: #fff;
            display: block;
            padding: 12px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #374151;
        }

        .main {
            margin-right: 250px;
            padding: 20px;
        }

        .card-box {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar p-3">
    <h4 class="text-center mb-4">CMS Admin</h4>

    <a href="#"><i class="bi bi-house"></i> Dashboard</a>
    <a href="#"><i class="bi bi-file-earmark"></i> Home Page</a>
    <a href="#"><i class="bi bi-chat-dots"></i> FAQ</a>
    <a href="#"><i class="bi bi-gear"></i> Settings</a>

    <hr>

    <a href="logout.php" class="text-danger">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>
</div>

<!-- Main -->
<div class="main">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>مرحباً، <?= htmlspecialchars($adminName) ?></h3>
    </div>

    <!-- Cards -->
    <div class="row g-3">

        <div class="col-md-4">
            <div class="card card-box p-3">
                <h5>Home Sections</h5>
                <p>إدارة الصفحة الرئيسية</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-box p-3">
                <h5>FAQ</h5>
                <p>إدارة الأسئلة الشائعة</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-box p-3">
                <h5>Services</h5>
                <p>إدارة الخدمات</p>
            </div>
        </div>

    </div>

</div>

</body>
</html>