<?php

session_start();
header('Content-Type: application/json');

$conn = new mysqli("127.0.0.1", "root", "", "cms_dev");
$conn->set_charset("utf8mb4");

// استلام البيانات JSON
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode([
        'status' => 'error',
        'message' => 'No data received'
    ]);
    exit;
}

// تجهيز القيم
$title = $data['title_text'] ?? null;
$description = $data['description'] ?? null;

// تحديث قاعدة البيانات
$stmt = $conn->prepare("
    UPDATE pages 
    SET content = JSON_SET(content,
        '$.title_text', ?,
        '$.description', ?
    )
    WHERE slug = 'home_hero'
");

$stmt->bind_param("ss", $title, $description);

if ($stmt->execute()) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Updated successfully'
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => $stmt->error
    ]);
}