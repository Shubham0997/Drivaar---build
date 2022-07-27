<?php
  $name = $_POST['name'];
  $subject= $_POST['subject'];
  $userEmail = $_POST['email'];
  $phoneNumber =$_POST['phone'];
  $messageSend=$_POST['message'];

$message= "Name : " . $name . "\nEmail: " . $userEmail . "\nPhone Number" . $phoneNumber . "\nSubject : " . $subject . "\nMessage : " . $messageSend ;
//echo $message;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 1;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'testphpmail.shubham@gmail.com';                     //SMTP username
    $mail->Password   = 'yvlvuilyhdlkznbh';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('testphpmail.shubham@gmail.com');

    $mail->addAddress('testphpmail.shubham@gmail.com');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = strip_tags($message);

    $mail->send();
  //  echo 'Message has been sent';
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$newMail = new PHPMailer(true);

try {
    //Server settings
    $newMail->SMTPDebug = 1;                      //Enable verbose debug output
    $newMail->isSMTP();                                            //Send using SMTP
    $newMail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $newMail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $newMail->Username   = 'testphpmail.shubham@gmail.com';                     //SMTP username
    $newMail->Password   = 'yvlvuilyhdlkznbh';                               //SMTP password
    $newMail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $newMail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $newMail->setFrom('testphpmail.shubham@gmail.com');

    $newMail->addAddress($userEmail);     //Add a recipient
$subj= 'Thank you for visiting Drivaar';
$body='<h1>Thank you for visiting Drivaar  <br> </h1> <h2>We have received your message, We will get back to you as soon as possible. <br><br><br><br> </h2> <p> ';

    //Content
    $newMail->isHTML(true);                                  //Set email format to HTML
    $newMail->Subject = $subj;
    $newMail->Body    = $body;
    $newMail->AltBody = strip_tags($body);

    $newMail->send();
   // echo 'Message has been sent';
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>