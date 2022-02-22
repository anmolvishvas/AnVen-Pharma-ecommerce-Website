<?php
    if(!isset($_SESSION)) {
        // session isn't started
        session_start();
    }

    //check if user has logged in
    if(!isset($_SESSION['loggedInUser']) || empty($_SESSION['loggedInUser'])){
        header('Location: login.php?auth=1');
    }

    
    require __DIR__ . '/vendor/autoload.php';
            
    //connection to the database
    $mongoClient = (new MongoDB\Client);

    $db = $mongoClient->AnVen;

    $products = $db->Products->find();

    //finding the specific product using specific id
    if(isset($_GET['id'])){
            
        $editproduct = $db->Products->findOne(["_id" => new MongoDB\BSON\ObjectID($_GET['id'])]);
        
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- title of the page-->
        <title>Edit Product</title>
        <!-- linking the font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- css link -->
        <link rel="stylesheet" href="/CMS_Website/css/style.css" />
    </head>

    <!-- body of the webpage -->

    <body>
        <!-- header section -->
        <header>
            <!-- logo -->
            <div class="logo">
                <img src="/images/Pharmacy Logo.png" alt="" />
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
                    <!-- <li><a href="editProduct.php" class="selected" id="edit">Edit product</a></li> -->
                    <li><a href="addProduct.php">Add product</a></li>
                    <li><a href="viewProduct.php">View products</a></li>
                    <li><a href="viewCustomer.php">View customer</a></li>
                </ul>
            </div>
        </section>

        <!-- form section -->
        <section>
            <div class="form-box" id="staff_form">
                <!-- content of the form -->
                <div class="content">
                    <?php if(isset($_GET['id']) && $editproduct){ ?>
                    <h2>Image: </h2>
                    <input type="text" id="img" name="img" value="<?= $editproduct['imageurl'] ?>"
                        placeholder="image/filename.png" disabled>
                    <h2>Product name: </h2>
                    <input type="text" id="product_name" name="product_name" value="<?= $editproduct['Product'] ?>"
                        placeholder="Product Name" required disabled>
                    <h2>Product Category: </h2>
                    <input type="text" id="product_category" name="product_category"
                        value="<?= $editproduct['Category'] ?>" placeholder="Product Category" required disabled>

                    <h2>Price: </h2>
                    <input type="text" id="price" name="price" value="<?= $editproduct['Price'] ?>"
                        placeholder="Product Price" required>

                    <h2>Quantity: </h2>
                    <input type="text" id="quantity" name="quantity" value="<?= $editproduct['Quantity'] ?>"
                        placeholder="Product Quantity" required>

                    <input type="text" id="description" name="description" value="<?= $editproduct['Description'] ?>"
                        placeholder="Product Description" style="display:none">
                    <input type=" text" id="details" name="details" value="<?= $editproduct['Details'] ?>"
                        placeholder="Product Details" style="display:none">
                    <button class="Add-Btn" onclick="performupdate()">Update details</button>
                    <?php  } ?>


                </div>
            </div>
        </section>



        <!-- footer of the page -->
        <section class="copyright">
            <h4>© AnVen Pharma - All Rights Reserved</h4>
        </section>

        <!-- linking javascript script -->
        <script src="/CMS_Website/javascript/common.js"></script>
        <script src="/CMS_Website/javascript/editProduct.js"></script>


    </body>



</html>