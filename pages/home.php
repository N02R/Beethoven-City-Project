<?php

$hero = $hero ?? [];
$servicesData = $services ?? [];
$chooseData = $choose ?? [];

$sectionsPath = "pages/includes/sections-home/";
?>

<?php include $sectionsPath . "hero.php"; ?>

<?php include $sectionsPath . "services.php"; ?>

<?php include $sectionsPath . "choose.php"; ?>

<?php include $sectionsPath . "reviews.php"; ?>