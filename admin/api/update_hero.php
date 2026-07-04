<?php
require_once __DIR__ . '/../includes/bootstrap.php';

$data = json_decode(file_get_contents("php://input"), true);

$field = $data['field'];
$value = $data['value'];

$allowed = ['title_text','description','button_text'];

if (!in_array($field, $allowed)) {
    echo json_encode(['status' => 'error']);
    exit;
}

$stmt = $pdo->prepare("
    UPDATE pages 
    SET $field = ?
    WHERE slug = 'home_hero'
");

$stmt->execute([$value]);

echo json_encode(['status' => 'success']);