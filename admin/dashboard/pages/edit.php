<?php
require_once __DIR__ . '/../../includes/bootstrap.php';
require_once __DIR__ . '/../../includes/header.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Invalid ID");
}

/* 🟢 جلب الصفحة */
$stmt = $pdo->prepare("SELECT * FROM pages WHERE id = ?");
$stmt->execute([$id]);
$page = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$page) {
    die("Page not found");
}

$success = "";
$error = "";

/* 🟢 تحديث البيانات */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $slug = $_POST['slug'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if ($slug && $title) {

        $stmt = $pdo->prepare("
            UPDATE pages 
            SET slug = ?, title = ?, content = ?
            WHERE id = ?
        ");

        $stmt->execute([$slug, $title, $content, $id]);

        $success = "Page updated successfully ✔";

        /* تحديث البيانات المعروضة */
        $page['slug'] = $slug;
        $page['title'] = $title;
        $page['content'] = $content;

    } else {
        $error = "Slug and Title are required";
    }
}

ob_start();
?>

<div class="container-fluid">

    <h3 class="mb-3">Edit Page</h3>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST" class="card p-3">

        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="<?= htmlspecialchars($page['slug']) ?>">
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($page['title']) ?>">
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="6"><?= htmlspecialchars($page['content']) ?></textarea>
        </div>

        <button class="btn btn-primary">Update Page</button>

    </form>

</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../includes/layout.php';