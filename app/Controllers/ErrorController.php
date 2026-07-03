<?php

class ErrorController
{
    public static function index($conn, $lang)
    {
        // ممكن لاحقًا نجيب ترجمة من DB أو ملفات اللغة
        return [
            'page_content' => content('error_404') ?? [
                'title' => 'الصفحة غير متوفرة!',
                'desc' => 'عذراً، الرابط الذي تحاول الوصول إليه غير موجود أو تم نقله.',
                'back_btn' => 'العودة الى الرئيسية'
            ]
        ];
    }
}