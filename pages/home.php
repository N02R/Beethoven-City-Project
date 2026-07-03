<?php

$sectionsPath = "pages/includes/sections-home/";

/**
 * بيانات الصفحة (View Only)
 */
$hero = $pageData['hero'] ?? [];

$servicesData = $pageData['services']['items'] ?? [];
$chooseData   = $pageData['choose']['items'] ?? [];
$reviewsData  = $pageData['reviews'] ?? [];
$guideData    = $pageData['guide']['items'] ?? [];

/**
 * Sections
 */
include $sectionsPath . "hero.php";
include $sectionsPath . "services.php";
include $sectionsPath . "choose.php";
include $sectionsPath . "reviews.php";
include $sectionsPath . "guide-preview.php";