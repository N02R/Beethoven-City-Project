<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit;
}

require_once __DIR__ . "/../../includes/bootstrap.php";

$conn = new mysqli("127.0.0.1", "root", "", "cms_dev");
$conn->set_charset("utf8mb4");

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

        /* Editor */
        .editor-wrap {
            position: relative;
        }

        /* Editable hover */
        .editable {
            cursor: pointer;
            transition: 0.2s;
        }

        .editable:hover {
            outline: 2px dashed #0d6efd;
            outline-offset: 4px;
        }

        /* Save panel */
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

        .hero-image img {
            max-width: 100%;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<!-- 🟣 PANEL -->
<div class="save-panel">

    <h6>Live Hero Editor</h6>

    <!-- IMAGE UPLOAD -->
    <input type="file" id="imageInput" class="form-control form-control-sm mt-2">

    <button class="btn btn-success btn-sm mt-3" onclick="saveChanges()">
        Save Changes
    </button>

    <p style="font-size:12px; margin-top:10px;">
        ✏️ Click text to edit
    </p>

</div>

<!-- 🟢 HERO (REAL DESIGN) -->
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
                 id="previewImage"
                 class="img-fluid">
        </div>
      <?php endif; ?>

    </div>

  </div>

</section>

</div>

<!-- 🟡 JS ENGINE -->
<script>

let changes = {};
let imageFile = null;

/**
 * TEXT EDITS
 */
document.querySelectorAll('.editable').forEach(el => {

    el.addEventListener('input', function () {
        let field = this.dataset.field;
        if (field) {
            changes[field] = this.innerText;
        }
    });

});

/**
 * IMAGE PREVIEW
 */
document.getElementById('imageInput').addEventListener('change', function(e) {

    imageFile = e.target.files[0];

    if (imageFile) {

        let reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('previewImage').src = e.target.result;
        };

        reader.readAsDataURL(imageFile);
    }
});

/**
 * SAVE FUNCTION
 */
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
        } else {
            alert('Error: ' + data.message);
        }

        console.log(data);
    });

}

</script>

</body>
</html>