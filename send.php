<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'src/mailer/Exception.php';
require 'src/mailer/SMTP.php';
require 'src/mailer/PHPMailer.php';

$mail = new PHPMailer();

try {
    $msg = "ok";
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth = true;

    // Настройки вашей почты
    $mail->Host = 'smtp.gmail.com'; // SMTP сервера GMAIL
    $mail->Username = 'your email';
    $mail->Password = 'your password';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('your email', 'Helper'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('your email');
    $mail->isHTML(true);
    $mail->Subject = 'Результат регистрации на сайте';
    $mail->Body = "<b><p>Регистрация прошла успешно!</p></b>";

    if ($mail->send()) {
        echo $msg;
    }
} catch (Exception $e) {
    echo "Send error: {$mail->ErrorInfo}";
}
