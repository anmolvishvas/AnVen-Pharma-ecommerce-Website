//declaring variables to be used
const login_form = document.getElementById("login_form");
const login_username = document.getElementById('username_login');
const login_password = document.getElementById('password_login');

//calling the init function immediately the page is loaded
window.onload = init;

function init() {
    login_form.addEventListener('submit', (event) => {
        event.preventDefault();
        performLogin();
    })
}

// perform login function
function performLogin() {
    // performing new request
    let request = new XMLHttpRequest();
    request.onload = () => {
        if (request.status === 200) {
            // calling validateLogin function
            response = validateLogin(request.responseText);
        } else {
            alert("Error while communicating with server: " + request.status);
        }
    };
    // opening request in get mode
    request.open("GET", "/CMS_Website/php/checkCredentials.php");
    // send request
    request.send();
}

//function to check user login inputs
function validateLogin(jsonStaff) {
    let staffArray = JSON.parse(jsonStaff);
    let usernameValue = login_username.value;
    let passwordValue = login_password.value;

    user_exist = false;

    //looping through staff array
    for (let i = 0; i < staffArray.length; i++) {
        // checking is its the same username
        if (staffArray[i].username == usernameValue) {
            user_exist = true;
            // if credentials well entered, it will redirect the user to the next page
            if (staffArray[i].username == usernameValue && staffArray[i].password == passwordValue) {
                setSuccess(login_username);
                setSuccess(login_password);
                // performing a new request
                let request = new XMLHttpRequest();
                request.onload = () => {
                    if (request.status === 200) {
                        let responseData = request.responseText;
                    } else {
                        alert("Error while communicating with server: " + request.status);
                    }
                };
                // opening request in post mode
                request.open("POST", "/CMS_Website/php/login.php");
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                let userUsername = document.getElementsByName("username")[0].value;
                let userPassword = document.getElementsByName("password")[0].value;
                // sending request
                request.send("username=" + userUsername +
                    "&password=" + userPassword);

                sessionStorage.setItem('logged_in', usernameValue);
                // redirecting the user to view staff page
                window.location.href = "/CMS_Website/php/viewStaff.php";
                return;
            } else {
                setSuccess(login_username);
                // dispkaying possible error message if password not well entered
                if (passwordValue == '') {
                    setError(login_password, "Password cannot be blank");
                } else {
                    setError(login_password, "Incorrect Password");
                }
                return;
            }
        } else {
            // displaying possible error message if credentials not well entered
            if (usernameValue == '' && passwordValue == '') {
                setError(login_username, "Username cannot be blank");
                setError(login_password, "Password cannot be blank");
            } else if (!(staffArray[i].username == usernameValue) && passwordValue == '') {
                setError(login_username, "Username doesn't exit");
                setError(login_password, "Password cannot be blank");
            } else if (!(staffArray[i].username == usernameValue) && !(staffArray[i].password == passwordValue)) {
                setError(login_username, "Username doesn't exit");
                setError(login_password, "Incorrect Password");
            } else {
                setError(login_password, "Incorrect Password");
            }
        }
    }
}

//displaying error message
function setError(input, message) {
    const RowBox = input.parentElement;
    const small = RowBox.querySelector("small");
    RowBox.className = "row error";
    small.innerText = message;
}

//displaying success message
function setSuccess(input) {
    const RowBox = input.parentElement;
    RowBox.className = "row success";
}