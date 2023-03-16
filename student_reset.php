<?php
session_start();
include("db.php");
if(isset($_GET['resetpass'])){
  $email = $_GET['email'];
  $token = $_GET['token'];
  $query = $conn->query("SELECT * FROM `tbl_resetpass` WHERE `email`='$email' AND `token`='$token' AND `usertype`='User'");
  if($query->num_rows > 0){
    if(isset($_POST['submit'])){
        $password = md5($_POST['password']);
        $query = $conn->query("UPDATE `tbl_users` SET `password`='$password' WHERE `username`='$email';");
        if($query){
            $query = $conn->query("DELETE FROM `tbl_resetpass` WHERE `token`='$token'");
            if($query){
                die("<script>alert('Your password has been successfully reset! You can now log in with your new password!');window.location='student_login.php';</script>");
            } else {
                die("Error: ".$conn->error);
            }
        } else {
            die("Error: ".$conn->error);
        }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Student Reset Password - BROASS</title>
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
                  <h4 class="text-dark mb-4">Student Reset Password</h4>
                </div>
                <form class="user" action="" method="post">
                  <div class="mb-3">
                    <input class="form-control form-control-user" type="text" placeholder="Username" name="username" disabled value="<?=$_GET['email'];?>">
                  </div>
                  <div class="mb-3 input-group" id="show_hide_password">
                    <input class="form-control form-control-user" type="password" placeholder="New Password" name="password" required />
                    <span class="input-group-text" style="border-radius: 0px 10rem 10rem 0px;"><a href="#"><i class="fa fa-eye-slash text-dark fw-bold" aria-hidden="true"></i></a></span>
                  </div>
                  <div class="mb-3">
                    <button class="btn btn-success d-block btn-user w-100 text-light" type="submit" name="submit">Reset Password</button>
                  </div>
                </form>
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
<?php }}
?>