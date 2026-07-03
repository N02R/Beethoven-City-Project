<?php

$sectionsPath = "pages/includes/sections-home/";

/**
 * ============================
 * PAGE DATA (SAFE ACCESS)
 * ============================
 */

$pageData = $pageData ?? [];

/**
 * HERO
 */
$hero = $pageData['hero'] ?? [];

/**
 * SERVICES
 */
$servicesData = [
    'title' => $pageData['services']['title'] ?? 'خدماتنا',
    'items' => $pageData['services']['items'] ?? []
];

/**
 * CHOOSE
 */
$chooseData = [
    'title' => $pageData['choose']['title'] ?? 'ما الذي يميزنا',
    'items' => $pageData['choose']['items'] ?? []
];

/**
 * REVIEWS
 */
$reviewsData = $pageData['reviews'] ?? [
    'title' => 'آراء العملاء',
    'videos' => []
];

/**
 * GUIDE
 */
$guideData = [
    'title' => $pageData['guide']['title'] ?? 'الدليل',
    'items' => $pageData['guide']['items'] ?? []
];

/**
 * FAQ (NEW SECTION)
 */
$faqData = [
    'title' => $pageData['faq']['title'] ?? 'الأسئلة الشائعة',
    'items' => $pageData['faq']['items'] ?? []
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
include $sectionsPath . "faq.php";