//calling displayProducts function on page load
window.onload = displayProducts;

//displaying product details
function displayProducts() {
    let htmlImg = '';
    let htmlStr = '';
    let details = JSON.parse(sessionStorage.details);
    htmlImg = '<img src="' + details.image + '" alt="">';
    htmlStr += '<h3>' + details.name + '</h3>';
    htmlStr += '<h4>' + details.category + '</h4>';
    htmlStr += '<p> <span style="font-weight: 500; font-size:22px">Price:</span>  Rs.' + details.price + '<br> <span style="font-weight: 500; font-size:22px">Availability:</span>  ' + details.quantity + '</p>';
    htmlStr += '<p> <span style="font-weight: 500; font-size:22px">Product Description:</span>  ' + details.details + '</p>';
    document.getElementById("picture").innerHTML = htmlImg;
    document.getElementById("detail").innerHTML = htmlStr;

}