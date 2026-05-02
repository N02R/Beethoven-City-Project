<?php 
/** @var array $hero */
$hero = $hero ?? []; 
?>

<section class="contact-hero py-5">
    <div class="custom-container">
        <div class="contact-hero-img">
            <?php 
                // تحديد المسار الافتراضي والمسار القادم من المصفوفة مع إضافة BASE_URL
                $heroImg = !empty($hero['img']) ? $hero['img'] : 'assets/img/contact us/contacthero.png';
            ?>
            <img src="<?= BASE_URL . $heroImg ?>" 
                 alt="<?= e($hero['title'] ?? 'تواصل معنا') ?>" 
                 class="img-fluid w-100">
        </div>
    </div>
</section>