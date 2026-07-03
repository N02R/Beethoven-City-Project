<?php
session_start();

/**
 * حماية الصفحة
 */
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../../login.php");
    exit;
}

/**
 * الاتصال بقاعدة البيانات
 */
$conn = new mysqli("127.0.0.1", "root", "", "cms_dev");
$conn->set_charset("utf8mb4");

/**
 * استقبال البيانات
 */
$title_text   = $_POST['title_text'] ?? '';
$description  = $_POST['description'] ?? '';
$button_text  = $_POST['button_text'] ?? '';
$button_link  = $_POST['button_link'] ?? '';

/**
 * تنظيف بسيط
 */
$title_text  = trim($title_text);
$description = trim($description);
$button_text = trim($button_text);
$button_link = trim($button_link);

/**
 * تحديث البيانات
 */
$stmt = $conn->prepare("
    UPDATE pages 
    SET title_text = ?, 
        description = ?, 
        button_text = ?, 
        button_link = ?
    WHERE slug = 'home_hero'
");

$stmt->bind_param(
    "ssss",
    $title_text,
    $description,
    $button_text,
    $button_link
);

if ($stmt->execute()) {

    // نجاح → رجوع للصفحة مع رسالة
    header("Location: hero.php?success=1");
    exit;

} else {

    // فشل
    die("Error updating hero: " . $conn->error);
}