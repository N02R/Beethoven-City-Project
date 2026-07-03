<?php

require_once __DIR__ . "/../Services/HomeService.php";

class HomeController
{
    public static function index($conn, $lang)
    {
        return [
            'hero' => HomeService::getHero($conn, $lang),

            'services' => [
                'title' => 'خدماتنا',
                'items' => HomeService::getServices($conn, $lang)
            ],

            'choose' => [
                'title' => 'ما الذي يميز بيتهوفن سيتي',
                'items' => HomeService::getChoose($conn, $lang)
            ],

            'reviews' => HomeService::getReviews($conn, $lang),

            'guide' => [
                'title' => 'دليل بيتهوفن',
                'items' => HomeService::getGuide($conn, $lang)
            ],
        ];
    }
}