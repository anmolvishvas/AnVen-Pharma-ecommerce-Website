//Updating the products in the database
function performupdate() {

    //Create request object 
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Get data from server
            let response = request.responseText;
        } else
            alert("Error communicating with server: " + request.status);
    };

    //Set up request with HTTP method and URL 
    request.open("POST", "performUpdate.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Extract product data
    let productImage = document.getElementById("img").value;
    let productName = document.getElementById("product_name").value;
    let productCategory = document.getElementById("product_category").value;
    let price = document.getElementById("price").value;
    let quantity = document.getElementById("quantity").value;
    let productDescription = document.getElementById("description").value;
    let productDetails = document.getElementById("details").value;

    //Send request
    request.send("img=" + productImage +
        "&product_name=" + productName +
        "&product_category=" + productCategory +
        "&price=" + price +
        "&quantity=" + quantity +
        "&description=" + productDescription +
        "&details=" + productDetails);

        //display new products in the view products page
    window.location.href = 'viewProduct.php';
}