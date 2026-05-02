<?php if (isset($page_content['info_section']['locations'])): 
    $locs = $page_content['info_section']['locations']; ?>

    <div class="advice-list py-5">
        <!-- تأمين العنوان الرئيسي -->
        <h5 class="advice-text"><?= $locs['title'] ?? '' ?></h5>
        
        <ul>
            <div class="row">
                <!-- التأكد من أن items موجودة وهي مصفوفة قبل الدوران -->
                <?php if (isset($locs['items']) && is_array($locs['items'])): ?>
                    <?php foreach ($locs['items'] as $item): ?>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <li>
                                <!-- تأمين التسمية والوصف لكل عنصر -->
                                <span><?= $item['label'] ?? '' ?></span> 
                                <?= $item['desc'] ?? '' ?>
                            </li>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </ul>
    </div>

<?php endif; ?>