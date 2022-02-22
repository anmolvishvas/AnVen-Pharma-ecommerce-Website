<?php
    session_start();
    // connecting the php with the mongodb dirvers
    require __DIR__ . '/vendor/autoload.php';

    //user login input fields
    $Username = filter_input(INPUT_POST, 'login_username', FILTER_SANITIZE_STRING);
    $Password = filter_input(INPUT_POST, 'login_password', FILTER_SANITIZE_STRING);
    // storing the username into the php session
    $_SESSION['loggedInUser'] = $Username;
    
?>