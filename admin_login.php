<?php
session_start();
spl_autoload_register(function($class){
    include "system/{$class}.php";

});

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$errorMessage = null;
if(isset($_POST['login'])) {
    $student = new Admin();
    $result = $student->get_admin($_POST['name'], $_POST['password']);

    if(is_array($result)) {
        if(count($result) === 0) {
            echo "Username or password not found";
        } else {
            // user found login here
            $_SESSION['adminId'] = $result[0]['id'];
            $_SESSION['adminName'] = $result[0]['name'];
            $_SESSION['email'] = $result[0]['email'];
            $_SESSION['password'] = $result[0]['password'];



            header('location:admin/index.php');

        }
    }

    $errorMessage = $result;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login V14</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/css/util.css">
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
       <?php  if($errorMessage !== null) {
                                            ?>
                                            <div class="top-margin mt-3">
                                                <div class="alert alert-danger alert-error"> <?php echo $errorMessage; ?> </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
        <form method="post" action="" class="login100-form validate-form flex-sb flex-w">
          <span class="login100-form-title p-b-32">
            Account Login
          </span>

          <span class="txt1 p-b-11">
            Username
          </span>
          <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
            <input class="input100" type="text" name="name" >
            <span class="focus-input100"></span>
          </div>
          
          <span class="txt1 p-b-11">
            Password
          </span>
          <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
            <span class="btn-show-pass">
              <i class="fa fa-eye"></i>
            </span>
            <input class="input100" type="password" name="password" >
            <span class="focus-input100"></span>
          </div>
          
          <div class="flex-sb-m w-full p-b-48">


            <div>
              <a href="#" class="txt3">
                Forgot Password?
              </a>
            </div>
          </div>

          <div class="container-login100-form-btn">
            <input type="submit" name="login" value="Login" class="login100-form-btn">
              
            
          </div>

        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/bootstrap/js/popper.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="assets/js/main.js"></script>

</body>
</html>