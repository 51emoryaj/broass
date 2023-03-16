<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require("./vendor/autoload.php");
if(isset($_POST['submit'])){
    include("db.php");
    $username = $_POST['username'];
    $name = $_POST['name'];

    $body = "Dear Administrator,<br>
    This is an automated message in response to a student's request for a Student ID. Here are provided information for the student's request to be processed.<br><br>
    Name: $name<br>
    Email/Username: $username<br><br>
    Once you're about to process this request, kindly email the student with the provided email address.<br><br>
    Thank you,<br><br>
    BROASS";
    $subject = "Student ID Request";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->Host = "smtp.gmail.com"; 
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Username   = "broassramos@gmail.com";
    $mail->Password   = "byxaqggqqnfsynmp";
    $mail->IsHTML(true);
    $mail->From       = "noreply@broassramos.com";
    $mail->FromName   = "BROASS System";
    $mail->Sender     = "noreply@broassramos.com";
    $mail->Subject    = $subject;
    $mail->Body       = $body;
    $mail->AddAddress("broassramos@gmail.com");
    if(!$mail->Send()){
        die("PHPMailer Error: ".$mail->ErrorInfo);
    } else {
        echo("<script>alert('Request sent! We will email you your Student ID.');window.location='student_register.php'</script>");
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Request Student ID - BROASS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel='icon' href='favicon.ico' type='image/x-icon'> 
    <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
  </head>
  <body class="bg-gradient-success">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body">
              <div class="p-5">
                <div class="text-center">
                  <img src="assets/img/logo.png" style="width:100%" class="img-responsive"/>
                  <br>
                  <br>
                  <h4 class="text-dark mb-4">Request Student ID</h4>
                </div>
                <form class="user" action="" method="post">
                <div class="mb-3">
                    <input class="form-control form-control-user" type="text" placeholder="Full Name" name="name" required>
                </div>
                <div class="mb-3">
                    <input class="form-control form-control-user" type="email" placeholder="Email Address" name="username" required>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success d-block btn-user w-100 text-light" type="submit" name="submit">Request</button>
                </div>
                </form>
                <div class="mb-3 user d-flex justify-content-center">
                    Already have a student ID?&nbsp;<a href="student_register.php" style="text-decoration:none;">Register here.</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
  </body>
</html>