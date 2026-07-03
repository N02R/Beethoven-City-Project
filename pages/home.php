<?php

$sectionsPath = "pages/includes/sections-home/";

/**
 * ============================
 * SAFE PAGE DATA
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
$services = $pageData['services'] ?? [];
$servicesData = [
    'title' => $services['title'] ?? 'خدماتنا',
    'items' => $services['items'] ?? []
];

/**
 * CHOOSE
 */
$choose = $pageData['choose'] ?? [];
$chooseData = [
    'title' => $choose['title'] ?? 'ما الذي يميزنا',
    'items' => $choose['items'] ?? []
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
$guide = $pageData['guide'] ?? [];
$guideData = [
    'title' => $guide['title'] ?? 'الدليل',
    'items' => $guide['items'] ?? []
];

/**
 * FAQ
 */
$faq = $pageData['faq'] ?? [];
$faqData = [
    'title' => $faq['title'] ?? 'الأسئلة الشائعة',
    'items' => $faq['items'] ?? []
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