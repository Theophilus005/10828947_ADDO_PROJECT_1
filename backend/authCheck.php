<?php
//Validates the signup form as the user types

include "databaseConnection.php";

//First Name Check
if (isset($_REQUEST["fname"])) {
    $fname = $_REQUEST["fname"];

    if (strlen($fname) == 0) {
        echo " "; 
    } else {
        if (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9 ]*$/', $fname)) {
            echo "<span style='color:red'>Invalid first name</span>";
        }elseif (strlen($fname) < 3) {
            echo "<span style='color:orange'>Too short</span>";
        } else {
            echo "<span style='color:green'>First name is valid</span>";
        }
    }
}

//Last Name Check
if (isset($_REQUEST["lname"])) {
    $lname = $_REQUEST["lname"];

    if (strlen($lname) == 0) {
        echo " "; 
    } else {
        if (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9 ]*$/', $lname)) {
            echo "<span style='color:red'>Invalid last name</span>";
        }elseif (strlen($lname) < 3) {
            echo "<span style='color:orange'>Too short</span>";
        } else {
            echo "<span style='color:green'>Last name is valid</span>";
        }
    }
}

//Email Check
if (isset($_REQUEST["email"])) {
    $email = $_REQUEST["email"];
    if (!isset($email)) {
        $email = " ";
    }

    if (strlen($email) == 0) {
        echo " ";
    } elseif(!preg_match('/^[a-zA-Z0-9]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/', $email)) {
        echo " ";
    } 

    else {
        $check_user_email = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $check_user_email_result = $conn->query($check_user_email);
        if ($check_user_email_result->num_rows > 0) {
            echo "<span style='color:red'>Email already exists</span>";
        } else {
            echo "<span style='color:green'>Email is available</span>";
        }
    }
}


//Password_1 Check
if (isset($_REQUEST["pass1"])) {
    $password_1 = $_REQUEST["pass1"];

    if (strlen($password_1) == 0) {
        $error = " ";
    } else {
        if (!preg_match('/^.{8,}$/', $password_1)) {
            $error = "<span style='color:orange'>Password must be at least 8 characters</span>";
            //$passError = $error1;
        } elseif (!preg_match('/^(?=.*[A-Z]).{8,}$/', $password_1)) {
            $error = "<span style='color:orange'>Password must contain one uppercase letter</span>";
            //$passError = $error2;
        } elseif (!preg_match('/^(?=.*[0-9])(?=.*[A-Z]).{8,}$/', $password_1)) {
            $error = "<span style='color:orange'>Password should contain at least one digit</span>";
            //$passError = $error3;
        } else {
            $error = "<span style='color:green'>Password is okay</span>";
        }
    }

    echo $error;
}


//Password2 check
if (isset($_REQUEST["password1"]) && isset($_REQUEST["pass2"])) {
    $password_2 = $_REQUEST["pass2"];
    $password_first = $_REQUEST["password1"];

    if (strlen($password_2) == 0 || strlen($password_first) == 0) {
        echo " ";
    } else {
        if ($password_first != $password_2) {
            //echo "<span style='color:orange'>Passwords do not match</span>";
            echo " ";
        } else {
            echo "<span style='color:green'>Passwords match</span>";
        }
    }
}

?>