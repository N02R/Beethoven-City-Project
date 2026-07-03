<?php
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['admin_logged_in'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Unauthorized'
    ]);
    exit;
}

$conn = new mysqli("127.0.0.1", "root", "", "cms_dev");
$conn->set_charset("utf8mb4");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode([
        'status' => 'error',
        'message' => 'No data received'
    ]);
    exit;
}

$title_text  = $data['title_text'] ?? '';
$description = $data['description'] ?? '';
$button_text = $data['button_text'] ?? '';

$stmt = $conn->prepare("
    UPDATE pages 
    SET title_text = ?, 
        description = ?, 
        button_text = ?
    WHERE slug = 'home_hero'
");

if (!$stmt) {
    echo json_encode([
        'status' => 'error',
        'message' => $conn->error
    ]);
    exit;
}

$stmt->bind_param(
    "sss",
    $title_text,
    $description,
    $button_text
);

if ($stmt->execute()) {

    echo json_encode([
        'status' => 'success',
        'message' => 'Updated successfully'
    ]);

} else {

    echo json_encode([
        'status' => 'error',
        'message' => 'Update failed'
    ]);
}