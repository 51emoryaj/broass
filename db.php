<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'broass';
date_default_timezone_set('Asia/Manila');

$conn = new mysqli($host, $user, $pass, $name);

if ($conn->connect_errno) {
    die("Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error);
}
foreach($_POST as $key => $value){
    $_POST[$key] = trim($value);
    $_POST[$key] = htmlspecialchars($value);
    $_POST[$key] = $conn->real_escape_string($value);
}
?>