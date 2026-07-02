<?php

$hero = $hero ?? [];
$servicesData = $services ?? [];

$sectionsPath = "pages/includes/sections-home/";
?>

<?php include $sectionsPath . "hero.php"; ?>

<?php include $sectionsPath . "services.php"; ?>