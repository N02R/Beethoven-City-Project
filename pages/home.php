<?php

$sectionsPath = "pages/includes/sections-home/";

/**
 * تمرير البيانات من HomeService
 * (يجب أن تكون جاهزة من index.php)
 */

if (!isset($hero)) $hero = [];
if (!isset($services)) $services = [];
if (!isset($choose)) $choose = [];
if (!isset($reviews)) $reviews = [];
if (!isset($guide)) $guide = [];

/**
 * عرض السكاشن
 */

include $sectionsPath . "hero.php";
include $sectionsPath . "services.php";
include $sectionsPath . "choose.php";
include $sectionsPath . "reviews.php";
include $sectionsPath . "guide-preview.php";
?>