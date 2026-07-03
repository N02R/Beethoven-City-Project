<?php

class GlobalService
{
    public static function getGlobalData($page)
    {
        $config = require __DIR__ . "/../../config.php";

        return [
            'nav' => content('navbar'),
            'footer_data' => content('footer'),
            'page_config' => $config['pages'][$page] ?? $config['pages']['404'],
        ];
    }
}