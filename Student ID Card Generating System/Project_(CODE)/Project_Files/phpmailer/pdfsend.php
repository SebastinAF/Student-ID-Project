<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendpdf($email,$pdf)
{
//Load Composer's autoloader
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '1441fashion2@gmail.com';                     //SMTP username
    $mail->Password   = 'zkqkelgkjomklzaj';                               //SMTP password
    $mail->SMTPSecure = 'ssl'; //SMTP secure
    $mail->Port       = 465;                                 
       

    $mail->setFrom('pkmuthu20022@gmail.com', 'Well Secure Mail');
   //    $mail->setFrom('from@example.com', 'Your Name');..
    $mail->addAddress($email); // Recipient email
   // $mail->addAddress('recipient@example.com', 'Recipient Name');

    $mail->isHTML(true);   
   // Generate OTP
  $otp = generateOTP(); 
  session_start();
  $_SESSION['otp'] = $otp;
  $mail->Subject = 'OTP Verification';
  $mail->Body = '<h1>Well High Secure Mail</h1> <h3>You Have Forgotten Your Password. Please Follow the Password Change Process.<br>Your OTP for verification is: <b>' . $otp . '</b></h3>';
 // $mail->addStringAttachment($pdf, 'document.pdf');
  $mail->addAttachment($pdf);
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}


function  otpverfiction($userotp)
{
  session_start();
  
  if($userotp==$_SESSION['otp'])
  {
    return true;
  }
  else
  {
    return false;
  }
}

?>

