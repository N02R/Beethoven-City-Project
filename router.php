<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// تجاهل الملفات الحقيقية (CSS, JS, images)
$file = __DIR__ . $uri;

if ($uri !== '/' && file_exists($file) && !is_dir($file)) {
    return false;
}

// تحويل الروابط إلى index.php?page=...
$_GET['page'] = trim($uri, '/');

require __DIR__ . '/index.php';