<?php
require_once __DIR__ . '/../../includes/bootstrap.php';
require_once __DIR__ . '/../../includes/header.php';

$stmt = $pdo->prepare("SELECT * FROM pages WHERE slug = 'home_hero' LIMIT 1");
$stmt->execute();
$hero = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$hero) {
    die("Hero not found");
}

$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $pdo->prepare("
        UPDATE pages 
        SET title_text = ?, description = ?, button_text = ?, button_link = ?
        WHERE slug = 'home_hero'
    ");

    $stmt->execute([
        $_POST['title_text'],
        $_POST['description'],
        $_POST['button_text'],
        $_POST['button_link']
    ]);

    $success = "Hero updated successfully ✔";

    // إعادة تحميل البيانات
    $stmt = $pdo->prepare("SELECT * FROM pages WHERE slug = 'home_hero' LIMIT 1");
    $stmt->execute();
    $hero = $stmt->fetch(PDO::FETCH_ASSOC);
}

ob_start();
?>

<div class="container-fluid">

    <h3 class="mb-3">Hero Editor</h3>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST" class="card p-3">

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title_text" class="form-control" value="<?= htmlspecialchars($hero['title_text']) ?>">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"><?= htmlspecialchars($hero['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Button Text</label>
            <input type="text" name="button_text" class="form-control" value="<?= htmlspecialchars($hero['button_text']) ?>">
        </div>

        <div class="mb-3">
            <label>Button Link</label>
            <input type="text" name="button_link" class="form-control" value="<?= htmlspecialchars($hero['button_link']) ?>">
        </div>

        <button class="btn btn-primary">Save Hero</button>

    </form>

</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../includes/layout.php';