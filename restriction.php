<?php
session_start();
if (!isset($_SESSION["user_session"])) {
    header("location: ../index.php"); 
    exit();
}
?>