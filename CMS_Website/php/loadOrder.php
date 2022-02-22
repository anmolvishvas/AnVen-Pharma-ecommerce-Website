<?php
    $keyword = filter_input(INPUT_POST, 'keyword', FILTER_SANITIZE_STRING);
    //Include libraries
    require __DIR__ . '/vendor/autoload.php';

    
    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->AnVen;

    $order = $db->Orders->find();
    echo json_encode(iterator_to_array($order));
?>