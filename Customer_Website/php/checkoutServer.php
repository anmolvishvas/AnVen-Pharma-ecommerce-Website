<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select the database
$db = $mongoClient->AnVen;

//Extract the data that was sent to the server
$sessionStorageJsonFormat = $_POST['sessionStorage'];
$totalPrice = $_POST['total'];

//Start session management
session_start();


// Retrieve current customer session
if( array_key_exists("loggedInUser", $_SESSION) ){
    
    //Store in username variable
    $username= $_SESSION['loggedInUser'];
}
else{
    echo 'Not logged in';
    //Prevent below code to execute
    return;
}
// Retrieve current date and time
$Date = date("Y/m/d");
$Time= date("h:i");

//Array to add into db
$checkoutArray=[
    "username"=> $username,
    "date"=> $Date,
    "time"=> $Time,
    "total"=> $totalPrice,
    // Convert into perfer JSOn format
    "products"=>json_decode($sessionStorageJsonFormat)
    
];

//Select the order collection 
$orders = $db->Orders;

//Add the new product to the database
$insertResult = $orders->insertOne($checkoutArray);

?>