<?php

if(!isset($_SESSION)) {
    // session isn't started
    session_start();
}

//check if user has logged in
if(!isset($_SESSION['loggedInUser']) || empty($_SESSION['loggedInUser'])){
    header('Location: login.php?auth=1');
}

//connecting to the mongo db database
if($_POST){
    
    require __DIR__ . '/vendor/autoload.php';
    
    // connecting to the client database
    $mongoClient = (new MongoDB\Client);

    // selecting database
    $db = $mongoClient->AnVen;
    // selecting collection
    $products =  $db->Products;

    //data to be sent to the database
    $ImgUrl = filter_input(INPUT_POST, 'imageurl', FILTER_SANITIZE_STRING);
    $Product = filter_input(INPUT_POST, 'Product', FILTER_SANITIZE_STRING);
    $Category = filter_input(INPUT_POST, 'Category', FILTER_SANITIZE_STRING);
    $Price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
    $Quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
    $Description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $Details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING);
    
    //setting the data to be sent to the database in an array
    $dataArray = [
        'imageurl' => '/images/'.$ImgUrl,
        'Product' => $Product,
        'Category' => $Category,
        'Price' => $Price,
        'Quantity' => $Quantity ,
        'Description' => $Description,
        'Details' => $Details
    ];

    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        return true;
    } 

    //validating the success or failure of the information sent to the database 
    if (!($ImgUrl=="") && !($Product=="") && !($Category=="") && !($Price=="") && !($Quantity=="") && !($Description=="") && !($Details=="")){
        $insertResult = $products->insertOne($dataArray); 
        
        if($insertResult->getInsertedCount()==1){
            phpAlert('Product added successfully');
            header('Location: viewProduct.php');
        }
        else {
            phpAlert('unable to add product');
            header('Location: viewProduct.php');
        }
    }
    else {
        phpAlert('Missing inputs');
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

    <!-- head section of the page -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- title of the page-->
        <title>Add Product</title>
        <!-- linking the font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- css link -->
        <link rel="stylesheet" href="/CMS_Website/css/style.css">
    </head>

    <!-- body of the webpage -->

    <body>
        <!-- header section -->
        <header>
            <!-- logo -->
            <div class="logo">
                <img src="/images/Pharmacy Logo.png" alt="">
            </div>
            <h1>Management system</h1>
            <div class="icon">
                <div id=logout onclick="LogOut()"><i class="fas fa-sign-in-alt"></i></div>
            </div>
        </header>

        <!-- vertical navigation bar -->
        <section>
            <div class="sidebar">
                <ul>
                    <li><a href="addStaff.php">Add staff</a></li>
                    <li><a href="viewStaff.php">View staff</a></li>
                    <li><a href="viewOrder.php">View order</a></li>
                    <!-- <li><a href="editProduct.php" id="edit">Edit product</a></li> -->
                    <li><a href="addProduct.php" class="selected">Add product</a></li>
                    <li><a href="viewProduct.php">View products</a></li>
                    <li><a href="viewCustomer.php">View customer</a></li>
                </ul>
            </div>
        </section>
        <!-- form section -->
        <section>
            <form method='post' action='addproduct.php' class="form-box" style="height: 950px">
                <!-- content of the form box -->
                <div class=" content">
                    <label for="imageurl">
                        <h2>Image: </h2>
                    </label>
                    <input type="file" id="imageurl" name="imageurl" accept="/images/*">

                    <h2>Product name: </h2>
                    <input type="text" id="Product" name="Product" placeholder="e.g. Cefimed">

                    <h2>Category: </h2>
                    <input type="text" list="Category" name="Category" placeholder="e.g. Antibiotic">
                    <datalist id="Category">
                        <option value="Baby Product">
                        <option value="Skin Product">
                        <option value="Medical Equipment">
                        <option value="Covid-19  Product">
                    </datalist>


                    <h2>Price (Rs): </h2>
                    <input type=" text" id="price" name="price" placeholder="e.g. 150.25">

                    <h2>Quantity: </h2>
                    <input type="text" id="quantity" name="quantity" placeholder="e.g. 500">

                    <h2>Description (use for): </h2>
                    <input type="text" id="description" name="description" placeholder="e.g. Influenza,Infection">

                    <h2>Details: </h2>
                    <textarea id="details" name="details" placeholder="e.g.Enter more details on brand or product"
                        rows="6" cols="75">
                    </textarea>

                    <!-- add button -->
                    <button class=" Add-Btn">Add</button>
                </div>
            </form>

            <!-- footer of the page -->
            <section class="copyright">
                <h4>© AnVen Pharma - All Rights Reserved </h4>
            </section>

            <script src="/CMS_Website/javascript/common.js"></script>

    </body>

</html>