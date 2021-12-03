<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';



function envoyer_mail($adresse, $sujet, $message){
    try{
        $mail = new PHPMailer();

        $mail->CharSet = 'UTF-8';
        $mail->Host = 'cantal.o2switch.net';
        $mail->Port = '465';
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure =  PHPMailer::ENCRYPTION_SMTPS;
        $mail->Username = 'contact@mythescontemporains.com';
        $mail->Password = 'wb8UT92feY6mzdY';

        $mail->SetFrom('contact@mythescontemporains.com', 'MYTHES CONTEMPORAINS');
        $mail->AddAddress($adresse);
        $mail->addReplyTo('contact@mythescontemporains.com');
        $mail->isHTML();
        $mail->Subject = utf8_decode($sujet);
        $mail->Body = $message;

        return $mail->send(); 
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
