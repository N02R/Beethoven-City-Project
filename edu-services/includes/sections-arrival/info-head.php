<?php if (isset($page_content['info_section']['head'])): ?>
    <div class="head-info">
        <h2 class="main-text">
            <?= $page_content['info_section']['head']['title'] ?? '' ?>
        </h2>
        <p class="par-text">
            <?= $page_content['info_section']['head']['desc'] ?? '' ?>
        </p>
    </div>
<?php endif; ?>