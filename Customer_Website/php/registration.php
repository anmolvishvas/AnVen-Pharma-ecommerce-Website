<?php
    require __DIR__ . '/vendor/autoload.php';
    
    //connecting to the mongo db database
    $mongoClient = (new MongoDB\Client);
    
    $db = $mongoClient->AnVen;
    
    $customers = $db->Customers;

    //data to be sent to the database
    $FullName = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    $Username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $Email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $PhoneNumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_STRING);
    $Address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $Password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    //setting the data to be sent to the database in an array
    $dataArray = [
        'Name' => $FullName,
        'username' => $Username,
        'email' => $Email,
        'PhoneNumber' => $PhoneNumber,
        'address' => $Address,
        'password' => $Password
    ];
       
    $findCriteria = [
        'username' => $Username
    ];
    
    
    $count = $customers->count($findCriteria);

    //Check that there is exactly one customer
    if($count == 0){
        $insertResult = $customers->insertOne($dataArray);
        if($insertResult->getInsertedCount()==1) {
            echo 'Thank you for registering ' . $Username;
            $_SESSION['loggedInUser'] = $Username;
        }
        return;
    }
    else if($count > 0){
        echo 'Database error: Username already exist.';
        return;
    }