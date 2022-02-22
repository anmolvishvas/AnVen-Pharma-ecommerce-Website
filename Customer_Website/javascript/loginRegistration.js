//creating variables to store user input
// inputs in login form
const login_form = document.getElementById("login_form");
const login_username = document.getElementById('username_login');
const login_password = document.getElementById('password_login');
// inputs in registration form
const registration_form = document.getElementById("registration_form");
const fullName = document.getElementById("fullName");
const username = document.getElementById("username");
const email = document.getElementById("email");
const phoneNumber = document.getElementById("phoneNumber");
const address = document.getElementById("address");
const password = document.getElementById("password");
const confirmedPassword = document.getElementById("confirmedPassword");

// used to validate password
let strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])");
let check_special_character = new RegExp("^(?=.*[!@#\$%\^&\*])");
let minRegex = new RegExp("(?=.{8,})");

window.onload = init;

// when window loaded 
function init() {
    // functions that will be called to perform validations of the inputs when the registration button will be pressed
    registration_form.addEventListener('submit', (event) => {
        event.preventDefault();
        validateInputs();
    });
    // functions that will be called to perform validations of the inputs when the login button will be pressed
    login_form.addEventListener('submit', (event) => {
        event.preventDefault();
        performLogin();
    })
}

//function to communicate with the server and get the credentials
function performLogin() {
    // performing a new request
    let request = new XMLHttpRequest();
    request.onload = () => {
        if (request.status === 200) {
            // calling validateLogin function
            validateLogin(request.responseText);
        } else {
            alert("Error while communicating with server: " + request.status);
        }
    };
    // opening request in get mode
    request.open("GET", "checkCredentials.php");
    // sending request
    request.send();
}

// validate login function using customer details in json format
function validateLogin(jsonCustomer) {
    // storing the data in customer Array
    let customerArray = JSON.parse(jsonCustomer);
    let usernameValue = login_username.value;
    let passwordValue = login_password.value;
    user_exist = false;

    //validating user details to see if they meet the requirements
    // looping through the customerArray
    for (let i = 0; i < customerArray.length; i++) {
        // checking if the username exist
        if (customerArray[i].username == usernameValue) {
            user_exist = true;
            // checking if the username entered and password entered are similar as the one in the database
            if (customerArray[i].username == usernameValue && customerArray[i].password == passwordValue) {
                // if yes, the user will be able to login
                setSuccess(login_username);
                setSuccess(login_password);

                // performing new request
                let request = new XMLHttpRequest();
                request.onload = () => {
                    if (request.status === 200) {
                        let responseData = request.responseText;
                    } else {
                        alert("Error while communicating with server: " + request.status);
                    }
                };
                // opening the request in post mode
                request.open("POST", "check_login.php");
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                // storing the values entered into variabbles
                let userUsername = document.getElementsByName("login_username")[0].value;
                let userPassword = document.getElementsByName("login_password")[0].value;
                // sending the request with the data entered
                request.send("login_username=" + userUsername +
                    "&login_password=" + userPassword);
                sessionStorage.setItem('logged_in', usernameValue);
                // redirecting the user to the home page
                window.location.href = "home.php";
                return;
            } else {
                // if username exist
                setSuccess(login_username);
                // if password empty
                if (passwordValue == '') {
                    // it will display an error message
                    setError(login_password, "Password cannot be blank");
                } else {
                    // else it will display an error message with a different message
                    setError(login_password, "Incorrect Password");
                }
                return;
            }
        } else {
            // validation of possible input errors
            if (usernameValue == '' && passwordValue == '') {
                setError(login_username, "Username cannot be blank");
                setError(login_password, "Password cannot be blank");
            } else if (!(customerArray[i].username == usernameValue) && passwordValue == '') {
                setError(login_username, "Username doesn't exit");
                setError(login_password, "Password cannot be blank");
            } else if (!(customerArray[i].username == usernameValue) && !(customerArray[i].password == passwordValue)) {
                setError(login_username, "Username doesn't exit");
                setError(login_password, "Incorrect Password");
            } else {
                setError(login_password, "Incorrect Password");
            }
        }
    }
}

