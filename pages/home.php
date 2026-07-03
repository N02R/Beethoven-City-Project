<?php

$sectionsPath = "pages/includes/sections-home/";

/**
 * ضمان عدم كسر الـ views
 */

// Hero (كما هو)
$hero = $hero ?? [];

/**
 * مهم: لا نغلف البيانات
 * لأن الـ services.php و choose.php يتوقعون arrays مباشرة
 */

$servicesData = $services ?? [];
$chooseData   = $choose ?? [];
$reviewsData  = $reviews ?? [];
$guideData    = $guide ?? [];

/**
 * sections render
 */

include $sectionsPath . "hero.php";
include $sectionsPath . "services.php";
include $sectionsPath . "choose.php";
include $sectionsPath . "reviews.php";
include $sectionsPath . "guide-preview.php";
?>