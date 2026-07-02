<?php
/**
 * الصفحة الرئيسية - View فقط
 */

// البيانات تأتي جاهزة من index.php
$hero = $hero ?? [];
$servicesData = $services ?? [];

$sectionsPath = "pages/includes/sections-home/";
?>

<?php include $sectionsPath . "hero.php"; ?>

<?php include $sectionsPath . "services.php"; ?>

<?php include $sectionsPath . "choose.php"; ?>

<?php include $sectionsPath . "reviews.php"; ?>

<?php include $sectionsPath . "guide-preview.php"; ?>

<?php include $sectionsPath . "faq.php"; ?>