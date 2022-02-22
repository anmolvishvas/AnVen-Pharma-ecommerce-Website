window.onload = loadOrders;
// let loggedInUsername = getUsername();

let OrderArray;

//getting orders from the database
function loadOrders() {
    let request = new XMLHttpRequest();

    request.onload = () => {
        if (request.status === 200) {
            displayOrders(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };
    request.open("GET", "loadOrder.php");
    request.send();
}

//displaying the orders stored in the database on the view order page
function displayOrders(jsonOrders) {
    //Convert JSON to array of order objects
    let order = JSON.parse(jsonOrders);
    OrderArray = order;
    let htmlStr = '';
    for (let i = 0; i < order.length; i++) {

        //Create HTML table containing order data
        date = order[i].date;
        for (let j = 0; j < order[i].products.length; j++) {
            htmlStr += '<tr><td><h5>' + date + '</h5></td>' +
                '<td><h5>' + order[i].username + '</h5></td>' +
                '<td><h5>' + order[i].products[j].Product + '</h5></td>' +
                '<td><h5>' + order[i].products[j].Category + '</h5></td>' +
                '<td><h5>' + order[i].products[j].quantity + '</h5></td>' +
                '<td><h5>' + (order[i].products[j].price * order[i].products[j].quantity) + '</h5></td>' +
                '<td><button class="Delbutton" onclick="deleteOrder(\'' + order[i]._id.$oid + '\')">Delete</button></td>' +
                '</tr>';
        }
        document.getElementById("Content").innerHTML = htmlStr;
    }

}

//redierecting user delete order page when deleting an order
function deleteOrder(orderId) {
    window.location.href = "deleteOrder.php?id=" + orderId;
}