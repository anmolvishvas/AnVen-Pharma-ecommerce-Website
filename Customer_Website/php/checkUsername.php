<?php
//starting session
session_start();

//checking the username that is logged in
$username = $_SESSION['loggedInUser'];
$json=$username;
echo $json;
?>