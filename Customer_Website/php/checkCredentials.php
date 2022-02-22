<?php

// connecting the php with the mongodb drivers
require __DIR__ . '/vendor/autoload.php';

//connection to the database for the website
$mongoClient = (new MongoDB\Client);       
$db = $mongoClient->AnVen;          
$customer=$db->Customers->find();             

echo json_encode(iterator_to_array($customer));
?>