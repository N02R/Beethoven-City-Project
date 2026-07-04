<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$lang = $_SESSION['lang'] ?? 'ar';
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= $lang === 'en' ? 'ltr' : 'rtl' ?>">

<head>
    <meta charset="UTF-8">
    <title>BCS Admin</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/assets/css/design-system.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>

<!-- TOP BAR -->
<div style="background:#1e63ff;color:white;padding:10px;">
    BCS ADMIN PANEL
</div>