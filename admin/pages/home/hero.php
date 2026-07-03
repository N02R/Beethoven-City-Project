<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../../login.php");
    exit;
}

$conn = new mysqli("127.0.0.1", "root", "", "cms_dev");
$conn->set_charset("utf8mb4");

/**
 * جلب بيانات الـ Hero
 */
$stmt = $conn->prepare("SELECT * FROM pages WHERE slug = 'home_hero' LIMIT 1");
$stmt->execute();
$hero = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>Edit Hero</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <h3 class="mb-4">تعديل Hero</h3>

    <form method="POST" action="hero_update.php">

        <div class="mb-3">
            <label>العنوان</label>
            <input type="text" name="title_text" class="form-control"
                   value="<?= $hero['title_text'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label>الوصف</label>
            <textarea name="description" class="form-control"><?= $hero['description'] ?? '' ?></textarea>
        </div>

        <div class="mb-3">
            <label>زر النص</label>
            <input type="text" name="button_text" class="form-control"
                   value="<?= $hero['button_text'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label>رابط الزر</label>
            <input type="text" name="button_link" class="form-control"
                   value="<?= $hero['button_link'] ?? '' ?>">
        </div>

        <button class="btn btn-primary">حفظ التعديلات</button>

    </form>

</div>

</body>
</html>