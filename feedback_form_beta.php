<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './class/phpmailer/src/Exception.php';
require './class/phpmailer/src/PHPMailer.php';
require './class/phpmailer/src/SMTP.php';

$email_address = $_POST['email_address'];
$subject = $_POST['feedback_type'];
if ($subject == 1) {
    $subjectp2 = $_POST['app_select'];
    $subject = "App";
}
else if ($subject == 2) {
    $subjectp2 = $_POST['web_select'];
    $subject = "Web";
} else
    $subjectp2 = NULL;
$object = $_POST['object'];
$feedback = $_POST['feedback'];

$mail = new PHPMailer(true);

//Working from sleewell account
try {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 1;
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sleewell@outlook.fr';
    $mail->Password = 'ablangejgygqzgia';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('sleewell@outlook.fr', 'Sleewell');
    $mail->addAddress('contact@sleewell.fr');
    $mail->Subject = 'Beta test message: '.$subject."  ".$subjectp2;
    $mail->Body = "User mail: ".$email_address."\n\nTitle:".$object."\n\n".$feedback;
    $mail->CharSet = 'UTF-8';
    $mail->send();
    header("Location:index.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>