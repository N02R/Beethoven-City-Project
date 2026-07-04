<?php

require_once __DIR__ . '/includes/header.php';

// المحتوى
ob_start();
?>

<h1>Dashboard Works 🎉</h1>

<?php
$content = ob_get_clean();

require_once __DIR__ . '/includes/layout.php';