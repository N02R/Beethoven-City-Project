<?php
require_once __DIR__ . '/../../includes/bootstrap.php';
require_once __DIR__ . '/../../includes/header.php';

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $slug = trim($_POST['slug']);
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($slug && $title) {

        $stmt = $pdo->prepare("
            INSERT INTO pages (slug, title, content)
            VALUES (?, ?, ?)
        ");

        $stmt->execute([$slug, $title, $content]);

        $success = "Page created successfully ✔";

    } else {
        $error = "Slug and Title are required";
    }
}

ob_start();
?>

<div class="container-fluid">

    <h3 class="mb-3">Create New Page</h3>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST" class="card p-3">

        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" placeholder="example: about-us">
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="6"></textarea>
        </div>

        <button class="btn btn-primary">Save Page</button>

    </form>

</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../includes/layout.php';