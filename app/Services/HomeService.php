<?php

class HomeService
{
    // =========================
    // HERO
    // =========================
    public static function getHero($conn, $lang)
    {
        $stmt = $conn->prepare("
            SELECT title_text, description, button_text, button_link, image, alt_text
            FROM pages
            WHERE slug = 'home_hero' AND lang = ?
        ");

        $stmt->bind_param("s", $lang);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc() ?? [];
    }

    // =========================
    // SERVICES
    // =========================
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
}