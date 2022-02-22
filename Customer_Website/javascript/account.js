//calling the loadprofile function when the page is loaded
window.onload = loadProfile;

//connecting to the database server
function loadProfile() {
    let request = new XMLHttpRequest();
    request.onload = () => {
        if (request.status === 200) {
            // calling the DisplayProfile function with the user details in json format
            DisplayProfile(request.responseText);
        } else {
            alert("Error while communicating with server: " + request.status);
        }
    };
    // opening the request in get mode
    request.open("GET", "getUserDetails.php");
    // sending request
    request.send();
}

// display profile function
function DisplayProfile(Userjson) {
    let profile = JSON.parse(Userjson);
    //form for adding a user account
    let htmlStr = '';
    htmlStr += '<h2>Full name: </h2>' +
        '<input id="fullname" type="text" name ="fullname" value="' + profile[0].Name + '">' +
        '<h2>Username: </h2>' +
        '<input id="username" type="text" name="username" value="' + profile[0].username + '" disabled>' +
        '<h2>Email: </h2>' +
        '<input id="email" type="text" name="email" value="' + profile[0].email + '">' +
        '<h2>Phone Number: </h2>' +
        '<input id="phonenumber" type="text" name="phonenumber" value="' + profile[0].PhoneNumber + '">' +
        '<h2>Address: </h2>' +
        '<input id="address" name="address" type="text" value="' + profile[0].address + '">' +
        '<h2>Password: </h2>' +
        '<input id="password" name="password" type="password" value="' + profile[0].password + '">' +
        '<button class="Edbutton" onclick="update()">Save</button>';

    // displaying the user details into the form using the id
    document.getElementById('user_account').innerHTML = htmlStr;
}

//updating user account
function update() {
    // performing a new request
    let request = new XMLHttpRequest();

    request.onload = () => {
        if (request.status === 200) {
            // calling the DisplayProfile function with the user details in json format
            DisplayProfile(request.responseText);
        } else {
            alert("Error while communicating with server: " + request.status);
        }
    };

    // opening the request on post mode
    request.open("POST", "updateCustomer.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //retrieving input from the user
    let fname = document.getElementsByName("fullname")[0].value;
    let uname = document.getElementsByName("username")[0].value;
    let email = document.getElementsByName("email")[0].value;
    let phonenumber = document.getElementsByName("phonenumber")[0].value;
    let address = document.getElementsByName("address")[0].value;
    let pass = document.getElementsByName("password")[0].value;

    //sending new user details to the database
    request.send("fullname=" + fname +
        "&username=" + uname +
        "&email=" + email +
        "&phonenumber=" + phonenumber +
        "&address=" + address +
        "&password=" + pass);
}