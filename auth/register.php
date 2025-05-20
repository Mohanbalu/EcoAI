<?php
require '../config/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)");
if ($stmt->execute([$name, $email, $password])) {
    header("Location: ../otp/send_otp.php?email=$email");
} else {
    echo "Registration failed.";
}
?>
