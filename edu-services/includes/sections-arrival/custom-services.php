<section class="custom-services py-5">
    <div class="custom-container">
      <?php 
      // نتحقق من وجود مصفوفة الهيرو أولاً
      if (isset($page_content['services_hero'])): 
          $hero = $page_content['services_hero'];
          
          // تأمين مسار الصورة وتجنب الخطأ إذا لم تكن موجودة
          $hero_img = isset($hero['image']) ? BASE_URL . $hero['image'] : '';
          $hero_style = $hero['style'] ?? '';
      ?>
        <div class="custom-hero" 
             style="background-image: url('<?= $hero_img ?>'); 
                    <?= $hero_style ?>">
        </div>
      <?php endif; ?>
    </div>
</section>