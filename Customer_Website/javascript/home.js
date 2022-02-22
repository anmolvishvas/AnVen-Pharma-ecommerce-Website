"use strict";
// importing recommender from the js file
import {
    Recommender
} from './recommendation.js';
let recommender = new Recommender();

// calling showRecommendation function when page loaded
window.onload=showRecommendation;
let ProductArray;

// function to perform the recommendation requests
function showRecommendation() {
    // if sessionStorage.search is empty
    if (sessionStorage.search == undefined || sessionStorage.search == '') {
        // item related to the keyword covid will be displayed
        let Keyword = 'covid';
        // performing new requests
        let request = new XMLHttpRequest();

        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if (request.status === 200) {
                //Add data from server to page
                displayProducts(request.responseText);
            } else
                toastr.error("Error communicating with server: " + request.status);
        };

        //Set up request and send it
        request.open("POST", "loadProduct.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("keyword=" + Keyword);
    } else {
        // adding keywords that are in sessionstorage.seach into the recommender
        recommender.addKeyword(sessionStorage.search);
        // calling loadProducts function
        loadProducts();
    }
}

// loadProducts function
function loadProducts() {
    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Add data from server to page
            displayProducts(request.responseText);
        } else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request and send it
    request.open("POST", "loadProduct.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // sending the keyword that have been search many times
    request.send("keyword=" + recommender.getTopKeyword());
}

// displaying the products
function displayProducts(jsonProducts) {
    let prodArray = JSON.parse(jsonProducts);
    ProductArray = prodArray;

    //Create HTML table containing product data
    let htmlStr = '';
    htmlStr += '<h1 style="font-size:42px">Recomendation</h1>' +
        '<div class="banner-content"> <div class="box">';
    for (let i = 0; i < prodArray.length; ++i) {
        htmlStr += '<div class="content">';
        htmlStr += '<img src="' + prodArray[i].imageurl + '" alt="">';
        htmlStr += '<h3>' + prodArray[i].Product + '</h3>' +
            '</div>';
    }
    htmlStr += '</div></div>';
    document.getElementById("Recomendation").innerHTML = htmlStr;
}