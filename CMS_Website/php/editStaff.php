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
            
    //collection toe the mongodb database
    $mongoClient = (new MongoDB\Client);

    $db = $mongoClient->AnVen;

    $staff = $db->Staffs->find();

    if(isset($_GET['id'])){
            
        //finding the specific staff for editing
        $editstaff = $db->Staffs->findOne(["_id" => new MongoDB\BSON\ObjectID($_GET['id'])]);
        
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

                    <?php if(isset($_GET['id']) && $editstaff){ ?>
                    <h1 style='text-align:center'>Edit Staff</h1>

                    <h2><label for="firstname"><b>First Name</b></label><br></h2>
                    <input type="text" placeholder="Enter new first name" name="firstname" id="firstName"
                        value="<?= $editstaff['FirstName'] ?>" required><br>

                    <h2><label for="lastname"><b>Last Name</b></label><br></h2>
                    <input type="text" placeholder="Enter new last name" name="lastname" id="lastName"
                        value="<?= $editstaff['LastName'] ?>" required><br>

                    <h2><label for="username"><b>Username</b></label><br></h2>
                    <input type="text" placeholder="Enter new username" name="username" id="username"
                        value="<?= $editstaff['username'] ?>" required><br>

                    <h2><label for="email"><b>Email</b></label><br></h2>
                    <input type="text" placeholder="Enter new email" name="email" id="email"
                        value="<?= $editstaff['email'] ?>" required><br>

                    <h2><label for="phone"><b>Phone number</b></label><br></h2>
                    <input type="text" placeholder="Enter new number" name="phonenumber" id="phoneNumber"
                        value="<?= $editstaff['PhoneNumber'] ?>" required><br>

                    <input type="text" name="password" id="password" value="<?= $editstaff['password'] ?>"
                        placeholder="Password" style="display:none">

                    <button class="Add-Btn" onclick="performupdate()"> Update details</button>
                    <?php  } ?>
                </div>
            </div>
        </section>
        <!-- footer of the page -->
        <section class="copyright">
            <h4>© AnVen Pharma - All Rights Reserved </h4>
        </section>
        <script src="/CMS_Website/javascript/common.js"></script>
        <script src="/CMS_Website/javascript/editStaff.js"></script>

    </body>

</html>