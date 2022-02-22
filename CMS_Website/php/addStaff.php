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
    
    //connecting to the mongo db database
    $mongoClient = (new MongoDB\Client);
    
    $db = $mongoClient->AnVen;
    
    $staff = $db->Staffs;

    //data to be sent to the database
    $FirstName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $LastName = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $Username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $Email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $PhoneNumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_STRING);
    $Password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    //setting the data to be sent to the database in an array
    $dataArray = [
        'FirstName' =>$FirstName,
        'LastName' => $LastName,
        'username' => $Username,
        'email' => $Email,
        'PhoneNumber' => $PhoneNumber,
        'password' => $Password
    ];
       
    $findCriteria = [
        'username' => $Username
    ];
    
//checking the staff collection to find the customer username
    if($_POST){
        $count = $staff->count($findCriteria);
        //Check that there is exactly one customer
        if($count == 0){
            $insertResult = $staff->insertOne($dataArray);
            header('Location: viewStaff.php');
        }
        else{
            header('Location: addStaff.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

    <!-- head section of the webpage -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- title of the page-->
        <title>Add Staff</title>
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
                    <li><a href="addStaff.php" class="selected">Add staff</a></li>
                    <li><a href="viewStaff.php">View staff</a></li>
                    <li><a href="viewOrder.php">View order</a></li>
                    <!-- <li><a href="editProduct.php" id="edit">Edit product</a></li> -->
                    <li><a href="addProduct.php">Add product</a></li>
                    <li><a href="viewProduct.php">View products</a></li>
                    <li><a href="viewCustomer.php">View customer</a></li>
                </ul>
            </div>
        </section>

        <!-- form section -->
        <section>
            <form method='post' action='addStaff.php' class="form-box" id="staff_form">
                <!-- content of the form -->
                <div class="content">

                    <h2>First name: </h2>
                    <input type="text" placeholder="e.g. Anmol" name="firstname" id="firstName" required>

                    <h2>Last name: </h2>
                    <input type="text" placeholder="e.g. Vishvas" name="lastname" id="lastName" required>

                    <h2>Username: </h2>
                    <input type="text" placeholder="e.g. anmol0123" name="username" id="username" required>

                    <h2>Email: </h2>
                    <input type="text" placeholder="e.g. anmol@gmail.com" name="email" id="email" required>

                    <h2>Phone Number: </h2>
                    <input type="text" placeholder="e.g. +230-5896-8745" name="phonenumber" id="phoneNumber" required>

                    <h2>Password: </h2>
                    <input type="password" placeholder="e.g. **********" name="password" id="password" required>

                    <!-- add button -->
                    <button type='submit' name='save' id='save' class="Add-Btn">Add</button>
                </div>
            </form>
        </section>
        <!-- footer of the page -->
        <section class="copyright">
            <h4>© AnVen Pharma - All Rights Reserved </h4>
        </section>
        <script src="/CMS_Website/javascript/common.js"></script>
        <!-- <script src="/CMS_Website/javascript/addStaff.js"></script> -->

    </body>

</html>