<?php
session_start();

/* 🟢 1. أول شيء: الاتصال بقاعدة البيانات */
require_once __DIR__ . '/../../config.php';

/* 🟢 2. ثم الهيدر */
require_once __DIR__ . '/../includes/header.php';

/* 🟢 3. الآن DB جاهز */
$stmt = $pdo->query("SELECT COUNT(*) FROM pages");
$pages_count = $stmt->fetchColumn();

/* 🟢 4. بدء المحتوى */
ob_start();
?>

<div class="container-fluid">

    <div class="row g-3">

        <!-- USERS -->
        <div class="col-md-3">
            <div class="admin-card">
                <div class="icon" style="background:#3b82f6;">
                    <i class="bi bi-people"></i>
                </div>

                <div class="info">
                    <h3>120</h3>
                    <p>Users</p>
                </div>
            </div>
        </div>

        <!-- PAGES -->
        <div class="col-md-3">
            <div class="admin-card">
                <div class="icon" style="background:#10b981;">
                    <i class="bi bi-file-earmark-text"></i>
                </div>

                <div class="info">
                    <h3><?= $pages_count ?></h3>
                    <p>Pages</p>
                </div>
            </div>
        </div>

        <!-- MEDIA -->
        <div class="col-md-3">
            <div class="admin-card">
                <div class="icon" style="background:#f59e0b;">
                    <i class="bi bi-images"></i>
                </div>

                <div class="info">
                    <h3>89</h3>
                    <p>Media Files</p>
                </div>
            </div>
        </div>

        <!-- STATUS -->
        <div class="col-md-3">
            <div class="admin-card">
                <div class="icon" style="background:#ef4444;">
                    <i class="bi bi-activity"></i>
                </div>

                <div class="info">
                    <h3>Active</h3>
                    <p>System Status</p>
                </div>
            </div>
        </div>

    </div>

</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../includes/layout.php';