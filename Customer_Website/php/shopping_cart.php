<?php

if(!isset($_SESSION)) {
    // session isn't started
    session_start();
}

if(!isset($_SESSION['loggedInUser']) || empty($_SESSION['loggedInUser'])){
    header('Location: login.php?auth=1');
}

?>

<!DOCTYPE html>
<html lang="en">

    <!-- head section of the page -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> E-Commerce Website - Cart </title>

        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- css link -->
        <link rel="stylesheet" href="/Customer_Website/css/style.css">
    </head>

    <!-- body section of the page -->

    <body>

        <!-- header section -->
        <header class="header">
            <div class="logo">
                <a href="home.php"><img src="/images/Pharmacy Logo.png" alt=""></a>
            </div>

            <!-- navigation bar -->
            <nav class="navbar">
                <a href="home.php"><i class="fas fa-home"></i> Home </a>
                <a href="shop.php"><i class="fab fa-shopify"></i> Shop </a>
                <a href="about.php"><i class="fas fa-info-circle"></i> About </a>
                <a href="contact.php"><i class="far fa-address-card"></i> Contact </a>
            </nav>

            <!-- icons -->
            <div class="icon">
                <a href="account.php">
                    <div id="settings"><i class="fas fa-user-cog"></i></div>
                </a>
                <div id="search" style="display:none;"><i class="fas fa-search"></i></div>
                <div id=cart><i class="fas fa-cart-plus"></i></div>
                <div id=login><i class="fas fa-user-lock"></i></div>
                <div id=logout onclick="LogOut()"><i class="fas fa-sign-in-alt"></i></div>
            </div>

            <!-- forms -->
            <!-- search form -->
            <form action="" class="search-form">
                <input type="search" placeholder="search here.." id="box-search">
                <label for="box-search" class="fas fa-search"></label>
            </form>
        </header>

        <!-- title section -->
        <section class="cart-title">
            <h1 class="title"> Shopping Cart</h1>
        </section>

        <!-- cart container section -->
        <section id="cart-container" class="content">
            <!-- shopping cart table -->
            <table id='CartContent'>
            </table>
        </section>


        <!-- billing section -->
        <section class="billing">
            <!-- billing container -->
            <div class="container">

                <div class="box">
                    <div class="details">
                        <h2 class="title">Billing Details</h2>
                        <h4><i class="fa fa-user"></i> Full Name</h4>
                        <input type="text" id="fname" name="fname" placeholder="Enter your full name...">
                        <h4><i class="fa fa-envelope"></i> Email</h4>
                        <input type="text" id="email" name="email" placeholder="Enter your email address...">
                        <h4><i class="fa fa-address-card"></i> Address</h4>
                        <input type="text" id="address" name="address" placeholder="Enter your address...">
                    </div>
                </div>


                <!-- summary section -->
                <div class="box">
                    <div class="summary-box">
                        <h2 class="title">Summary</h2>
                        <table>
                            <!-- header of the table that will be hidden -->
                            <thead class="offscreen">
                                <tr>
                                    <td>header</td>
                                    <td>price</td>
                                </tr>
                            </thead>

                            <!-- body of the table -->
                            <tbody id='SummaryContent'>

                            </tbody>
                        </table>

                        <!-- place order button to confirm the order -->
                        <button class="button summary" onclick='confirmation()'>Checkout</button>
                    </div>
                </div>
            </div>
        </section>



        <!-- footer section -->
        <?php
        include('footer.php')
        ?>

        <!-- linking javascript script -->
        <script src="/Customer_Website/javascript/script.js"></script>
        <script src="/Customer_Website/javascript/cart.js"></script>
    </body>

</html>