<?php
session_start();
if(isset($_POST['submit'])){
    include("db.php");
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM `tbl_users` WHERE `username` = '$username' AND `password` = '$password';";
    $query = $conn->query($sql);
    $row = $query->fetch_array();

    if($query->num_rows != 0){
        $_SESSION['name'] = $row['name'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['student_no'] = $row['student_no'];
        $_SESSION['user_session'] = md5(uniqid().$row['name'].uniqid());
        $_SESSION['usertype'] = "user";
        $session = md5($_SERVER['HTTP_USER_AGENT']);
        $conn->query("INSERT INTO `tbl_sessions` VALUES (NULL, '".$_SESSION['username']."', '".$_SESSION['usertype']."', '$session')");
        @header("Location: user/index.php");
        exit();
    } else {
        echo('<script>alert("Wrong username or password!");window.location = "student_login.php";</script>');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>User Login - BROASS</title>
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
                  <h4 class="text-dark mb-4">User Login</h4>
                </div>
                <form class="user" action="" method="post">
                  <div class="mb-3">
                    <input class="form-control form-control-user" type="text" placeholder="E-mail address" name="username" required>
                  </div>
                  <div class="mb-3 input-group" id="show_hide_password">
                    <input class="form-control form-control-user" type="password" placeholder="Password" name="password" required />
                    <span class="input-group-text" style="border-radius: 0px 10rem 10rem 0px;"><a href="#"><i class="fa fa-eye-slash text-dark fw-bold" aria-hidden="true"></i></a></span>
                  </div>
                  <div class="mb-3">
                    <button class="btn btn-success d-block btn-user w-100 text-light" type="submit" name="submit">Login</button>
                  </div>
                </form>
                <div class="mb-3 user d-flex justify-content-center">
                    Forgot your password?&nbsp;<a href="student_forgot.php" style="text-decoration:none;">Click here.</a>
                </div>
                <div class="mb-3 user d-flex justify-content-center">
                    Doesn't have an account?&nbsp;<a href="student_register.php" style="text-decoration:none;">Register here.</a>
                </div>
                <!-- <div class="mb-3 user d-flex justify-content-center">
                    <a href="index.php" style="text-decoration:none;">Admin Login</a>
                </div> -->
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