<?php

require_once __DIR__ . "/../Services/HomeService.php";

class HomeController
{
    public static function index($conn, $lang)
    {
        return [
            'hero' => HomeService::getHero($conn, $lang),

            'servicesData' => [
                'title' => 'خدماتنا',
                'items' => HomeService::getServices($conn, $lang)
            ],

            'chooseData' => [
                'title' => 'ما الذي يميز بيتهوفن سيتي',
                'items' => HomeService::getChoose($conn, $lang)
            ],

            'reviewsData' => HomeService::getReviews($conn, $lang),

            'guideData' => [
                'title' => 'دليل بيتهوفن',
                'items' => HomeService::getGuide($conn, $lang)
            ],
            'faq' => [
    'title' => 'الأسئلة الشائعة',
    'items' => HomeService::getFaq($conn, $lang)
],
        ];
    }
}