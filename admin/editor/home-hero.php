<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit;
}

$conn = new mysqli("127.0.0.1", "root", "", "cms_dev");
$conn->set_charset("utf8mb4");

$stmt = $conn->prepare("SELECT * FROM pages WHERE slug = 'home_hero' LIMIT 1");
$stmt->execute();
$hero = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>Live Hero Editor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
        }

        .editor-wrapper {
            display: flex;
            height: 100vh;
        }

        .preview {
            flex: 2;
            padding: 50px;
            background: #fff;
        }

        .panel {
            flex: 1;
            background: #1f2937;
            color: white;
            padding: 20px;
        }

        .editable {
            cursor: pointer;
            border-bottom: 2px dashed transparent;
        }

        .editable:hover {
            border-bottom: 2px dashed #0d6efd;
        }

        .hint {
            font-size: 13px;
            opacity: 0.7;
        }
    </style>
</head>

<body>

<div class="editor-wrapper">

    <!-- PREVIEW -->
    <div class="preview">

        <h1 class="editable"
            contenteditable="true"
            data-field="title_text">
            <?= htmlspecialchars($hero['title_text'] ?? '') ?>
        </h1>

        <p class="editable"
           contenteditable="true"
           data-field="description">
            <?= htmlspecialchars($hero['description'] ?? '') ?>
        </p>

        <button class="btn btn-primary editable"
                contenteditable="true"
                data-field="button_text">
            <?= htmlspecialchars($hero['button_text'] ?? '') ?>
        </button>

    </div>

    <!-- PANEL -->
    <div class="panel">

        <h4>Hero Editor</h4>

        <p class="hint">✏️ اضغط على أي نص وعدّله مباشرة</p>

        <button class="btn btn-success w-100 mt-3" onclick="saveChanges()">
            Save Changes
        </button>

        <hr>

        <p class="hint">التعديلات يتم حفظها مباشرة في قاعدة البيانات</p>

    </div>

</div>

<script>
let changes = {};

document.querySelectorAll('.editable').forEach(el => {
    el.addEventListener('input', function () {
        let field = this.dataset.field;
        changes[field] = this.innerText;
    });
});

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