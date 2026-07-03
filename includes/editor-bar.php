<?php if (IS_ADMIN): ?>

<!-- VISUAL CMS BAR -->
<div id="cms-bar">

    <div class="cms-left">
        🧠 Beethoven Visual CMS
    </div>

    <div class="cms-right">

        <button onclick="toggleEditMode()" class="cms-btn">
            ✏️ Edit Mode
        </button>

<button onclick="saveChanges()" class="cms-btn save">
    💾 Save
</button>
<a href="<?= BASE_URL ?>admin/logout.php" class="cms-btn logout">
    🚪 Logout
</a>

    </div>

</div>

<style>
#cms-bar{
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 55px;
    background: #111827;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 15px;
    z-index: 999999;
    font-family: Arial;
}

.cms-btn{
    background: #374151;
    border: none;
    color: #fff;
    padding: 6px 12px;
    margin-left: 8px;
    border-radius: 6px;
    cursor: pointer;
}

.cms-btn.save{
    background: #16a34a;
}

body{
    padding-top: 55px;
}
</style>

<?php endif; ?>

<?php if (IS_ADMIN): ?>

<script>

let changes = {};

// التقاط التعديلات من العناصر editable
document.querySelectorAll('.editable').forEach(el => {

    el.addEventListener('input', function () {
        const field = this.dataset.field;
        changes[field] = this.innerText;
    });

});

// إرسال البيانات للسيرفر
function saveChanges() {

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
        } else {
            alert('Error: ' + data.message);
        }

        console.log(data);
    });

}

</script>

<?php endif; ?>