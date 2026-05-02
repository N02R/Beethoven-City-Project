<?php
/**
 * send_consult.php 
 * معالج نموذج الاستشارة - مشروع بيتهوفن سيتي
 */

// بدء الجلسة لتخزين رسائل النجاح أو الخطأ
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. استقبال وتطهير البريد الإلكتروني
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // 2. التحقق من صحة تنسيق الإيميل
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // إعدادات البريد
        $to = "info@Beethoven-City-Services.com"; 
        $subject = "New Consultation Request - Beethoven City";
        $message = "You have received a new request from: " . $email . "\n";
        $message .= "Date: " . date("Y-m-d H:i:s");
        $headers = "From: noreply@beethoven-city-services.com\r\n";
        $headers .= "Reply-To: " . $email;

        // 3. فحص البيئة (Localhost أم Server حقيقي)
        $is_localhost = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);

        if ($is_localhost) {
            // نحن على الجهاز الشخصي: محاكاة النجاح لتجربة الرسالة الخضراء
            $_SESSION['form_status'] = 'success';
        } else {
            // نحن على السيرفر الحقيقي: محاولة إرسال إيميل فعلي
            if (mail($to, $subject, $message, $headers)) {
                $_SESSION['form_status'] = 'success';
            } else {
                $_SESSION['form_status'] = 'error';
            }
        }

    } else {
        // حالة الإيميل غير صالح (تنسيق خاطئ)
        $_SESSION['form_status'] = 'invalid';
    }
    
    // 4. العودة لصفحة الـ home مع قفزة تلقائية لمكان الفورم
    header("Location: ../index.php?page=home#consult-email");
    exit();

} else {
    // منع الوصول المباشر للملف عبر الرابط
    header("Location: ../index.php");
    exit();
}