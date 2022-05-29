<?php
  session_start();
  require('./config/query.php');
  if(isset($_POST['login']) && $_POST['login']=='Login'){
    $result=$obj->Select("tlb_superadmin","*","email",$_POST['email']," AND password='".md5($_POST['password'])."'");
    $row=mysqli_fetch_assoc($result);
    // print_r($row);
    // die();
    $row=mysqli_num_rows($result);
    if($row>0){
      $_SESSION['login']="granted";
      $_SESSION['email']=$row['email'];
      $_SESSION['password']=$row['password'];

      header("Location:index.php");
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LOGIN FORM</title>
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="assets/css/fonts.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/stacckpath.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
 <script>
 function form()
 {
  var val = document.getElementById('email').value;
            if (val == '' | null) {
                document.getElementById('emailError').innerHTML = 'Email is required!';
                return false;
            } else {
                document.getElementById('emailError').innerHTML = '';
            }

  var val = document.getElementById('password').value;
            if (val == '' | null) {
                document.getElementById('passwordError').innerHTML = 'Password is required!';
                return false;
            } else {
                document.getElementById('passwordError').innerHTML = '';
            }

 } 
 </script>
</head>
<body>
  <main>
    <div class="container-fluid">
    
      <div class="row">
        <div class="col-sm-6 login-section-wrapper" style="background-color: pink ;">
          <div class="brand-wrapper">
            <!-- <img src="logo.jpg" alt="logo" class="logo"> -->
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Admistration Log in</h1>
            <form action="" method="post" onsubmit="return form()">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
                <a style="color:black;" id="emailError"></a>
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="enter your passsword">
                <a style="color:black;" id="passwordError"></a>
              </div>
              <input name="login" id="login" class="btn btn-block login-btn" type="submit" value="Login">
            </form>
            <a href="../sis/admin.php">STUDENT LOGIN PAGE</a>
            <!-- <a href="#!" class="forgot-password-link">Forgot password?</a>
            <p class="login-wrapper-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p> -->
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/images/building.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
