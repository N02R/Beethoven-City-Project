<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

/**
 * 🔐 حماية الدخول
 */
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit;
}

/**
 * 🔥 تحميل النظام الأساسي (BASE_URL + helpers)
 */
require_once __DIR__ . "/../../includes/bootstrap.php";

/**
 * 🔌 الاتصال بقاعدة البيانات
 */
$conn = new mysqli("127.0.0.1", "root", "", "cms_dev");
$conn->set_charset("utf8mb4");

/**
 * 📦 جلب بيانات Hero
 */
$stmt = $conn->prepare("SELECT * FROM pages WHERE slug = 'home_hero' LIMIT 1");
$stmt->execute();

$result = $stmt->get_result();
$hero = $result ? $result->fetch_assoc() : [];

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>Live Hero Editor</title>

    <!-- 🎨 REAL WEBSITE STYLE -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

    <style>
        body {
            margin: 0;
            background: #0f172a;
        }

        /* 🟢 Editor wrapper */
        .editor-wrap {
            position: relative;
        }

        /* ✏️ Editable effect */
        .editable {
            cursor: pointer;
            transition: 0.2s;
        }

        .editable:hover {
            outline: 2px dashed #0d6efd;
            outline-offset: 4px;
        }

        /* 🟣 Save panel */
        .save-panel {
            position: fixed;
            top: 20px;
            left: 20px;
            background: #1f2937;
            color: #fff;
            padding: 15px;
            border-radius: 12px;
            z-index: 9999;
            width: 220px;
        }

        .save-panel button {
            width: 100%;
        }

        /* 🖼️ Hero image */
        .hero-image img {
            max-width: 100%;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<!-- 🟣 CONTROL PANEL -->
<div class="save-panel">
    <h6>Live Editor</h6>

    <button class="btn btn-success btn-sm mt-2" onclick="saveChanges()">
        Save Changes
    </button>

    <p style="font-size:12px; margin-top:10px;">
        ✏️ Click text to edit
    </p>
</div>

<!-- 🟢 HERO PREVIEW (REAL DESIGN) -->
<div class="editor-wrap">

<section class="hero py-5">

  <div class="custom-container">

    <div class="hero-container">

      <div class="hero-content">

        <h1 class="editable" contenteditable="true" data-field="title_text">
          <?= htmlspecialchars($hero['title_text'] ?? '') ?>
        </h1>

        <p class="editable" contenteditable="true" data-field="description">
          <?= htmlspecialchars($hero['description'] ?? '') ?>
        </p>

        <a class="btn btn-primary editable"
           contenteditable="true"
           data-field="button_text">
          <?= htmlspecialchars($hero['button_text'] ?? '') ?>
        </a>

      </div>

      <?php if (!empty($hero['image'])): ?>
        <div class="hero-image">
            <img src="<?= BASE_URL . 'assets/img/' . $hero['image'] ?>"
                 class="img-fluid">
        </div>
      <?php endif; ?>

    </div>

  </div>

</section>

</div>

<!-- 🟡 JAVASCRIPT ENGINE -->
<script>

let changes = {};

/**
 * Capture changes
 */
document.querySelectorAll('.editable').forEach(el => {

    el.addEventListener('input', function () {
        let field = this.dataset.field;
        changes[field] = this.innerText;
    });

});

/**
 * 💾 SAVE FUNCTION
 */
function saveChanges() {

    fetch('hero_live_update.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(changes)
    })
    .then(res => res.json())
    .then(data => {

        if (data.status === 'success') {
            alert('Saved ✔');
        } else {
            alert('Error: ' + data.message);
        }

        console.log(data);
    });

}

</script>

</body>
</html>