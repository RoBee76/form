<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'pass.php';
include 'config.php';
//require 'phpmailer/src/Exception.php';
//require 'phpmailer/src/PHPMailer.php';
//require 'phpmailer/src/SMTP.php';

//include '//home/oberding/basic/pass.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/elsophp/phpmailer/src/Exception.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/elsophp/phpmailer/src/PHPMailer.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/elsophp/phpmailer/src/SMTP.php';

$date = new DateTime('now', new DateTimeZone('Europe/Budapest'));
$dateHU = gmdate('Y-m-d') ." " .$date->format('H:i');


if(isset($_POST["send"])) {
  if ( empty( $_POST['email'] ) ) {
      echo
        "
        <script>
        alert('Az email cím nem lehet üres !');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
          $date = $dateHU;
          $name = $_POST['name'];
          $email_to = $_POST['email'];
          $subjectMySQL = "Érdeklődés érkezett";
          $subject = '=?UTF-8?B?'.base64_encode($subjectMySQL).'?=';
          $message = $_POST['message'];


        $sql = "INSERT INTO email (date, name, email_to, subject, message) VALUES ('$date', '$name', '$email_to', '$subjectMySQL', '$message')";
        
        mysqli_query( $db4, $sql, );
  
  $mail = new PHPMailer(true);
  
  $mail->isSMTP ();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = $username;
  $mail->Password = $pass;
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  
  $mail->setFrom('oberding.m@gmail.com');
  $mail->addAddress($_POST["email"]);
  $mail->isHTML(true);
  
  $mail->Subject = $subject;
  $mail->Body = $_POST["message"];
  
  $mail->send();
  
  echo
    "
    <script>
    alert('Küldés sikeres');
    document.location.href = 'index.php';
    </script>
    ";
  }
}
?>