<?php

session_start();

    //getting user input data
    $fname= filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    $uname= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $phonenumber= filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_STRING);
    $address= filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $pass= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    require __DIR__ . '/vendor/autoload.php';

    $mongoClient = (new MongoDB\Client);
    $db = $mongoClient->AnVen;
    
    $findCriteria = [
        "username" => $uname,
    ];
    
    //updating the data stored in the customer collection in the database
    $updateCriteria =[
        "Name" => $fname,
        "username" => $uname,
        "email" => $email,
        "PhoneNumber" => $phonenumber,
        "address" => $address,
        "password" => $pass
    ];

    $update = $db->Customers->replaceOne($findCriteria,$updateCriteria);



?>