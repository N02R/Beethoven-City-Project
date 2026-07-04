<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

/* 🟢 Auth check */
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit;
}

/* 🟢 Bootstrap (حل نهائي لمشكلة $pdo) */
require_once __DIR__ . '/../includes/bootstrap.php';

/* 🟢 جلب Hero من قاعدة البيانات */
$stmt = $pdo->prepare("SELECT * FROM pages WHERE slug = 'home_hero' LIMIT 1");
$stmt->execute();
$hero = $stmt->fetch(PDO::FETCH_ASSOC);

/* 🟢 صورة آمنة */
$image = !empty($hero['image'])
    ? BASE_URL . 'admin/uploads/hero/' . $hero['image']
    : BASE_URL . 'assets/img/default-hero.jpg';
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>Live Hero Editor</title>

    <!-- 🎨 Styles -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

    <style>
        body {
            margin: 0;
            background: #0f172a;
        }

        .editor-wrap {
            position: relative;
        }

        .editable {
            cursor: pointer;
            transition: 0.2s;
        }

        .editable:hover {
            outline: 2px dashed #0d6efd;
            outline-offset: 4px;
        }

        .save-panel {
            position: fixed;
            top: 20px;
            left: 20px;
            background: #1f2937;
            color: #fff;
            padding: 15px;
            border-radius: 12px;
            z-index: 9999;
            width: 230px;
        }

        .save-panel button {
            width: 100%;
        }

        .hero-container {
            position: relative;
            min-height: 500px;
            border-radius: 12px;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.8));
            z-index: 2;
        }

        .hero-content {
            position: relative;
            z-index: 3;
            text-align: center;
            padding: 120px 20px;
            color: #fff;
        }
    </style>
</head>

<body>

<!-- 🟣 PANEL -->
<div class="save-panel">

    <h6>Live Hero Editor</h6>

    <input type="file" id="imageInput" class="form-control form-control-sm mt-2">

    <button class="btn btn-success btn-sm mt-3" onclick="saveChanges()">
        Save Changes
    </button>

    <p style="font-size:12px; margin-top:10px;">
        ✏️ Click text to edit
    </p>

</div>

<!-- 🟢 HERO -->
<div class="editor-wrap">

<section class="hero py-5">

  <div class="custom-container">

    <div class="hero-container">

        <!-- 🟢 IMAGE -->
        <div class="hero-bg">
            <img id="previewImage" src="<?= htmlspecialchars($image) ?>">
        </div>

        <!-- 🟣 OVERLAY -->
        <div class="hero-overlay"></div>

        <!-- 🟢 CONTENT -->
        <div class="hero-content">

            <h1 class="editable" contenteditable="true" data-field="title_text">
                <?= htmlspecialchars($hero['title_text'] ?? 'عنوان الهيرو') ?>
            </h1>

            <p class="editable" contenteditable="true" data-field="description">
                <?= htmlspecialchars($hero['description'] ?? 'وصف الهيرو هنا') ?>
            </p>

            <a class="btn btn-primary editable"
               contenteditable="true"
               data-field="button_text">
                <?= htmlspecialchars($hero['button_text'] ?? 'ابدأ الآن') ?>
            </a>

        </div>

    </div>

  </div>

</section>

</div>

<!-- 🟡 JS -->
<script>

let changes = {};
let imageFile = null;

/* 🟢 TEXT EDIT */
document.querySelectorAll('.editable').forEach(el => {
    el.addEventListener('input', function () {
        let field = this.dataset.field;
        if (field) {
            changes[field] = this.innerText.trim();
        }
    });
});

/* 🟢 IMAGE PREVIEW */
document.getElementById('imageInput').addEventListener('change', function(e) {

    imageFile = e.target.files[0];

    if (!imageFile) return;

    let reader = new FileReader();

    reader.onload = function(e) {
        document.getElementById('previewImage').src = e.target.result;
    };

    reader.readAsDataURL(imageFile);
});

/* 🟢 SAVE */
function saveChanges() {

    let formData = new FormData();
    formData.append('data', JSON.stringify(changes));

    if (imageFile) {
        formData.append('image', imageFile);
    }

    fetch('hero_live_update.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {

        if (data.status === 'success') {
            alert('Saved ✔');
            location.reload();
        } else {
            alert('Error: ' + data.message);
        }

    });

}

</script>

</body>
</html>