//Updating the staff page
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
    request.open("POST", "performUpdateStaff.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Extract staff data
    let fname = document.getElementById("firstName").value;
    let lname = document.getElementById("lastName").value;
    let uname = document.getElementById("username").value;
    let email = document.getElementById("email").value;
    let pnumber = document.getElementById("phoneNumber").value;
    let pass = document.getElementById("password").value;

    //Send request
    request.send("firstName=" + fname +
        "&lastName=" + lname +
        "&username=" + uname +
        "&email=" + email +
        "&phoneNumber=" + pnumber +
        "&password=" + pass);

        //display new staff in the view staff page
    window.location.href = 'viewStaff.php';
}