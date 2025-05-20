<?php
require '../config/db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password_hash'])) {
    if ($user['is_verified']) {
        echo "Login successful!";
        // Placeholder for 2FA redirection
    } else {
        echo "Please verify your email via OTP.";
    }
} else {
    echo "Invalid login credentials.";
}
?>
