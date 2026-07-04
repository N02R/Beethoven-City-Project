<?php
require_once __DIR__ . '/../../../admin/includes/bootstrap.php';

/* 🟢 جلب بيانات الهيرو */
$stmt = $pdo->prepare("SELECT * FROM pages WHERE slug = 'home_hero' LIMIT 1");
$stmt->execute();
$hero = $stmt->fetch(PDO::FETCH_ASSOC);

/* 🟢 صلاحية الأدمن */
$isAdmin = !empty($_SESSION['admin']);

/* 🟢 حل الصورة الآمن */
$image = !empty($hero['image'])
    ? BASE_URL . 'admin/uploads/hero/' . $hero['image']
    : BASE_URL . 'assets/img/default-hero.jpg';
?>

<section class="hero py-5">

  <div class="custom-container">

    <div class="hero-container"
         style="background-image: url('<?= htmlspecialchars($image) ?>');
                background-size: cover;
                background-position: center;
                min-height: 500px;
                position: relative;">

      <!-- 🟣 overlay (للحفاظ على نفس التصميم) -->
      <div style="
            position:absolute;
            inset:0;
            background:linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.8));
            z-index:1;">
      </div>

      <!-- 🟢 CONTENT -->
      <div class="hero-content" style="position:relative; z-index:2;">

        <!-- 🟢 TITLE -->
        <?php if ($isAdmin): ?>
            <h1 class="cms-edit" data-field="title_text">
                <?= htmlspecialchars($hero['title_text'] ?? 'مرحباً بك في موقعنا') ?>
            </h1>
        <?php else: ?>
            <h1>
                <?= htmlspecialchars($hero['title_text'] ?? 'مرحباً بك في موقعنا') ?>
            </h1>
        <?php endif; ?>

        <!-- 🟢 DESCRIPTION -->
        <?php if ($isAdmin): ?>
            <p class="cms-edit" data-field="description">
                <?= htmlspecialchars($hero['description'] ?? 'نقدم أفضل الخدمات التعليمية والاحترافية') ?>
            </p>
        <?php else: ?>
            <p>
                <?= htmlspecialchars($hero['description'] ?? 'نقدم أفضل الخدمات التعليمية والاحترافية') ?>
            </p>
        <?php endif; ?>

        <!-- 🟢 BUTTON -->
        <?php if ($isAdmin): ?>
            <a href="#" class="btn hero-btn cms-edit" data-field="button_text">
                <?= htmlspecialchars($hero['button_text'] ?? 'ابدأ الآن') ?>
            </a>
        <?php else: ?>
            <a href="<?= htmlspecialchars($hero['button_link'] ?? '#') ?>" class="btn hero-btn">
                <?= htmlspecialchars($hero['button_text'] ?? 'ابدأ الآن') ?>
            </a>
        <?php endif; ?>

      </div>

    </div>

  </div>

</section>

<!-- 🟣 CMS POPUP -->
<?php if ($isAdmin): ?>

<div id="cms-popup" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,.6); justify-content:center; align-items:center; z-index:9999;">

    <div style="background:#fff; padding:20px; width:90%; max-width:400px; border-radius:12px;">

        <h3>Edit Content</h3>

        <textarea id="cms-input" style="width:100%; height:120px;"></textarea>

        <div style="margin-top:10px; display:flex; gap:10px; justify-content:flex-end;">

            <button id="cms-cancel" class="btn btn-secondary">Cancel</button>
            <button id="cms-save" class="btn btn-primary">Save</button>

        </div>

    </div>

</div>

<!-- 🟢 CMS SCRIPT -->
<script>

let currentField = null;
let currentElement = null;

/* 🟢 Enable editing */
document.querySelectorAll('.cms-edit').forEach(el => {

    el.addEventListener('click', function(e) {

        e.preventDefault();

        currentField = this.dataset.field;
        currentElement = this;

        document.getElementById('cms-input').value = this.innerText.trim();

        document.getElementById('cms-popup').style.display = 'flex';

    });

});

/* 🟡 Cancel */
document.getElementById('cms-cancel').onclick = function() {
    document.getElementById('cms-popup').style.display = 'none';
};

/* 🟢 Save */
document.getElementById('cms-save').onclick = function() {

    let value = document.getElementById('cms-input').value;

    fetch('/admin/api/update-hero.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
            field: currentField,
            value: value
        })
    })
    .then(res => res.json())
    .then(data => {

        if (data.status === 'success') {

            currentElement.innerText = value;
            document.getElementById('cms-popup').style.display = 'none';

        } else {
            alert('Error saving data');
        }

    });

};

</script>

<?php endif; ?>