<?php

    if(!isset($_SESSION)) {
        // session isn't started
        session_start();
    }

    //check if user has logged in
    if(!isset($_SESSION['loggedInUser']) || empty($_SESSION['loggedInUser'])){
        header('Location: login.php?auth=1');
    }
    
    require __DIR__ . '/vendor/autoload.php';
    session_start();

    //getting user input data
    $fname= filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $uname = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $PhoneNumber= filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_STRING);
    $Pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    
    $mongoClient = (new MongoDB\Client);
    $db = $mongoClient->AnVen;
    
    $findCriteria = [
        "username" => $uname,
    ];
  
     //updating the data stored in the product collection in the database
    $updateCriteria =[
        "FirstName" => $fname,
        "LastName" => $lname,
        "username" => $uname,
        "email" => $email,
        "PhoneNumber" => $PhoneNumber,
        "password" => $Pass
    ];

    $update = $db->Staffs->replaceOne($findCriteria,$updateCriteria);
    