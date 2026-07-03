<?php

session_start();

// حذف كل بيانات الجلسة
$_SESSION = [];

// حذف الكوكيز الخاصة بالجلسة
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// تدمير الجلسة
session_destroy();

// إعادة توجيه للموقع
header("Location: /");
exit;