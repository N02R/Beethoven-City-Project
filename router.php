<?php

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// إذا كان الملف موجود فعليًا (css, js, images, php مباشر) افتحه مباشرة
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// غير ذلك: مرر الطلب إلى index.php
require __DIR__ . '/index.php';