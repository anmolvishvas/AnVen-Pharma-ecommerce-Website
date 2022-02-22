<!DOCTYPE html>
<html lang="en">

    <!-- head section of the page -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> confirm Order </title>

        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- css link -->
        <link rel="stylesheet" href="/Customer_Website/css/style.css">
    </head>

    <body style='background-color:#ABF0E9'>
        <img src="/images/Pharmacy Logo.png" style='margin-left:45%' alt="">

        <!--confirming the contact details -->
        <h1 style='text-align:center; margin-top:25px; font-size:42px'>Confirm Contact Details </h1>
        <div class="headings">
            <p>Full Name:</p>
            <p>Phone Number:</p>
            <p>Address:</p>
        </div>
        <div class="input-cart">
            <input id="fullname" type="text" name="fullname" required>
            <input id="phonenumber" type="text" name="phonenumber" required>
            <input id="address" name="address" type="text" required>
        </div>
        <button class="button summary" onclick='checkout()'>Confirm</button>

    </body>
    <script src="/Customer_Website/javascript/checkout.js"></script>


</html>