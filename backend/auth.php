<?php
include "databaseConnection.php";
session_start();

//Sign Up User
if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["pass1"]) && isset($_POST["pass2"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password1 = $_POST["pass1"];
    $password2 = $_POST["pass2"];

    //Validate
    if (
        $password1 == $password2 && preg_match('/^[a-zA-Z]+[a-zA-Z0-9 ]*$/', $fname)
        && preg_match('/^[a-zA-Z]+[a-zA-Z0-9 ]*$/', $fname) && strlen($fname) >= 3 && strlen($lname) >= 3 && preg_match('/^(?=.*[0-9])(?=.*[A-Z]).{8,}$/', $password1)
    ) {
    $password = md5($password1);
    //Check if user already exists
    $check_user = "SELECT * FROM users WHERE email = '$email'";
    $check_user_result = $conn->query($check_user);
    if($check_user_result->num_rows == 0) {
        //Register User
        $register = "INSERT INTO users(fname, lname, email, password) VALUES('$fname', '$lname', '$email', '$password')";
        if($conn->query($register)) {
            $_SESSION["username"] = $fname." ".$lname;
            $_SESSION["email"] = $email;
            $_SESSION["status"] = "logged_in";
            echo "user registered";
        
        } else {
            echo $conn->error;
        }
    } else {
        echo "User is already registered";
    }

    } else {
        echo "wrong";
    }
 
}

//Sign In User
if(isset($_POST["email"]) && isset($_POST["pass3"])) {
    $email = $_POST["email"];
    $password = md5($_POST["pass3"]);
    $rememberUser = $_POST["rememberUser"];
    
    //Check if user exists
    $check_user = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
    $check_user_result = $conn->query($check_user);
    if($check_user_result->num_rows > 0) {
        while($userData = $check_user_result->fetch_assoc()) {
            $fname = $userData["fname"];
            $lname = $userData["lname"];
        }
        $_SESSION["username"] = $fname." ".$lname;
        $_SESSION["email"] = $email;
        $_SESSION["status"] = "logged_in";
        if($rememberUser == "Y") {
            setcookie("email", $email, time()+604800, "/");
            setcookie("password", $password, time()+604800, "/");
            echo "success";
        } else {
            echo "success";
        }
        
    } else {
        echo "Incorrect email/password";
    }
}


?>