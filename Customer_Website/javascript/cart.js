//declaring variables
let userFullName;
let userEmail;
let userAddress;
var totalAmount;
// setting the loggedInUsername with the username we'll get from the server
let loggedInUsername = getUsername();
// calling the server connection function
serverConnection();

//calling the displaycart function when the page is loaded
window.onload = DisplayCart;

// function to display cart
function DisplayCart() {

    // when the sessionStorage.basket is empty
    if (sessionStorage.basket === undefined || sessionStorage.basket === "") {
        document.getElementById('CartContent').style.color = "red";
        document.getElementById('CartContent').style.fontSize = "xx-large";
        document.getElementById('CartContent').style.margin = "75px 600px";
        document.getElementById('CartContent').innerHTML = "No items in basket yet!";
    } else {
        let htmlStr = '';
        // getting data from the session storage in json format
        let basket = JSON.parse(sessionStorage.basket);

        //Create HTML table containing cart data
        htmlStr += '<thead><tr><td>Image</td><td>Product</td><td>Category</td><td>Price</td><td>Quantity</td><td>Total</td></tr></thead><tbody>';
        // looping through the json file and displaying it 
        for (let i = 0; i < basket.length; i++) {
            htmlStr += '<tr>' +
                '<td><img src="' + basket[i].imageurl + '" alt=""></td>' +
                '<td><h5>' + basket[i].Product + '</h5></td>' +
                '<td><h5>' + basket[i].Category + '</h5></td>' +
                '<td><h5>' + basket[i].price + '</h5></td>' +
                '<td><h5>' + basket[i].quantity + '</h5></td>' +
                '<td><h5>' + (basket[i].quantity * basket[i].price) + '</h5></td>';
        }
        htmlStr += '</tbody>';
        // displaying the basket in the webpage
        document.getElementById("CartContent").innerHTML = htmlStr;
    }
}

//conecting to the server database
function getUsername() {
    // performing a new request
    let request = new XMLHttpRequest();

    request.onload = () => {
        if (request.status == 200) {
            // fetching the username from the server
            loggedInUsername = request.responseText;
            // loggedInUsername;
        } else {
            alert("Error while communicating with server" + request.status);
        }
        return
    };

    // opening the request in get mode
    request.open("GET", "checkUsername.php");
    // sending request
    request.send();
}

//connecting to server to get user billing details
function serverConnection() {
    // performing a new request
    let request = new XMLHttpRequest();
    request.onload = () => {
        if (request.status === 200) {
            // calling the DisplayUserBillingDetails function
            response = DisplayUserBillingDetails(request.responseText);
        } else {
            alert("Error while communicating with server: " + request.status);
        }
    };
    // opening the request in get mode
    request.open("GET", "checkCredentials.php");
    // sending request
    request.send();
}

//connecting to server to display user billing details
function DisplayUserBillingDetails(jsonCustomer) {
    // converting the customer details into object
    let array = JSON.parse(jsonCustomer);
    // looping through the array
    for (let i = 0; i < array.length; ++i) {
        // checking if the user loggedin ordered befored
        if (loggedInUsername == array[i].username) {
            userFullName = array[i].Name;
            userEmail = array[i].email;
            userAddress = array[i].address;
        }
        // displaying the user details
        document.getElementById('fname').value = userFullName;
        document.getElementById('email').value = userEmail;
        document.getElementById('address').value = userAddress;
    }
    // calling displaySummary functiom
    displaySummary();
}

//displaying total amount and summary of items in the cart
function displaySummary() {
    let htmlStr = '';
    // converting the sessionStorage.basket into object
    let basket = JSON.parse(sessionStorage.basket);
    // setting total to 0
    let total = 0;
    // looping through the basket
    for (let i = 0; i < basket.length; i++) {
        // calculating the total
        total = total + (basket[i].quantity * basket[i].price);
    }
    // displaying into webpage
    htmlStr = '<tr>' + '<td>' + '<h3>Order Total</h3>' +
        '</td>' + '<td><h2>Rs. ' + total.toFixed(2) + '</h2></td>' + '</td>' + '</tr>';
    document.getElementById("SummaryContent").innerHTML = htmlStr;

    totalAmount = total;
    // storing the total into session storage
    sessionStorage.setItem('total', totalAmount.toFixed(2));
}

// confirmation function
function confirmation() {
    // redirecting to the confirmation window page
    window.location.href = 'confirmationWindow.php';
}