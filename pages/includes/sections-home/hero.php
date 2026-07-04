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

        <!-- 🟢 TITLE -->
        <h1 class="cms-edit" data-field="title_text">
            <?= htmlspecialchars($hero['title_text'] ?? 'مرحباً بك في موقعنا') ?>
        </h1>

        <!-- 🟢 DESCRIPTION -->
        <p class="cms-edit" data-field="description">
            <?= htmlspecialchars($hero['description'] ?? 'نقدم أفضل الخدمات التعليمية والاحترافية') ?>
        </p>

        <!-- 🟢 BUTTON -->
        <a href="<?= htmlspecialchars($hero['button_link'] ?? '#') ?>" 
           class="btn hero-btn cms-edit" 
           data-field="button_text">

            <?= htmlspecialchars($hero['button_text'] ?? 'ابدأ الآن') ?>

        </a>

      </div>

    </div>

  </div>

</section>

<!-- 🟣 CMS POPUP (Hidden by default) -->
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

/* 🟢 فتح التعديل */
document.querySelectorAll('.cms-edit').forEach(el => {

    el.addEventListener('click', function(e) {

        e.preventDefault();

        currentField = this.dataset.field;
        currentElement = this;

        document.getElementById('cms-input').value = this.innerText.trim();

        document.getElementById('cms-popup').style.display = 'flex';

    });

});

/* 🟡 إغلاق */
document.getElementById('cms-cancel').onclick = function() {
    document.getElementById('cms-popup').style.display = 'none';
};

/* 🟢 حفظ */
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