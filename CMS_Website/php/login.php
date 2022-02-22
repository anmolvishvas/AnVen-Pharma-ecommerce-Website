<?php
//session start
    session_start();
    require __DIR__ . '/vendor/autoload.php';

    //user input fields
    $Username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $Password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $_SESSION['loggedInUser'] = $Username;
    
?>

<!DOCTYPE html>
<html lang="en">
    <!-- head section of the webpage -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- title of the page-->
        <title>Login</title>
        <!-- linking the font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- css link -->
        <link rel="stylesheet" href="/CMS_Website/css/style.css">
    </head>

    <!-- body -->

    <body class="login-page">
        <!-- header with the logo -->
        <header>
            <!-- logo -->
            <div class="logo">
                <img src="/images/Pharmacy Logo.png" alt="">
            </div>
            <h1>Management system</h1>
            <div class="icon">
            </div>
        </header>



        <!-- login form -->
        <div class="login-container">
            <div class="login-form">
                <!-- title -->
                <div class="title"><span>Sign in</span>
                </div>
                <form id="login_form">
                    <div class="inputs">
                        <!-- username input section -->
                        <div class=" row">
                            <p>Username</p>
                            <i class="fas fa-user"></i>
                            <input type="text" name="username" placeholder="username" id="username_login">
                            <i class="fas fa-exclamation-circle"></i>
                            <small> Error message</small>
                        </div>

                        <!-- password input section -->
                        <div class="row">
                            <p>Password</p>
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" placeholder="Password" id="password_login">
                            <i class="fas fa-exclamation-circle"></i>
                            <small> Error message</small>
                        </div>

                        <!-- button -->
                        <div class="row button">
                            <input type="submit" id="login" name="login" value="Login">
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <!-- footer of the page -->
        <section class="copyright">
            <h4>© AnVen Pharma - All Rights Reserved </h4>
        </section>

        <script src="/CMS_Website/javascript/login.js"></script>
        <script src="/CMS_Website/javascript/common.js"></script>

    </body>

</html>