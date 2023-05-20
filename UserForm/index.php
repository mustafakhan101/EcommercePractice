<?php

require_once("../Config.php");
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="text"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Your Phone Number"/>
                            </div>
                            <div class="form-group">
                                <label for="Adress"><i class="zmdi zmdi-home" aria-hidden="true"></i></label>
                                <input type="text" name="adress" id="adress" placeholder="Your Adress"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form" action="">
                            <div class="form-group">
                                <label for="your_email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="your_email" id="your_email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>


<?php
    if(isset($_POST["signup"])){
        $Name = $_POST["name"];
        $Email = $_POST["email"];
        $Phone = $_POST["phone"];
        $Adress = $_POST["adress"];
        $Password = $_POST["pass"];
        $RePassword = $_POST["re_pass"];

        if ($Password ==  $RePassword) {
            $Insert_query = "INSERT INTO `tbl_user`(`Name`, `Email`, `Phone`, `Adress`, `Password`) 
            VALUES ('$Name','$Email','$Phone','$Adress','$Password')";
            $Run_query = mysqli_query($conn,$Insert_query);

            if ($Run_query == true) {
                echo 
                    "<script>
                            alert('You are Registered Successfully')
                    </script>";
            } 
            else{
                echo mysqli_error($conn);
            }
            
     
            
        } else {
            echo 
                "<script>
                        alert('Something Went Wrong!')
                        window.location.href='Index.php'
                </script>";
        }
        
    }

    if(isset($_POST["signin"])){

      $SignIn_Email = $_POST["your_email"];  
      $SignIn_Password = $_POST["your_pass"]; 

      $Select_SignIn = "SELECT * FROM `tbl_user` WHERE Email = '$SignIn_Email' and Password = '$SignIn_Password' ";
      $Run_SignIn = mysqli_query($conn,$Select_SignIn);
      $Count_SignIn = mysqli_num_rows($Run_SignIn);
      if ($Count_SignIn == 1) {
        $Convert_Array = mysqli_fetch_array($Run_SignIn);
        $_SESSION["name"] = $Convert_Array[1];
        echo
            "<script>
                window.location.href = '../Usertheme/Index.php'
            </script>";
       
      } else {
        echo
        "<script>
            alert('Invalid Credentials')
        </script>";
      }
      
    }


?>


    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>