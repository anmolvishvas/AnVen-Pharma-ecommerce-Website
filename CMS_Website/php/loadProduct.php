<?php
    //Include libraries
    require __DIR__ . '/vendor/autoload.php';
        
    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->AnVen;

    $products = $db->Products->find();

    echo json_encode(iterator_to_array($products));
?>