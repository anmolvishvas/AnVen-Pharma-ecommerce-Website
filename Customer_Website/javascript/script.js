// fetching the id and storing it into variables
const header = document.querySelector(".header");
let search = document.querySelector('.search-form');
let nav_login = document.getElementById("login");
let nav_logout = document.getElementById("logout");
let settings = document.getElementById("settings");

// script to display the navigation bar's background
window.onscroll = function () {
    var top = window.scrollY;
    if (top >= 100) {
        header.classList.add("active");
    } else {
        header.classList.remove("active");
    }
}

// displaying the search input
document.querySelector("#search").onclick = () => {
    search.classList.toggle("active");
}

// function for login icon
document.querySelector("#login").onclick = () => {
    window.location.href = "login.php";
}

// function for cart icon
document.querySelector("#cart").onclick = () => {
    window.location.href = "shopping_cart.php";
}

// logout function
function LogOut() {
    // deleting the sessionstorage
    delete sessionStorage.logged_in;
    // displaying the login icon
    nav_login.style.display = "inline-flex";
    // hiding the logout icon and settings icon
    nav_logout.style.display = "none";
    settings.style.display = "none";

    // performing a new request
    let request = new XMLHttpRequest();

    request.onload = () => {
        if (request.status === 200) {
            if (request.responseText == "ok") {
                alert('signed out');
            }
        } else
            alert("Error communicating with server: " + request.status);
    };
    // opening request in get mode
    request.open("GET", "/Customer_Website/php/signout.php");
    // sending request
    request.send();
    // removing data from session storage
    sessionStorage.removeItem('total');
    sessionStorage.removeItem('basket');
    // redirecting the user to the home page
    window.location.href = 'home.php';
}

if (!(sessionStorage.logged_in == null)) {
    nav_login.style.display = "none";

} else {
    nav_logout.style.display = "none";
    settings.style.display = "none";
}