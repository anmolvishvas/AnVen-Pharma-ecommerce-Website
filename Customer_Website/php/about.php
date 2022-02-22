<!DOCTYPE html>
<html lang="en">

    <!-- head section of the webpage -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> E-Commerce Website - About </title>

        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- css link -->
        <link rel="stylesheet" href="/Customer_Website/css/style.css">
    </head>

    <!-- body section of the webpage -->

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

        <!-- heading part -->
        <div class="heading">
            <h1>About Us</h1>
            <p><a href="home.php">home >></a> about</p>
        </div>

        <!-- about section -->
        <div class="about">
            <div class="picture">
                <img src="/images/Medicines_Basket.png" alt="">
            </div>
            <!-- small description of the company -->
            <div class="content">
                <span> Welcome to our Drugstore</span>
                <h3> About Us</h3>
                <p>With more than 35 stores in Mauritius, AnVen Drugstore is not just the largest online pharmacy store
                    in Mauritius but in Madagascar as well.
                    Our pharmacy chain has been operational and been providing genuine quality healthcare products for
                    more than 36 years.
                    Our wide range of products ensures that everything you need related to healthcare, you will find it
                    on our platform.
                </p>
            </div>
        </div>

        <!-- information section -->
        <div class="info-container">
            <div class="info">
                <img src="/images/logo1.png" alt="">
                <div class="content">
                    <h3>Fast Delivery</h3>
                    <span>Within 1 hour</span>
                </div>
            </div>

            <div class="info">
                <img src="/images/logo2.png" alt="">
                <div class="content">
                    <h3>24 / 7 available</h3>
                    <span>Contact Us Anytime</span>
                </div>
            </div>

            <div class="info">
                <img src="/images/logo3.png" alt="">
                <div class="content">
                    <h3>Easy payment</h3>
                    <span>Payment on delivery</span>
                </div>
            </div>
        </div>

        <!-- footer section -->
        <?php
        include('footer.php')
        ?>


        <!-- linking javascript script -->
        <script src="/Customer_Website/javascript/script.js"></script>
        <script src="/Customer_Website/javascript/common.js"></script>
    </body>

</html>