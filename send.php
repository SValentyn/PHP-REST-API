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

    // Your mail settings
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'your email';
    $mail->Password = 'your password';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('your email', 'Helper'); // Recipient mail address and sender name

    // Message recipient
    $mail->addAddress('your email');
    $mail->isHTML(true);
    $mail->Subject = 'The result of registration on the site';
    $mail->Body = "<b><p>Registration completed successfully!</p></b>";

    if ($mail->send()) {
        echo $msg;
    }
} catch (Exception $e) {
    echo "Send error: {$mail->ErrorInfo}";
}
