<?php if (isset($page_content['password_section'])): 
    $pass = $page_content['password_section']; ?>
    
    <section class="custom-services-info py-5">
        <div class="custom-container text-center">
            <!-- تأمين العنوان والوصف -->
            <h2 class="pt-5"><?= $pass['title'] ?? '' ?></h2>
            <p class="text-center pas-text"><?= $pass['desc'] ?? '' ?></p>
            
            <div class="pas-info mt-5">
                <!-- تأمين التسمية (Label) -->
                <p><?= $pass['label'] ?? '' ?> .............................</p>
                
                <!-- تأمين نص الزر ورابطه -->
                <a href="<?= $pass['button_url'] ?? '#' ?>" class="btn">
                    <?= $pass['button'] ?? '' ?>
                </a>
            </div>
        </div>
    </section>

<?php endif; ?>