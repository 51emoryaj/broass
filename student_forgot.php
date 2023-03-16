<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require("./vendor/autoload.php");
if(isset($_POST['submit'])){
    include("db.php");
    $email = $_POST['email'];
    $query = $conn->query("SELECT * FROM `tbl_users` WHERE `username`='$email';");
    if($query->num_rows > 0){
      $token = md5(base64_encode(md5($email.uniqid())));
      $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/student_reset.php?resetpass&token='.$token.'&email='.$email;
      $body = "
      Dear User,<br><br>
      We have received a request to reset your password. To reset your password, please click the link below:<br><br>
      To get started, please click the link below to login to your account:<br><br>
      <a href='$url' target='_blank'>$url</a><br><br>
      If you did not make this request, please ignore this email.
      <br><br>
      Thank you,<br><br>
      BROASS
      ";
      $subject = "Reset Your Password";
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
      $mail->AddAddress($email);
      if(!$mail->Send()){
          die("PHPMailer Error: ".$mail->ErrorInfo);
      } else {
        $query = $conn->query("INSERT INTO `tbl_resetpass` VALUES (NULL, '$email', '$token', 'User')");
        if($query){
          die("<script>alert('Please check your email inbox or spam folder to reset your password.');window.location='student_login.php';</script>");
        } else {
          die("Error: ".$conn->error);
        }
      }
    } else {
      die("<script>alert('There\'s no user registered with that email!');window.location='student_forgot.php';</script>");
    }
    
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Student Forgot Password - BROASS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel='icon' href='favicon.ico' type='image/x-icon'> 
    <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <script src="./assets/js/jquery-3.6.0.min.js"></script>
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
                  <h4 class="text-dark mb-4">Student Forgot Password</h4>
                </div>
                <form class="user" action="" method="post">
                <div class="mb-3">
                    <input class="form-control form-control-user" type="email" placeholder="Email Address" name="email" required>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success d-block btn-user w-100 text-light" type="submit" name="submit">Send Reset Password Link</button>
                </div>
                </form>
                <div class="mb-3 user d-flex justify-content-center">
                    Already remembered?&nbsp;<a href="student_login.php" style="text-decoration:none;">Login here.</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    });
    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
  </body>
</html>