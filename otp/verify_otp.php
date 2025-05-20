<?php
require '../config/db.php';

$email = $_POST['email'];
$otp = $_POST['otp'];

$stmt = $pdo->prepare("SELECT otp_code FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && $user['otp_code'] == $otp) {
    $update = $pdo->prepare("UPDATE users SET is_verified = 1 WHERE email = ?");
    $update->execute([$email]);
    echo "Verified!";
} else {
    echo "Invalid OTP.";
}
?>
