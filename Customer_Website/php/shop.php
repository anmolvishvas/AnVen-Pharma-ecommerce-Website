<!DOCTYPE html>
<html lang="en">

    <!-- head section of the webpage -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> E-Commerce Website - Shop </title>

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
                <div id="search"><i class="fas fa-search"></i></div>
                <div id="cart"><i class="fas fa-cart-plus"></i></div>
                <div id="login"><i class="fas fa-user-lock"></i></div>
                <div id="logout" onclick="LogOut()"><i class="fas fa-sign-in-alt"></i></div>
            </div>

            <!-- forms -->
            <!-- search form -->
            <form action="" class="search-form">
                <input type="search" placeholder="search here.." id="box-search">
                <label for="box-search" class="fas fa-search" id='searchButton'></label>
            </form>

        </header>

        <!-- heading of the page -->
        <div class="heading">
            <h1>Our Shop</h1>
            <p><a href="home.php">home >></a> shop</p>
        </div>

        <!-- category section -->
        <section class="category">
            <h1 class="title">
                Our <span> category</span>
                <a href="#"> View all >></a>
            </h1>
            <!-- category container -->
            <div class="container">
                <a href="#baby" class="box box1 ">
                    <h3>Baby products</h3>
                </a>

                <a href="#skin" class="box box2 ">
                    <h3>Skin products</h3>
                </a>

                <a href="#equipments" class="box box3 ">
                    <h3>Medical equipments</h3>
                </a>

                <a href="#covid" class="box box4">
                    <h3>Covid-19 products</h3>
                </a>
            </div>
        </section>

        <!-- product section -->
        <section class="items">
            <h1 class="title">
                Our <span> products</span>
                <span style='font-size:24px; margin-left: 60%;'> Filter by:</span>
                <a href="#" style='font-size:20px; color=black;' onclick="PriceAsc()"> Ascending price</a>
                <a href="#" style='font-size:20px; color=black;' onclick="PriceDesc()"> Descending price</a>
            </h1>
            <div class="box">
                <div class="container" id='shop'>
                </div>
            </div>

        </section>

        <!-- footer section -->
        <?php
        include('footer.php')
        ?>
        <!-- linking javascript script -->
        <script src="/Customer_Website/javascript/script.js"></script>

        <script src="/Customer_Website/javascript/shop.js"></script>
        <!-- <script src="/Customer_Website/javascript/home.js"></script> -->
    </body>

</html>