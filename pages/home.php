<?php

$sectionsPath = "pages/includes/sections-home/";

/**
 * ضمان عدم كسر الـ views
 */

$hero = $hero ?? [];

/**
 * 🔥 توحيد أسماء البيانات (مهم جداً)
 */
$servicesData = $services ?? [];

$chooseData = $choose ?? [];

$reviewsData = $reviews ?? [];

$guideData = $guide ?? [];

/**
 * sections render
 */

include $sectionsPath . "hero.php";
include $sectionsPath . "services.php";
include $sectionsPath . "choose.php";
include $sectionsPath . "reviews.php";
include $sectionsPath . "guide-preview.php";
?>