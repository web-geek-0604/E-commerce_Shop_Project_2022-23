<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('phpmailer/includes/PHPMailer.php');
require('phpmailer/includes/SMTP.php');
require('phpmailer/includes/Exception.php');

$email = $_POST['email'];
$ime = $_POST['ime'];
$naslov = $_POST['naslov'];
$poruka = $_POST['poruka'];
$telefon = $_POST['telefon'];

if(isset($_POST['send'])){
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port = "587";
$mail->Username = "gwarehouse.itshop@gmail.com";
$mail->Password = "ugxzgrmfwmxovhmi";
$mail->isHTML(true);
$mail->Subject = $naslov;
$mail->setFrom($email, $ime);
$mail->Body = $poruka;
$mail->addAddress("gwarehouse.itshop@gmail.com", "Admin");
$mail->addReplyTo($_POST['email'], $_POST['name']);
$mail->send();
  echo "<script>alert('Forma je uspešno prosleđena. Administartor će Vas kontaktirati u što kraćem vremenu.');
  document.location.href = 'contact_page.php';
  </script>";
}
?>