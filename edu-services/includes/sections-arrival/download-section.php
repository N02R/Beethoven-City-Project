<?php if (isset($page_content['info_section']['downloads']) && is_array($page_content['info_section']['downloads'])): ?>
    <div class="row mt-5">
        <?php foreach ($page_content['info_section']['downloads'] as $file): ?>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="download-card mb-3">
                    <div class="download-row">
                        <!-- تأمين مسار الأيقونة ونص الـ Alt -->
                        <img src="<?= BASE_URL . ($file['icon'] ?? '') ?>" alt="<?= $file['format'] ?? 'file' ?>" loading="lazy"/>
                        
                        <div class="dl-info">
                            <!-- تأمين العناوين -->
                            <div class="dl-title"><?= $file['title'] ?? '' ?></div>
                            <div class="dl-sub"><?= $file['type'] ?? '' ?></div>
                        </div>
                        
                        <!-- النقاط (Leader) كما هي في تصميمك -->
                        <span class="leader d-lg-block d-md-none d-sm-none" aria-hidden="true">
                            ................................................................................................................
                        </span>
                        
                        <!-- تأمين رابط التحميل ونظام اللغة -->
                        <a class="download-link" href="<?= $file['link'] ?? '#' ?>" download>
                            <?= ($lang ?? 'ar') == 'ar' ? 'تحميل' : 'Download' ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>