<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
/*require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php'; */

if (isset($_POST['signup'])) {
    $name = htmlentities($_POST['full_name']);
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);

    $message = "Thank you " . $name . " for making an account with Bag Trunkz";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "ajani.ayiera@strathmore.edu";
        $mail->Password = "ktfs ykwc rhwc crqe";
        $mail->Port = 587; 
        $mail->SMTPSecure = "tls"; 
        $mail->isHTML(true);
        $mail->setFrom("ajani.ayiera@strathmore.edu");
        $mail->addAddress($email, $name);
        $mail->Subject = "Registration";
        $mail->Body = $message;

        if ($mail->send()) {
            echo 'Message has been sent';
        } else {
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>