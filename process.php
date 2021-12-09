<?php
require 'mailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

//$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'chrishetherington';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@chrishetherington.com';                 // SMTP username
$mail->Password = 'j#n#.?.b,R!6';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('info@chrishetherington.com', 'contact-us');
$mail->addAddress('chris@jdc.media');     // Add a recipient
$mail->addReplyTo($_POST['email']);
foreach ($_FILES["attachment"]["name"] as $k => $v) {
    $mail->AddAttachment( $_FILES["attachment"]["tmp_name"][$k], $_FILES["attachment"]["name"][$k] );
}
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Received New Email!";
$mail->Body    = "Name: ".$_POST['name']."<br>Email: ".$_POST['email']."<br>Message: ".$_POST['message']."";

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   	echo'<div class="alert alert-success" style="color:green;"><strong>Your message has been sent successfully!</strong></div>';
	 echo'<script>$("#reset")[0].reset()</script>';
}
