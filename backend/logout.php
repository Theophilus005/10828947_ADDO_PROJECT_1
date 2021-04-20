<?php
session_start();
//destroy sessions
unset($_SESSION["username"]);
unset($_SESSION["status"]);

setcookie("email", "", time()-60);
setcookie("password", "", time()-60);

session_destroy();
header("location: ../index.php");

?>