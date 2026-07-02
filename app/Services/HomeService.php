<?php

class HomeService
{
    /**
     * ============================
     * HERO
     * ============================
     */
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

    /**
     * ============================
     * SERVICES
     * ============================
     */
    public static function getServices($conn, $lang)
    {
        $stmt = $conn->prepare("
            SELECT title, image, link, alt
            FROM service_items
            WHERE lang = ?
            ORDER BY id ASC
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

    /**
     * ============================
     * CHOOSE
     * ============================
     */
    public static function getChoose($conn, $lang)
    {
        $stmt = $conn->prepare("
            SELECT title, text, image, alt, active
            FROM choose_items
            WHERE lang = ?
            ORDER BY id ASC
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

    /**
     * ============================
     * REVIEWS (FIXED ORDER)
     * ============================
     */
    public static function getReviews($conn, $lang)
    {
        $stmt = $conn->prepare("
            SELECT url, title
            FROM review_videos
            WHERE lang = ?
            ORDER BY id ASC
        ");

        // ✔ الصحيح: bind_param قبل execute
        $stmt->bind_param("s", $lang);
        $stmt->execute();

        $result = $stmt->get_result();

        $videos = [];

        while ($row = $result->fetch_assoc()) {
            $videos[] = $row;
        }

        return [
            'title' => 'شاهد ماذا يقول عملاؤنا عنا',
            'videos' => $videos
        ];
    }

    /**
     * ============================
     * GUIDE
     * ============================
     */
    public static function getGuide($conn, $lang)
    {
        $stmt = $conn->prepare("
            SELECT id, title, excerpt, image
            FROM guide_items
            WHERE lang = ?
            ORDER BY id ASC
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