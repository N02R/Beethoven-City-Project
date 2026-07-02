<?php

class HomeService
{
    public static function getHero($conn, $lang)
    {
        $slug = 'home_hero';

        $stmt = $conn->prepare("
            SELECT * FROM pages 
            WHERE slug = ? AND lang = ?
        ");

        $stmt->bind_param("ss", $slug, $lang);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public static function getServices($conn, $lang)
    {
        $stmt = $conn->prepare("
            SELECT * FROM service_items 
            WHERE lang = ?
        ");

        $stmt->bind_param("s", $lang);
        $stmt->execute();

        $result = $stmt->get_result();

        $services = [];
        while ($row = $result->fetch_assoc()) {
            $services[] = $row;
        }

        return $services;
    }
}