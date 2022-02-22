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
    $productImg= filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);
    $Name = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_STRING);
    $Category = filter_input(INPUT_POST, 'product_category', FILTER_SANITIZE_STRING);
    $Price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
    $Quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
    $Description= filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $Details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING);

    
    $mongoClient = (new MongoDB\Client);
    $db = $mongoClient->AnVen;
    
    $findCriteria = [
        "Product" => $Name
    ];
    
    //updating the data stored in the product collection in the database
    $updateCriteria =[
        "imageurl" => $productImg,
        "Product" => $Name,
        "Category" => $Category,
        "Price" => $Price,
        "Quantity" => $Quantity,
        "Description" => $Description,
        "Details" => $Details
    ];

    $update = $db->Products->replaceOne($findCriteria,$updateCriteria);
    