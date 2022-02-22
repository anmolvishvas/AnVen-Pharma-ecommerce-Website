let nav_logout = document.getElementById("logout");

//This is to log out of the session in the CMS website 
function LogOut() {
    delete sessionStorage.logged_in;
    nav_logout.style.display = "none";

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
    // opening the request in get mode
    request.open("GET", "/CMS_Website/php/signout.php");
    // sending request
    request.send();
    // redirecting the user to the login page
    window.location.href = "/CMS_Website/php/login.php";
}

//This is to check if the user has already logged in and if not, user is redirected to the login page
if (!(sessionStorage.logged_in == null)) {
    console.log("user already logged in");
} 
else if (sessionStorage.logged_in == null){
    nav_logout.style.display = "none";
    window.location.href = "/CMS_Website/php/login.php";
}
