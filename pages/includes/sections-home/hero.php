<?php
require_once __DIR__ . '/../../../admin/includes/bootstrap.php';
$stmt = $pdo->prepare("SELECT * FROM pages WHERE slug = 'home_hero' LIMIT 1");
$stmt->execute();
$hero = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<section class="hero">

    <h1>
        <?= htmlspecialchars($hero['title_text'] ?? 'Default Title') ?>
    </h1>

    <p>
        <?= htmlspecialchars($hero['description'] ?? 'Default Description') ?>
    </p>

    <a href="<?= htmlspecialchars($hero['button_link'] ?? '#') ?>">
        <?= htmlspecialchars($hero['button_text'] ?? 'Click Here') ?>
    </a>

</section>