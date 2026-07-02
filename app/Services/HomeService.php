<?php

class HomeService
{
    public static function getHero($conn, $lang)
    {
        $stmt = $conn->prepare("
            SELECT title_text, description, button_text, button_link, image
            FROM pages
            WHERE slug = 'home_hero' AND lang = ?
        ");

        $stmt->bind_param("s", $lang);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc() ?? [];
    }

    public static function getServices($conn, $lang)
    {
        $stmt = $conn->prepare("
            SELECT title, image, link, alt
            FROM service_items
            WHERE lang = ?
        ");

        $stmt->bind_param("s", $lang);
        $stmt->execute();

        $result = $stmt->get_result();

        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }

        return $items;
    }

    public static function getChoose($conn, $lang)
    {
        $stmt = $conn->prepare("
            SELECT title, text, image, alt, active
            FROM choose_items
            WHERE lang = ?
        ");

        $stmt->bind_param("s", $lang);
        $stmt->execute();

        $result = $stmt->get_result();

        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }

        return $items;
    }
}