<?php
require_once __DIR__ . '/../../includes/bootstrap.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Invalid ID");
}

/* 🟢 حذف الصفحة */
$stmt = $pdo->prepare("DELETE FROM pages WHERE id = ?");
$stmt->execute([$id]);

/* 🟢 الرجوع إلى صفحة القائمة */
header("Location: index.php");
exit;