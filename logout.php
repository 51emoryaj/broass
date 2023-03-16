<?php
session_start();
if($_SESSION['usertype'] == "admin" || $_SESSION['staff']){
    include("db.php");
    $conn->query("DELETE FROM `tbl_sessions` WHERE `session_id`='".md5($_SERVER['HTTP_USER_AGENT'])."'");
}
$_SESSION = array();
session_destroy();
@header("location: index.php");
?>