<?php
session_start();
if(isset($_POST['submit'])){
    include("db.php");
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $name = $_POST['name'];

    $student_no = $_POST['student_no'];
    
    $sql = "SELECT * FROM `tbl_student_no` WHERE `student_no`='$student_no';";
    $query = $conn->query($sql);

    if($query->num_rows > 0){
        $sql = "INSERT INTO `tbl_users` VALUES (NULL, '$name', '$username', '$password', '$student_no');";
        $query = $conn->query($sql);
        if($query){
            echo('<script>alert("Successfully registered! Please login with your credentials!");window.location = "student_login.php";</script>');
            exit();
        } elseif($conn->errno == 1062) {
            echo('<script>alert("Existing user or the Credentials are already used!");window.location = "student_register.php";</script>');
            exit();
        } else {
          die("Error: ".$conn->error);
        }
    } else {
        echo('<script>alert("Student Number doesn\'t exist!");window.location = "student_register.php";</script>');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>User Registration - BROASS</title>
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
                  <h4 class="text-dark mb-4">User Registration</h4>
                </div>
                <form class="user" action="" method="post">
                <div class="mb-3">
                    <input class="form-control form-control-user" type="text" placeholder="Full Name" name="name" required>
                </div>
                <div class="mb-3">
                    <input class="form-control form-control-user" type="email" placeholder="Email Address" name="username" required>
                </div>
                <div class="mb-3 input-group" id="show_hide_password">
                    <input class="form-control form-control-user" type="password" placeholder="Password" name="password" required />
                    <span class="input-group-text" style="border-radius: 0px 10rem 10rem 0px;"><a href="#"><i class="fa fa-eye-slash text-dark fw-bold" aria-hidden="true"></i></a></span>
                  </div>
                <div class="mb-3">
                    <input class="form-control form-control-user" type="text" placeholder="Student Number" name="student_no" required>
                    &nbsp;&nbsp;Forgot Student ID?&nbsp;<a href="request.php" style="text-decoration: none;">request here.</a>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success d-block btn-user w-100 text-light" type="submit" name="submit">Register</button>
                </div>
                </form>
                <div class="mb-3 user d-flex justify-content-center">
                    Already registered?&nbsp;<a href="student_login.php" style="text-decoration:none;">Login here.</a>
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