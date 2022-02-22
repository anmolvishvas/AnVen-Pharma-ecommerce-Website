<?php

// starting the session
session_start();

// connecting the php with the mongodb dirvers
require __DIR__ . '/vendor/autoload.php';

// connecting to the mongo db client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->AnVen;

// selecting the collection
$customerdata = $db->Customers;

//getting logged in user
$username=$_SESSION['loggedInUser'];

$findCriteria = [
    "username" => $username,
];

// checking for the username
$cursor = $customerdata->find($findCriteria);

$jsonStr = '['; 

foreach ($cursor as $customer){
    $jsonStr .= json_encode($customer);
    $jsonStr .= ',';
}

$jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);

$jsonStr .= ']';

echo $jsonStr;