<?php

$sectionsPath = "pages/includes/sections-home/";

/**
 * ضمان عدم كسر الـ views
 */

$hero = $hero ?? [];

$services = [
    'title' => 'خدماتنا',
    'items' => $services ?? []
];

$choose = [
    'title' => 'ما الذي يميز بيتهوفن سيتي',
    'items' => $choose ?? []
];

$reviews = $reviews ?? [];
$guide   = $guide ?? [];

/**
 * sections render
 */

include $sectionsPath . "hero.php";
include $sectionsPath . "services.php";
include $sectionsPath . "choose.php";
include $sectionsPath . "reviews.php";
include $sectionsPath . "guide-preview.php";
?>