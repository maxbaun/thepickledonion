﻿<?php
/*
* Bistecca
* Copyright 2013, Simplicix Media
* www.simplicix.com
* 4/1/2013
*/


/* #Configuration
================================================== */
$to	 		= "info@murphyspubsalem.com"; 				// Your email
$owner	 	= "Murphys Pub Salem"; 					// Your name
$subject	= "Murphys Salem // Website Contact Form";	// Email Subject

// Some text in the email's footer
$copy		= "<br><br> ~ This email was sent from http://www.murphyspubsalem.com";

/* #Form Values
================================================== */
$name = trim(htmlspecialchars($_POST['name']));
$email = $_POST['email'];
$comments = htmlspecialchars($_POST['comments']) . $copy;

// Success message
$congrats 	= "Congratulations, " . $name . ". We've received your email. We'll be in touch as soon as we possibly can!";

/* #PHP Mailer
================================================== */
require_once 'class.phpmailer.php';

$mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch

try {
  $mail->SetFrom($email, $name);
  $mail->AddReplyTo($email, $name);
  $mail->AddAddress($to, $owner);
  $mail->Subject = $subject;
  //$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML($comments);
  
  $mail->Send();
  
  // Congrats message
  echo $congrats;
  
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}


?>