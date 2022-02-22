// checkout function
function checkout() {
    // getching data from inputs
    let fname = document.getElementById('fullname').value;
    let pnumber = document.getElementById('phonenumber').value;
    let address = document.getElementById('address').value;

    // calling loadProduct function
    loadProduct();
    //checking if the input are not empty
    if (fname == "" && pnumber == "" && address == "") {
        alert("Kindly enter the required details to process the checkout");
    } else if (fname != "" && pnumber != "" && address != "") {
        let request = new XMLHttpRequest();

        //Set up request with HTTP method and URL 
        request.open("POST", "checkoutServer.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //Send request
        request.send("sessionStorage=" + sessionStorage.basket + "&total=" + sessionStorage.total);
    }
}

//communicating with the server to get the products stored
function loadProduct() {
    // performing a new request
    let request = new XMLHttpRequest();

    request.onload = () => {
        if (request.status === 200) {
            // calling getProduct function
            GetProducts(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };
    // opening the request in get mode
    request.open("GET", "loadProduct.php");
    // sending request
    request.send();
}

// getProducts function with jsonProduct details as parameters
function GetProducts(jsonProducts) {
    // getting the jsonProduct data
    let prodArray = JSON.parse(jsonProducts);
    ProductArray = prodArray;

    let basket = JSON.parse(sessionStorage.basket);
    // looping through basket
    for (let j = 0; j < basket.length; j++) {
        for (let i = 0; i < prodArray.length; ++i) {
            // checking if they have the same name
            if (basket[j].Product == prodArray[i].Product) {
                // performing a new request
                let request = new XMLHttpRequest();
                //Set up request with HTTP method and URL 
                request.open("POST", "updateDatabase.php");
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                //Send request
                request.send("product_name=" + prodArray[i].Product +
                    "&product_image=" + prodArray[i].imageurl +
                    "&product_category=" + prodArray[i].Category +
                    "&product_price=" + prodArray[i].Price +
                    "&product_description=" + prodArray[i].Description +
                    "&product_quantity=" + prodArray[i].Quantity +
                    "&product_details=" + prodArray[i].Details +
                    "&quantity=" + basket[j].quantity);

                //clearing data stored into sessionstorage
                sessionStorage.removeItem('total');
                sessionStorage.removeItem('basket');
                //redirecting to the home page
                window.location.href = 'home.php';
            }
        }

    }
}