<?php
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendmail($name, $email, $senderSubject, $senderMessage){
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                   // Enable verbose debug output
        $mail->isSMTP();                                        // Set mailer to use SMTP
        $mail->Host = 'smtp.sendgrid.net';                      // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                 // Enable SMTP authentication
        $mail->Username = 'apikey';                             // SMTP username
        $mail->Password = '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';                                                    // SMTP password
        $mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                      // TCP port to connect to

        //Recipients
        $mail->setFrom('sword@imran.dx.am', 'Bibliothecam');
        $mail->addAddress($email, $name);                       // Add a recipient
        

        $mail->isHTML(true);                                    // Set email format to HTML
        $mail->Subject = $senderSubject;
        $mail->Body    = $senderMessage;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

?>