<!DOCTYPE html>
<html lang="en">

    <!-- head section of the page -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> E-Commerce Website - Contact </title>

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
            <h1>Contact Us</h1>
            <p><a href="home.php">home >></a> contact</p>
        </div>

        <!-- contact section -->
        <div class="contact">
            <div class="container">

                <!-- number section -->
                <div class="icon">
                    <i class="fas fa-phone"></i>
                    <h3>Our numbers</h3>
                    <p>+230-5321-8563</p>
                    <p>+230-5321-8003</p>
                </div>

                <!-- email addresses section -->
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                    <h3>Our email addresses</h3>
                    <p>anven@gmail.com</p>
                    <p>anven_drugstore@outlook.com</p>
                </div>

                <!-- address section -->
                <div class="icon">
                    <i class="fas fa-map"></i>
                    <h3>Our address</h3>
                    <p>Coastal Road,</p>
                    <p>Flic en flac, Mauritius</p>
                </div>
            </div>
        </div>

        <!-- footer section -->
        <?php
        include('footer.php')
        ?>

        <!-- linking javascript script -->
        <script src="/Customer_Website/javascript/script.js"></script>
    </body>

</html>