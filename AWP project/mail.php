<!doctype html>
<?php
session_start();
?>
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/src/POP3.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'romain.muckenhirn@gmail.com';                     // SMTP username
    $mail->Password   = 'MUCKENHIRNdu22400!!';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('romain.muckenhirn@gmail.com', 'Mailer');
    $mail->addAddress($_SESSION["email"], 'Joe User');     // Add a recipient             // Name is optional
    $mail->addReplyTo('romain.muckenhirn@gmail.com', 'Information');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    //$mail->Body    = "Total price is" . $_SESSION["total1"] . ".<br>";
    $mail->Body    = "Total price is <br>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
  header("Location: http://localhost/okshop.php");}
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
