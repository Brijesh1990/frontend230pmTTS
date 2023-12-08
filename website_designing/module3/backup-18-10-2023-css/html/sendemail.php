<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create an instance; passing `true` enables exceptions
if(isset($_POST["send"]))
{
try {

$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$subject=$_POST["subject"];
$message=$_POST["message"];

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$mail = new PHPMailer(true);

//Server settings
    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'brijeshpandey.tops@gmail.com';                     //SMTP username
    $mail->Password   = 'vhro gezm zycn pevd';                               //SMTP password
    $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($_POST["email"], 'users details');
    $mail->addAddress('brijeshpandey.tops@gmail.com', 'contact us');     //Add a recipient
    
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contact details enquiry of Customers';
    $mail->Body    = "Name is :".$name."<br>"."Email is :".$email."<br>"."Phone is :".$phone."<br>"."Subject is :".$subject."<br>"."Message is :".$message."<br>";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<script>
    alert('Thanks for contact with us we will contact with you soon')
    window.location='successendemail.html';
    </script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}