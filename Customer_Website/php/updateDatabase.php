<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select the database
$db = $mongoClient->AnVen;

//the data that is going to be sent to the database
$productName = $_POST['product_name'];
$productImg = $_POST['product_image'];
$productCat = $_POST['product_category'];
$productPrice = $_POST['product_price'];
$productDescription = $_POST['product_description'];
$productQuantity = $_POST['product_quantity'];
$productDetails = $_POST['product_details'];
$quantityOrdered = $_POST['quantity'];

$findCriteria = [
    'Product' => $productName
];

//new data to be replaced with in the database
$newQuantity = $productQuantity-$quantityOrdered;
$UpdateArray=[
    "imageurl" => $productImg,
    "Product"=>$productName,
    "Category"=>$productCat,
    "Price"=>$productPrice,
    "Description"=>$productDescription,
    "Quantity"=>$newQuantity,
    "Details"=>$productDetails
];

$update = $db->Products->replaceOne($findCriteria,$UpdateArray);


?>