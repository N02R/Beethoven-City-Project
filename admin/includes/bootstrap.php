<?php

/**
 * Beethoven CMS Studio
 * Admin Bootstrap + DB Connection
 */

defined('CMS_ADMIN') or define('CMS_ADMIN', true);

/* 🟢 1. Session */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* 🟢 2. Database Connection (PDO) */
$host = "127.0.0.1";
$db   = "cms_dev";
$user = "root";
$pass = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8",
        $user,
        $pass
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {
    die("DB Connection Failed: " . $e->getMessage());
}