<?php
$host = 'localhost';
$db = 'Eco-AI';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    die("DB connection failed: " . $e->getMessage());
}
?>
