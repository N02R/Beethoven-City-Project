<?php
require_once __DIR__ . '/../../../admin/includes/bootstrap.php';

$stmt = $pdo->prepare("SELECT * FROM pages WHERE slug = 'home_hero' LIMIT 1");
$stmt->execute();
$hero = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<section class="hero py-5">

  <div class="custom-container">
      <div class="hero-container">
 <div class="hero-content">

        <h1>
            <?= htmlspecialchars($hero['title_text'] ?? 'مرحباً بك في موقعنا') ?>
        </h1>

        <p>
            <?= htmlspecialchars($hero['description'] ?? 'نقدم أفضل الخدمات التعليمية والاحترافية') ?>
        </p>

        <a href="<?= htmlspecialchars($hero['button_link'] ?? '#') ?>" class="btn hero-btn">
            <?= htmlspecialchars($hero['button_text'] ?? 'ابدأ الآن') ?>
        </a>

    </div>
</div>
  </div>

</section>