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

/**
 * TEXT DATA
 */
$data = json_decode($_POST['data'] ?? '{}', true);

/**
 * IMAGE UPLOAD
 */
$imageName = null;

if (!empty($_FILES['image']['name'])) {

    $imageName = time() . '_' . $_FILES['image']['name'];

    $target = __DIR__ . "/../../assets/img/" . $imageName;

    move_uploaded_file($_FILES['image']['tmp_name'], $target);
}

/**
 * VALUES
 */
$title = $data['title_text'] ?? '';
$desc = $data['description'] ?? '';
$btn = $data['button_text'] ?? '';

/**
 * UPDATE QUERY
 */
if ($imageName) {

    $stmt = $conn->prepare("
        UPDATE pages 
        SET title_text=?, description=?, button_text=?, image=? 
        WHERE slug='home_hero'
    ");

    $stmt->bind_param("ssss", $title, $desc, $btn, $imageName);

} else {

    $stmt = $conn->prepare("
        UPDATE pages 
        SET title_text=?, description=?, button_text=? 
        WHERE slug='home_hero'
    ");

    $stmt->bind_param("sss", $title, $desc, $btn);
}

if ($stmt->execute()) {

    echo json_encode([
        'status' => 'success',
        'message' => 'Updated successfully'
    ]);

} else {

    echo json_encode([
        'status' => 'error',
        'message' => $conn->error
    ]);
}