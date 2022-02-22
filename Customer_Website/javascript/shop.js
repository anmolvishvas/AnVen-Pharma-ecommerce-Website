window.onload = loadProducts;
// displayProducts();
let ProductArray;
// when search icon is pressed
document.getElementById('searchButton').onclick = searchQuery;

// function to load products
function loadProducts() {
    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //calling the display product function
            displayProducts(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };
    //Set up request 
    request.open("GET", "loadProduct.php");
    // send request
    request.send();
}


//price range of products from ascending order
function PriceAsc() {
    let sort = true;
    // looping through product array
    for (let i = 1; i < ProductArray.length && sort; i++) {
        sort = false;
        for (let j = 0; j < ProductArray.length - 1; j++) {
            // sorting the products in descending mode
            if (parseInt(ProductArray[j].Price) > parseInt(ProductArray[j + 1].Price)) {
                let temp = ProductArray[j + 1];
                ProductArray[j + 1] = ProductArray[j];
                ProductArray[j] = temp;
                sort = true;
            }
        }
    }
    // calling displayProducts function
    displayProducts(JSON.stringify(ProductArray));
}

//using the search bar
function searchQuery() {
    var search = document.getElementById('box-search').value.toLowerCase();
    // storing search input in session storage
    sessionStorage.search = JSON.stringify(search);

    // performing new request
    let request = new XMLHttpRequest();
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //calling the display product function
            displayProducts(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };

    //Set up request 
    request.open("POST", "loadProduct.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // send request
    request.send("keyword=" + search);
};

//viewing products from descending order
function PriceDesc() {
    let sort = true;
    // looping through product array
    for (let i = 1; i < ProductArray.length && sort; i++) {
        sort = false;
        // sorting in ascending price
        for (let j = 0; j < ProductArray.length - 1; j++) {
            if (parseInt(ProductArray[j].Price) < parseInt(ProductArray[j + 1].Price)) {
                let temp = ProductArray[j + 1];
                ProductArray[j + 1] = ProductArray[j];
                ProductArray[j] = temp;
                sort = true;
            }

        }
    }
    //calling the display product function

    displayProducts(JSON.stringify(ProductArray));
}

//Loads products into page
function displayProducts(jsonProducts) {
    //Convert JSON to array of product objects
    let prodArray = JSON.parse(jsonProducts);
    ProductArray = prodArray;

    //Create HTML table containing product data
    let htmlStr = '';
    for (let i = 0; i < prodArray.length; ++i) {
        htmlStr += '<div class="item-image">' +
            '<div class="icon">' +
            '<button class="details" onclick="StoreDetails(\'' + prodArray[i].imageurl + '\',\'' + prodArray[i].Product + '\',\'' + prodArray[i].Category + '\',\'' + prodArray[i].Price + '\',\'' + prodArray[i].Quantity + '\',\'' + prodArray[i].Details + '\')">More Details</button>' +
            // '<p>'+prodArray[i].Details+'</p>'
            '<a href="#" class="fas fa-cart-plus" onclick="addToBasket(\'' + prodArray[i].imageurl + '\',\'' + prodArray[i].Product + '\',\'' + prodArray[i].Category + '\',\'' + prodArray[i].Price + '\')"></a>' +
            '</div>' +
            '<div class="item">';
        htmlStr += '<img src="' + prodArray[i].imageurl + '" alt="">' +
            '</div>' +
            '<div class="content">';
        htmlStr += '<h3>' + prodArray[i].Product + '</h3>';
        htmlStr += '<h4>' + prodArray[i].Category + '</h4>';
        htmlStr += '<div class="price"> Rs. ' + prodArray[i].Price + '</div>' +
            ' </div>' +
            '</div>';
    }
    //Finish off table and add to document
    document.getElementById("shop").innerHTML = htmlStr;
}

//add the product image, name, category, price to the basket function
function addToBasket(productImage, productName, productCategory, productPrice) {
    let basket = getBasket();
    let found;

    // looping through the basket
    for (let i = 0; i < basket.length; i++) {
        // checking if it has the same name
        if (basket[i].Product == productName) {
            found = true;
            // if yes, increasing the quantity
            basket[i].quantity++;
            break;
        }
    }
    // if product name not in basket, it will push the data of that specific 
    if (!found) {
        basket.push({
            imageurl: productImage,
            Product: productName,
            Category: productCategory,
            price: productPrice,
            quantity: 1
        });
    }
    sessionStorage.basket = JSON.stringify(basket);
}

//getting the products stored in the basket
function getBasket() {
    let basket;
    // creating basket session storage if it doesn't exist
    if (sessionStorage.basket === undefined || sessionStorage.basket === "") {
        basket = [];
    } else {
        basket = JSON.parse(sessionStorage.basket);
    }
    return basket;
}

//storing the product details into the database
function StoreDetails(productImage, productName, productCategory, productPrice, productQuantity, productDetails) {
    let details = {
        "image": productImage,
        "name": productName,
        "category": productCategory,
        "price": productPrice,
        "quantity": productQuantity,
        "details": productDetails
    }
    sessionStorage.details = JSON.stringify(details);
    // redirecting the user to the productDetails page
    window.location.href = 'productDetails.php';
}