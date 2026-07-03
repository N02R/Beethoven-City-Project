<?php

require_once __DIR__ . "/../Services/HomeService.php";

class HomeController
{
    public static function index($conn, $lang)
    {
        return [
            /**
             * ============================
             * HERO
             * ============================
             */
            'hero' => HomeService::getHero($conn, $lang),

            /**
             * ============================
             * SERVICES
             * ============================
             */
            'services' => [
                'title' => 'خدماتنا',
                'items' => HomeService::getServices($conn, $lang)
            ],

            /**
             * ============================
             * CHOOSE
             * ============================
             */
            'choose' => [
                'title' => 'ما الذي يميز بيتهوفن سيتي',
                'items' => HomeService::getChoose($conn, $lang)
            ],

            /**
             * ============================
             * REVIEWS
             * ============================
             */
            'reviews' => HomeService::getReviews($conn, $lang),

            /**
             * ============================
             * GUIDE
             * ============================
             */
            'guide' => [
                'title' => 'دليل بيتهوفن',
                'items' => HomeService::getGuide($conn, $lang)
            ],

            /**
             * ============================
             * FAQ
             * ============================
             */
            'faq' => [
                'title' => 'الأسئلة الشائعة',
                'items' => HomeService::getFaq($conn, $lang)
            ],
        ];
    }
}