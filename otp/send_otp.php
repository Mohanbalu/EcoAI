<?php
require '../config/db.php';
require '../includes/phpmailer/PHPMailerAutoload.php';

$email = $_POST['email'];
$otp = rand(100000, 999999);

$stmt = $pdo->prepare("UPDATE users SET otp_code = ? WHERE email = ?");
$stmt->execute([$otp, $email]);

$mail = new PHPMailer;
$mail->setFrom('your@email.com', 'eCommerce App');
$mail->addAddress($email);
$mail->Subject = "Your OTP Code";
$mail->Body = "Your OTP code is: $otp";

if ($mail->send()) {
    echo "OTP sent!";
} else {
    echo "Error sending OTP.";
}
?>
