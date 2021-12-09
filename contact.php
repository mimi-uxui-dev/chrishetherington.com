<?php
 require_once "Mail.php";
 
 $from = "Contact Form <info@chetherington.com>";
 $to = "Chris <info@chrishetherington.com>";
 $subject = "Message from Contact Form!";
 $body = "Hi,\n\nHow are you?";
 
 $host = "chrishetherington.com.";
 $username = "info@chrishetherington.com";
 $password = ".G~Z@%r$8MoP";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
 ?>
