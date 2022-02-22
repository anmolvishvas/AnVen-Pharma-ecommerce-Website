//calling loadOrders function when the page loads
window.onload = loadOrders;
// setting the loggedInUsername with the username we'll get from the server
let loggedInUsername = getUsername();

let OrderArray;

// function to loadOrder
function loadOrders() {
    // performing a new request
    let request = new XMLHttpRequest();

    request.onload = () => {
        if (request.status === 200) {
            // calling displayOrders function
            displayOrders(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };
    // opening the request in get mode
    request.open("GET", "loadOrder.php");
    // sending request
    request.send();
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

//displaying user orders
function displayOrders(jsonOrders) {
    let order = JSON.parse(jsonOrders);
    OrderArray = order;
    // if the length of order is 0, mean no order yet
    if (order.length == 0) {
        document.getElementById('Content').style.color = "red";
        document.getElementById('Content').style.fontSize = "xx-large";
        document.getElementById('Content').style.margin = "155px 600px";
        document.getElementById('Content').innerHTML = "No order passed yet!";
    } else {
        let htmlStr = '';
        // displaying the order table
        htmlStr += '<thead><tr><td>Date</td><td>Image</td><td>Product</td><td>Price</td><td>Quantity</td><td>Total</td></tr></thead><tbody>';
        // looping through the order data
        for (let i = 0; i < order.length; i++) {
            // checking if the user loggedin made an order previously
            if (order[i].username == loggedInUsername) {
                date = order[i].date;
                //creating a table to display the orders made
                for (let j = 0; j < order[i].products.length; j++) {
                    htmlStr += '<tr><td><h5>' + date + '</h5></td>' +
                        '<td><img src="' + order[i].products[j].imageurl + '" alt=""></td>' +
                        '<td><h5>' + order[i].products[j].Product + '</h5></td>' +
                        '<td><h5>' + order[i].products[j].price + '</h5></td>' +
                        '<td><h5>' + order[i].products[j].quantity + '</h5></td>' +
                        '<td><h5>' + (order[i].products[j].price * order[i].products[j].quantity) + '</h5></td></tr>';
                }
            }
            htmlStr += '</tbody>';
            document.getElementById("Content").innerHTML = htmlStr;
        }
    }

}