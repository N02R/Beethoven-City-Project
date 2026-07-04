<?php
require_once __DIR__ . '/../../includes/bootstrap.php';
require_once __DIR__ . '/../../includes/header.php';

$stmt = $pdo->query("SELECT * FROM pages ORDER BY id DESC");
$pages = $stmt->fetchAll(PDO::FETCH_ASSOC);

ob_start();
?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Pages Manager</h3>
        <a href="create.php" class="btn btn-primary">+ Add Page</a>
    </div>

    <div class="card">
        <div class="card-body">

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Slug</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($pages as $page): ?>
                        <tr>
                            <td><?= $page['id'] ?></td>
                            <td><?= $page['slug'] ?></td>
                            <td><?= $page['title'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $page['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?id=<?= $page['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../includes/layout.php';