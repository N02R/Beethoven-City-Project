<section class="custom-services-info py-5">
    <div class="custom-container">
      
      <!-- التأكد من وجود بيانات الرأسية -->
      <?php if (isset($page_content['info_section']['head'])): ?>
      <div class="head-info">
        <h2 class="main-text"><?= $page_content['info_section']['head']['title'] ?? '' ?></h2>
        <p class="par-text"><?= $page_content['info_section']['head']['desc'] ?? '' ?></p>
      </div>
      <?php endif; ?>

      <!-- التأكد من وجود بيانات نصائح ما قبل السفر -->
      <?php if (isset($page_content['info_section']['pre_travel'])): ?>
      <div class="advice-check py-5">
        <h5 class="advice-text"><?= $page_content['info_section']['pre_travel']['title'] ?? '' ?></h5>
        <p><?= $page_content['info_section']['pre_travel']['desc'] ?? '' ?></p>
        
        <div class="row">
          <?php 
          $checks = $page_content['info_section']['pre_travel']['checks'] ?? [];
          if (is_array($checks)):
            foreach ($checks as $check): ?>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <p>✅ <?= $check ?></p>
              </div>
            <?php endforeach; 
          endif; ?>
        </div>
      </div>
      <?php endif; ?>

      <!-- التأكد من وجود الملاحظات -->
      <?php if (isset($page_content['info_section']['notes'])): ?>
      <div class="advice-stars my-5">
        <h5 class="mb-4 note-text"><?= $page_content['info_section']['notes']['title'] ?? '' ?></h5>
        <ul class="star-list">
          <?php 
          $items = $page_content['info_section']['notes']['items'] ?? [];
          if (is_array($items)):
            foreach ($items as $item): ?>
              <li>
                <p>
                  <img src="<?= BASE_URL ?>assets/img/education/starList.svg" alt="" 
                       class="<?= ($lang ?? 'ar') == 'ar' ? 'ms-2' : 'me-2' ?>" loading="lazy">
                  <?= $item ?>
                </p>
              </li>
            <?php endforeach; 
          endif; ?>
        </ul>
      </div>
      <?php endif; ?>

    </div>
  </section>