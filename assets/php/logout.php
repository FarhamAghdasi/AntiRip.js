<?php
// اول از همه  اطلاعاتی که از قبل توسط فرم لاگین به داشبورد فرستاده شده رو به اینجا منتقل میکنیم
session_start();

// اول از همه آرایه مربوط به پاسخ دادن رو راه اندازی میکنیم
$response = array();

// اول برسی میکنه که کاربر لاگین کرد یا نه
if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    // اگه لاگین کرده بیاد سکشنی که لاگین کرده رو پاک کنه و از بین ببره
    $_SESSION = array();

    session_destroy();

    // ارسال پیامی که با موفقیت انجام شد به صورت ajax
    $response['status'] = 'success';
    $response['message'] = 'شما با موفقیت از حساب کاربری خارج شده‌اید.';
} else {
    // ارسال پیام اگه شما وارد حساب کاربری نشده اید 
    // البته این قسمت ممکنه هیچ وقت مواجه نشید چون در خود فایل داشبورد اگه کاربر اصلا لاگین کرده باشه ریداکت میشه به صفحه لاگین
    $response['status'] = 'error';
    $response['message'] = 'شما در حال حاضر وارد حساب کاربری نشده‌اید.';
}

// اینجا هم ارور ها به صورت json فرستاده میشه
header('Content-Type: application/json');
echo json_encode($response);
