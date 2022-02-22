<?php
require __DIR__ . '/vendor/autoload.php';

//connection to the database
$mongoClient = (new MongoDB\Client);       
$db = $mongoClient->AnVen;          
$staff=$db->Staffs->find();             

echo json_encode(iterator_to_array($staff));
?>