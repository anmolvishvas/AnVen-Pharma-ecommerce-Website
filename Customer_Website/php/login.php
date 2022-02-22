<?php

if(!isset($_SESSION)) { 
    // session isn't started 
    session_start(); }

?>

<!DOCTYPE html>
<html lang="en">

    <!-- head section of the webpage -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> E-Commerce Website - Registration </title>

        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- css link -->
        <link rel="stylesheet" href="/Customer_Website/css/style.css">
    </head>

    <!-- body section of the webpage -->

    <body id='registration'>
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

        <!-- form container -->
        <div class="container">
            <input type="checkbox" id="flip">
            <!-- cover image section -->
            <div class="cover">
                <div class="front">
                    <img src="/images/login.jpg" alt="">
                </div>
            </div>
            <!-- forms section -->
            <div id="form">
                <!-- login form -->
                <div class="content">
                    <form class="login-form" id="login_form">
                        <!-- title of the form -->
                        <div class="title">Login</div>
                        <!-- inputs -->
                        <div class="inputs">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="login_username" placeholder="Enter your username"
                                    id="username_login">
                                <i class="fas fa-exclamation-circle"></i>
                                <small> Error message</small>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="login_password" placeholder="Enter your password"
                                    id="password_login">
                                <i class="fas fa-exclamation-circle"></i>
                                <small> Error message</small>
                            </div>
                            <!-- submit button -->
                            <div class="buttons input-box">
                                <input type="submit" value="submit">
                            </div>
                            <div class="text">Don't have an account? <label for="flip">Sign Up now</label></div>
                        </div>
                    </form>

                    <!-- registration form -->
                    <form class="registration-form" id="registration_form">
                        <!-- title of the form -->
                        <div class="title">Sign Up</div>
                        <!-- inputs -->
                        <div class="inputs">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Enter your full name" name="fullname" id="fullName">
                                <i class="fas fa-exclamation-circle"></i>
                                <small> Error message</small>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Enter your username" name="username" id="username">
                                <i class="fas fa-exclamation-circle"></i>
                                <small> Error message</small>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Enter your email name" name="email" id="email">
                                <i class="fas fa-exclamation-circle"></i>
                                <small> Error message</small>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-phone"></i>
                                <input type="text" placeholder="Enter your phone number" name="phonenumber"
                                    id="phoneNumber">
                                <i class="fas fa-exclamation-circle"></i>
                                <small> Error message</small>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-map"></i>
                                <input type="text" placeholder="Enter your address" name="address" id="address">
                                <i class="fas fa-exclamation-circle"></i>
                                <small> Error message</small>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Enter your password" name="password" id="password">
                                <i class="fas fa-exclamation-circle"></i>
                                <small> Error message</small>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Confirm your password" name="cpassword"
                                    id="confirmedPassword">
                                <i class="fas fa-exclamation-circle"></i>
                                <small> Error message</small>
                            </div>
                            <div class="buttons input-box">
                                <input type="submit" value="submit">
                            </div>
                            <div class="text">Already have an account? <label for="flip">Login now</label></div>
                            <div class="ServerResponse"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- including javascript script -->
        <script src="/Customer_Website/javascript/script.js"></script>
        <script src="/Customer_Website/javascript/loginRegistration.js"></script>
    </body>

</html>