//validating sign up input fields
const validateInputs = () => {
    // fetching data entered and storing it into variables
    let fullNameValue = fullName.value.trim();
    let usernameValue = username.value.trim();
    let emailValue = email.value.trim();
    let phoneNumberValue = phoneNumber.value.trim();
    let addressValue = address.value.trim();
    let passwordValue = password.value.trim();
    let confirmedPasswordValue = confirmedPassword.value.trim();

    let check_fullName = true;
    let check_username = true;
    let check_email = true;
    let check_phoneNumber = true;
    let check_address = true;
    let check_password = true;
    let check_confirmedPassword = true;

    // getting the parent class
    let username_class = username.parentElement;

    // validation for email
    var atSymbol = emailValue.indexOf("@");
    var dot = emailValue.lastIndexOf(".");

    //fullname validation
    if (fullNameValue === "") {
        // display an error message if fullname is blank
        setError(fullName, "Full name cannot be blank.");
        check_fullName = false;
        return;
    } else if (fullNameValue.length <= 2) {
        // display an error message if fullname length is less than 3
        setError(fullName, "First name must have a minimum of 3 characters.");
        check_fullName = false;
        return;
    } else {
        // displaying an success message if requirements are met
        setSuccess(fullName);
        check_fullName = true;
    }

    // performing a new request
    let request = new XMLHttpRequest();
    request.onload = () => {
        if (request.status === 200) {
            // calling usernameCheck function
            response = usernameCheck(request.responseText, usernameValue);
        } else {
            alert("Error while communicating with server: " + request.status);
        }
    };
    // opening request in get mode
    request.open("GET", "checkCredentials.php");
    // sending request
    request.send();

    //username validation
    if (usernameValue === "") {
        // display an error message if username is blank
        setError(username, "Username cannot be blank.");
        check_username = false;
        return;
    } else if (usernameValue.length <= 2) {
        // display an error message if username length is less than 3
        setError(username, "Username must have a minimum of 3 characters.");
        check_username = false;
        return;
    } else {
        // displaying an success message if requirements are met
        setSuccess(username);
        check_username = true;
    }

    //email address validation
    if (emailValue === "") {
        // display an error message if email is blank
        setError(email, "Email cannot be blank");
        check_email = false;
        return;
    } else if (atSymbol < 1) {
        // display an error message if email doesn't include @ symbol
        setError(email, "Not a valid email, @ symbol is missing");
        check_email = false;
        return;
    } else if (dot <= atSymbol + 2) {
        // display an error message if email doesn't include a dot
        setError(email, "Not a valid email");
        return;
    } else if (dot === emailValue.length - 1) {
        setError(email, "Not a valid email");
        return;
    } else {
        // displaying an success message if requirements are met
        setSuccess(email);
        check_email = true;
    }

    //phone number validation
    if (phoneNumberValue === "") {
        // display an error message if phone number is blank
        setError(phoneNumber, "Phone number cannot be blank");
        check_phoneNumber = false;
        return;
    } else if (!(phoneNumberValue.length === 8)) {
        // display an error message if phone number length is less than 8
        setError(phoneNumber, "Not a valid phone number");
        check_phoneNumber = false;
        return;
    } else {
        // displaying an success message if requirements are met
        setSuccess(phoneNumber);
        check_phoneNumber = true;
    }

    //address validation
    if (addressValue === "") {
        // display an error message if address is blank
        setError(address, "Address cannot be blank.");
        check_address = false;
        return;
    } else if (addressValue.length <= 5) {
        // display an error message if address length is less than 5
        setError(address, "Address must have a minimum of 6 characters.");
        check_address = false;
        return;
    } else {
        // displaying an success message if requirements are met

        setSuccess(address);
        check_address = true;
    }

    //user password validation
    if (passwordValue === "") {
        // display an error message if password is blank
        setError(password, "Password cannot be blank");
        check_password = false;
        return;
    } else if (check_special_character.test(passwordValue)) {
        // display an error message if password include special character
        setError(password, "The password should not contain special character");
        check_password = false;
        return;
    } else if ((minRegex.test(passwordValue)) == false) {
        // display an error message if password length is less than 8
        setError(password, "The password must be at least 8 characters");
        check_password = false;
        return;
    } else if (strongRegex.test(passwordValue)) {
        // displaying an success message if requirements are met
        setSuccess(password);
        check_password = true;
    } else {
        setError(password, "Not a valid password");
        check_password = false;
        return;
    }

    //confirm password validation
    if (confirmedPasswordValue === "") {
        // display an error message if password is blank
        setError(confirmedPassword, "Password not matching");
        check_confirmedPassword = false;
        return;
    } else if (password === confirmedPasswordValue) {
        // displaying an success message if requirements are met

        setSuccess(confirmedPassword);
        check_confirmedPassword = true;
    }


    // if all requirements are met, we'll call the register function
    setTimeout(function () {
        if (check_fullName && username_class.className == "input-box success" && check_email && check_phoneNumber && check_address && check_password && check_confirmedPassword) {
            register()
        };;
    }, 700);


}

//validating if username already exists
function usernameCheck(jsonCustomer, userUsername) {
    let customerArray = JSON.parse(jsonCustomer);
    // fetching the username 
    userUsername = document.getElementsByName("username")[0].value;
    // looping through customerArray
    for (let i = 0; i < customerArray.length; ++i) {
        //checking if username exist
        if (userUsername == customerArray[i].username) {
            // displaying error message
            setError(username, "username already exists");
        }
    }
}

// setting error message function
function setError(input, message) {
    const inputBox = input.parentElement;
    const small = inputBox.querySelector("small");
    inputBox.className = "input-box error";
    small.innerText = message;
}

// setting success message function
function setSuccess(input) {
    const inputBox = input.parentElement;
    inputBox.className = "input-box success";
}

// register function
function register() {
    // performing anew request
    let request = new XMLHttpRequest();

    request.onload = () => {
        if (request.status === 200) {
            let responseData = request.responseText;
        } else {
            alert("Error communicating with server: " + request.status);
        }
    };
    // opening the request in post mode
    request.open("POST", "registration.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //storing user information in the database
    let userFullName = document.getElementsByName("fullname")[0].value;
    let userUsername = document.getElementsByName("username")[0].value;
    let userEmail = document.getElementsByName("email")[0].value;
    let userPhoneNumber = document.getElementsByName("phonenumber")[0].value;
    let userAddress = document.getElementsByName("address")[0].value;
    let userPassword = document.getElementsByName("password")[0].value;

    // sending request
    request.send("fullname=" + userFullName +
        "&username=" + userUsername +
        "&email=" + userEmail +
        "&phonenumber=" + userPhoneNumber +
        "&address=" + userAddress +
        "&password=" + userPassword);
    sessionStorage.setItem('logged_in', userUsername);
    // redirecting the user to the home page
    alert('User successfully registered! kindly please login with your credentials entered.');

    setTimeout(function () {
        window.location.href = "login.php";
    }, 700);
    
}