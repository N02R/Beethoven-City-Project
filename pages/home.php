<?php

$sectionsPath = "pages/includes/sections-home/";

/**
 * ============================
 * SAFE DEFAULTS (View Only)
 * ============================
 */

$hero = $hero ?? [];

$servicesData = $services ?? [
    'title' => '',
    'items' => []
];

$chooseData = $choose ?? [
    'title' => '',
    'items' => []
];

$reviewsData = $reviews ?? [
    'title' => '',
    'videos' => []
];

$guideData = $guide ?? [
    'title' => '',
    'items' => []
];

/**
 * ============================
 * SECTIONS RENDER
 * ============================
 */

include $sectionsPath . "hero.php";
include $sectionsPath . "services.php";
include $sectionsPath . "choose.php";
include $sectionsPath . "reviews.php";
include $sectionsPath . "guide-preview.php";