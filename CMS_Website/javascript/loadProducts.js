//Viewing the products in the database
window.onload = loadProducts;
let ProductArray;

//communicating with the server to get the products stored in the database
function loadProducts() {
    let request = new XMLHttpRequest();

    request.onload = () => {
        if (request.status === 200) {
            displayProducts(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };

    request.open("GET", "loadProduct.php");
    request.send();
}

function displayProducts(jsonProducts) {
    //Convert JSON to array of product objects
    let prodArray = JSON.parse(jsonProducts);
    ProductArray = prodArray;

    //Create HTML table containing product data
    let htmlStr = '';
    for (let i = 0; i < prodArray.length; ++i) {
        htmlStr += '<tr>' +
            '<td> <img src="' + prodArray[i].imageurl + '" alt="">' + '</td>' +
            '<td> <h5>' + prodArray[i].Product + '</h5>' + '</td>' +
            '<td><h5>' + prodArray[i].Category + '</h5>' + '</td>' +
            '<td><h5>' + prodArray[i].Price + '</h5>' + '</td>' +
            '<td><h5>' + prodArray[i].Quantity + '</h5>' + '</td>' +
            '<td><button class="Edbutton" onclick="getProduct(\'' + prodArray[i]._id.$oid + '\')">Edit</button></td>';
    }
    document.getElementById("e_product").innerHTML = htmlStr;
}

//function for editing specific products in the view products page
function getProduct(productId) {
    console.log(productId);
    window.location.href = "editProduct.php?id=" + productId;
}
