<!DOCTYPE html>
<html lang="en">

    <!-- head section of the webpage -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> E-Commerce Website - View Past Orders</title>

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

        <!-- title of the page -->
        <section class="category">
            <h1 class="title">
                View Past Orders
            </h1>
        </section>


        <!-- cart container section -->
        <section id="cart-container" class="content">
            <!-- shopping cart table -->
            <table id='Content'>
            </table>
        </section>


        <!-- footer section -->
        <?php
        include('footer.php')
        ?>

        <script src="/Customer_Website/javascript/script.js"></script>
        <script src="/Customer_Website/javascript/orders.js"></script>

    </body>

</html>