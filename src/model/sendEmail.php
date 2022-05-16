<?php
//sendEmail.php uses PHPMailer to build and send an email to the new user with the activation code and a link to the page used to enter the code
//All the code is taken from https://github.com/PHPMailer/PHPMailer

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail = new PHPMailer;

    $mail->SMTPDebug = 2;                                 // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'wishabirthday12@gmail.com';        // SMTP username
    $mail->Password = 'Super1213';                        // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->From = 'wishabirthday12@gmail.com';
    $mail->FromName = 'WishABirthday';
    $mail->addAddress($_POST['Email'], $_POST['Firstname']);  // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Email de confirmation';
    $mail->Body    = "<a href='http://localhost/wishabirthday/src/index.php?uc=activate&action=show&email=" . $_POST['Email'] . "'>Activer</a><br><p>" . $_SESSION['ActivationCode'] . "</p>";
    $mail->AltBody = "";

    header('Location: index.php?uc=home'); //Redirect to home page

    $mail->send(); //This is put after the header because outputs before an header make the latter don't work

    exit;

} catch (Exception $e) {

}


?>