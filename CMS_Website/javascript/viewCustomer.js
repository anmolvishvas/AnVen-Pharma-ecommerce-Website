//calling the function loadcustomers immediately the page is loaded
window.onload = loadCustomers;
let CustomerArray;

//getting customers stored from the database
function loadCustomers() {
    let request = new XMLHttpRequest();

    request.onload = () => {
        if (request.status === 200) {
            DisplayCustomers(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };

    request.open("GET", "listCustomer.php");
    request.send();
}

//displaying the customers stored in the database on the view order page
function DisplayCustomers(jsonCustomers) {
    //Convert JSON to array of order objects
    let customersArray = JSON.parse(jsonCustomers);
    CustomerArray = customersArray;

    //Create HTML table containing customers data
    let htmlStr = '';
    for (let i = 0; i < customersArray.length; ++i) {
        htmlStr += '<tr><td><h6>' + customersArray[i]._id.$oid + '</h6></td>' +
            '<td><h6>' + customersArray[i].Name + '</h6></td>' +
            '<td><h6>' + customersArray[i].username + '</h6></td>' +
            '<td><h6>' + customersArray[i].email + '</h6></td>' +
            '<td><h6>' + customersArray[i].PhoneNumber + '</h6></td>' +
            '<td><h6>' + customersArray[i].address + '</h6></td>' +
            '</tr>';
    }

    document.getElementById("customer_table").innerHTML = htmlStr;
}