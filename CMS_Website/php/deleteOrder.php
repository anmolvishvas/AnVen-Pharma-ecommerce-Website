<?php
    if(!isset($_SESSION)) {
        // session isn't started
        session_start();
    }

    if(!isset($_SESSION['loggedInUser']) || empty($_SESSION['loggedInUser'])){
        header('Location: login.php?auth=1');
    }

    
    require __DIR__ . '/vendor/autoload.php';
            
    //connection to the database(mongodb)
    $mongoClient = (new MongoDB\Client);

    $db = $mongoClient->AnVen;

    $order = $db->Orders->find();

    //setting the delete criteria from the order collection
    $deleteCriteria = [
        "_id" => new MongoDB\BSON\ObjectID($_GET['id'])
    ];

    $deleteRes = $db->Orders->deleteOne($deleteCriteria);

    if($deleteRes->getDeletedCount() == 1){
        header('Location: viewOrder.php');
    }
    else{
        echo 'Error deleting customer';
    }
?>