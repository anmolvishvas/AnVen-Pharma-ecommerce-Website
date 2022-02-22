<?php
    if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
    }

    //check if user has logged in
    if(!isset($_SESSION['loggedInUser']) || empty($_SESSION['loggedInUser'])){
        header('Location: login.php?auth=1');
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
        <title>View Customer</title>
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
                    <li><a href="addProduct.php">Add product</a></li>
                    <li><a href="viewProduct.php">View products</a></li>
                    <li><a href="viewCustomer.php" class="selected">View customer</a></li>
                </ul>
            </div>
        </section>


        <!-- table section -->
        <section id="cms" class="table">
            <table>
                <!-- defining table header -->
                <thead>
                    <tr>
                        <td>CustomerId</td>
                        <td>Full Name</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Phone Number</td>
                        <td>Address</td>
                    </tr>
                </thead>

                <!-- table's body -->
                <tbody id="customer_table">
                </tbody>
            </table>
        </section>

        <!-- footer of the page -->
        <section class="copyright">
            <h4>© AnVen Pharma - All Rights Reserved </h4>
        </section>

        <!--    Linking javascript script -->
        <script src="/CMS_Website/javascript/common.js"></script>
        <script src="/CMS_Website/javascript/viewCustomer.js"></script>

    </body>

</html>