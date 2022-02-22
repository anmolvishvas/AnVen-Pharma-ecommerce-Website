<?php
    //Include libraries
    require __DIR__ . '/vendor/autoload.php';
    
    
    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);
    
    //Select a database
    $db = $mongoClient->AnVen;
    
    $keyword = filter_input(INPUT_POST, 'keyword', FILTER_SANITIZE_STRING);
    //Select a collection
    $collection = $db->Products;
    // creating index
    $collection->createIndex(['Description' => 'text']);

    // if keyword is empty, it will display all the product
    if ($keyword == "") {
        $products = $collection->find();
        echo json_encode(iterator_to_array($products));
    }
    else {
        $findCriteria = ['$text'=>['$search' => $keyword]];
        $products = $collection->find($findCriteria);
        echo json_encode(iterator_to_array($products));
        
    }

?>