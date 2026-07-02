<?php

/**
 * الصفحة الرئيسية - home.php
 * تعمل كـ orchestrator للـ sections فقط
 */

/**
 * 1. جلب بيانات النظام القديم
 */
$data = content('home');

/**
 * 2. دمج بيانات DB (Hero فقط)
 * - إذا موجود من DB نستخدمه
 * - غير ذلك نستخدم القديم
 */
$hero = $GLOBALS['hero_db'] ?? ($data['hero'] ?? []);

/**
 * 3. باقي الأقسام (كما هي)
 */
$services = $data['services'] ?? [];
$choose   = $data['choose'] ?? [];
$reviews  = $data['reviews'] ?? [];
$guide    = $data['guide'] ?? [];
$faq      = $data['faq'] ?? [];

/**
 * 4. مسار السكاشن
 */
$sectionsPath = "pages/includes/sections-home/";

/**
 * 5. ترتيب العرض
 */
include $sectionsPath . "hero.php";
include $sectionsPath . "services.php";
include $sectionsPath . "choose.php";
include $sectionsPath . "reviews.php";
include $sectionsPath . "guide-preview.php";
include $sectionsPath . "faq.php";