<?php
session_start();
if(isset($_SESSION["username"])) {
    header("location: dashboard.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/auth.js"></script>
</head>
<body>
    <div class="main">
        <div id="lottie"></div>
        <div class="form">
            <div class="form-wrapper">
            <div class="tabs">
                <div onclick="toggleAuth(this.className)" class="login-tab"> SIGN IN</div>
                <div onclick="toggleAuth(this.className)" class="register-tab">SIGN UP</div>
            </div>

            <!--Sign Up form-->
            <form class="sign-up-form" action="">
                <div class="header">SIGN UP</div>
                
                <div class="input-div">
                    <input class="input-field" onkeyup="validateFname()" id="fname-field" name="fname" type="text" required>
                    <p class="input-label">First Name</p>
                    <p class="fname-error"></p>
                </div>

                <div class="input-div">
                    <input class="input-field" onkeyup="validateLname()" name="lname" id="lname-field" type="text" required>
                    <p class="input-label">Last Name</p>
                    <p class="lname-error"></p>
                </div>

                <div class="input-div">
                    <input class="input-field" onkeyup="validateEmail()" name="email" id="email-field" type="text" required>
                    <p class="input-label">Email</p>
                    <p class="email-error"></p>
                </div>


                <div class="input-div">
                    <input class="input-field" onkeyup="validatePassword1()" name="pass1" id="pass1-field" type="password" required>
                    <p class="input-label">Password</p>
                    <p class="pass1-error"></p>
                </div>



                <div class="input-div">
                    <input class="input-field" name="pass2" onkeyup="validatePassword2()" id="pass2-field" type="password" required>
                    <p class="input-label">Confirm Password</p>
                    <p class="pass2-error"></p>
                </div>

                <div class="cta">
                    <button type="button" onclick="signUp();return false" name="sign-up-btn">Sign Up</button>
                </div>

                <div class="switch">
                <p>Already have an account? <a href="#" onclick="toggleAuth(this.className)" class="sign-in-bottom">Sign In</a></p>
            </div>

            </form>


            <!--Sign In form-->
            <form class="sign-in-form" action="">
                <div class="header">SIGN IN</div>

                <div class="input-div">
                    <input class="input-field" name="email" type="text" required>
                    <p class="input-label" >Email</p>
                </div>


                <div class="input-div">
                    <input onkeydown="toggleForgotPassword()" name="pass3" id="pass" class="input-field" type="password" required>
                    <p class="input-label">Password</p>
                    <a href="#" class="forgot-label">Forgot password?</a>
                </div>

                <div class="remember-me">
                    <span>Keep me logged in</span>
                    <input id="remember" value="Y" name="keep" type="checkbox">
                </div>

                <div class="social-media">
                    <div id="lottie1"></div>
                    <div id="lottie2"></div>
                </div>

                <div class="cta">
                    <button type="button" onclick="signIn();return false">Sign In</button>
                </div>

                <div class="switch">
                <p>Don't have an account? <a href="#" onclick="toggleAuth(this.className)" class="sign-up-bottom">Sign Up</a></p>
            </div>

            </form>
        </div>
    </div>
    </div>
</body>

<script src="js/lottie/lottie.js"></script>
<script src="js/index.js"></script>
</html>