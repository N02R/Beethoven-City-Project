<?php
require_once __DIR__ . '/../includes/bootstrap.php';

header('Content-Type: application/json');

/* 🟢 تأكد أن الطلب POST */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    exit;
}

/* 🟢 تأكد من وجود ملف */
if (!isset($_FILES['image'])) {
    echo json_encode(['status' => 'error', 'message' => 'No file uploaded']);
    exit;
}

$file = $_FILES['image'];

/* 🟢 إعدادات بسيطة */
$allowed = ['jpg', 'jpeg', 'png', 'webp'];
$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

if (!in_array($ext, $allowed)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid file type']);
    exit;
}

/* 🟢 إنشاء اسم جديد */
$newName = 'hero_' . time() . '.' . $ext;

/* 🟢 المسار */
$uploadPath = __DIR__ . '/../uploads/hero/';

/* 🟢 تأكد أن المجلد موجود */
if (!is_dir($uploadPath)) {
    mkdir($uploadPath, 0777, true);
}

/* 🟢 رفع الملف */
if (move_uploaded_file($file['tmp_name'], $uploadPath . $newName)) {

    /* 🟢 تحديث قاعدة البيانات */
    $stmt = $pdo->prepare("UPDATE pages SET image = ? WHERE slug = 'home_hero'");
    $stmt->execute([$newName]);

    echo json_encode([
        'status' => 'success',
        'image' => $newName
    ]);

} else {
    echo json_encode(['status' => 'error', 'message' => 'Upload failed']);
}