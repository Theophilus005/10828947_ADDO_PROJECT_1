<?php
session_start();
include "../backend/databaseConnection.php";

if(!isset($_SESSION["username"])) {
    header("../index.php");
} else {
    //get the full name from session
    $name = $_SESSION["username"];
    $email = $_SESSION["email"];

    //fetch details
    $details_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $query_results = $conn->query($details_query);
    if($query_results->num_rows > 0) {
        while($userData = $query_results->fetch_assoc()) {
            $fname = $userData["fname"];
            $lname = $userData["lname"];
        }
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <div class="navbar">
        <p>Hello, <?php echo $name ?></p>
        <a href="../backend/logout.php">Sign Out</a>
    </div>

    <div class="main">
    <div class="dashboard">
        <div class="userimage"></div>
        <div class="details">
            <div>
            <p>First Name:</p>
            <p><?php echo $fname ?></p>
            </div>
            <div>
            <p>Last Name:</p>
            <p><?php echo $lname ?></p>
            </div>
            <div>
            <p>Email:</p>
            <p><?php echo $email ?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>