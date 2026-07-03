<?php
/**
 * Hero Section - CMS Ready Fixed Version
 */

if (!isset($hero)) {
    $hero = [];
}
?>

<section class="hero py-5">

  <div class="custom-container">

    <div class="hero-container">

      <!-- 🟢 TEXT CONTENT -->
      <div class="hero-content">

        <h1 class="<?= IS_ADMIN ? 'editable' : '' ?>" data-field="title_text">
            <?= e($hero['title_text'] ?? 'مرحباً بك في موقعنا') ?>
        </h1>

        <p class="<?= IS_ADMIN ? 'editable' : '' ?>" data-field="description">
            <?= e($hero['description'] ?? 'نقدم أفضل الخدمات التعليمية والاحترافية') ?>
        </p>

        <!-- ⚠️ زر منفصل (لا نجعله contenteditable لأنه عنصر link) -->
        <a href="<?= e($hero['button_link'] ?? '#') ?>" 
           class="btn hero-btn <?= IS_ADMIN ? 'editable-text' : '' ?>" 
           data-field="button_text">

            <span>
                <?= e($hero['button_text'] ?? 'ابدأ الآن') ?>
            </span>

        </a>

      </div>

      <!-- 🟢 IMAGE -->
      <div class="hero-image">

        <?php if (!empty($hero['image'])): ?>

            <img src="<?= BASE_URL . 'assets/img/' . e($hero['image']) ?>" 
                 class="img-fluid" 
                 alt="<?= e($hero['alt_text'] ?? 'hero image') ?>">

        <?php else: ?>

            <img src="<?= BASE_URL . 'assets/img/default-hero.png' ?>" 
                 class="img-fluid" 
                 alt="hero">

        <?php endif; ?>

      </div>

    </div>

    <!-- 🟢 SAVE BUTTON -->
    <?php if (IS_ADMIN): ?>
    <button onclick="saveHero()" class="btn btn-success mt-3">
        💾 Save Changes
    </button>
    <?php endif; ?>

  </div>

</section>

<?php if (IS_ADMIN): ?>
<!-- 🟢 CMS SCRIPT (FIXED) -->
<script>

let changes = {};

/**
 * 🟢 EDIT ANY TEXT ELEMENT
 */
document.querySelectorAll('.editable').forEach(el => {
    
    el.addEventListener('click', function() {
        
        this.setAttribute('contenteditable', 'true');
        this.focus();
        
    });
    
    el.addEventListener('input', function() {
        
        const field = this.dataset.field;
        changes[field] = this.innerText.trim();
        
        console.log("Typing:", changes);
        
    });
    
    el.addEventListener('blur', function() {
        
        this.removeAttribute('contenteditable');
        
    });
    
});


/**
 * 🟡 BUTTON FIX (SAFE VERSION)
 */
document.querySelectorAll('.editable-text').forEach(el => {
    
    el.addEventListener('click', function(e) {
        
        e.preventDefault();
        
        let span = this.querySelector('span');
        
        if (!span) return;
        
        span.setAttribute('contenteditable', 'true');
        span.focus();
        
        span.addEventListener('input', function() {
            
            const field = el.dataset.field;
            changes[field] = this.innerText.trim();
            
            console.log("Button typing:", changes);
            
        });
        
        span.addEventListener('blur', function() {
            this.removeAttribute('contenteditable');
        });
        
    });
    
});


/**
 * 💾 SAVE FUNCTION
 */
function saveHero() {
    
    if (Object.keys(changes).length === 0) {
        alert("No changes to save");
        return;
    }
    
    fetch('<?= BASE_URL ?>admin/editor/hero_live_update.php', {
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
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
            
            console.log(data);
            
        });
    
}
</script>
<?php endif; ?> 