//calling the function loadStaffs immediately the page is loaded
window.onload = loadStaffs;
let StaffArray;

//getting staffs stored from the database
function loadStaffs() {
    let request = new XMLHttpRequest();

    request.onload = () => {
        if (request.status === 200) {
            DisplayStaffs(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };

    request.open("GET", "listStaff.php");
    request.send();
}

//displaying the staffs stored in the database on the view order page
function DisplayStaffs(jsonStaffs) {
    //Convert JSON to array of order objects
    let staffArray = JSON.parse(jsonStaffs);
    StaffArray = staffArray;

    //Create HTML table containing staffs data
    let htmlStr = '';
    for (let i = 0; i < staffArray.length; ++i) {
        htmlStr += '<tr><td><h5>' + staffArray[i].FirstName + '</h5></td>' +
            '<td><h5>' + staffArray[i].LastName + '</h5></td>' +
            '<td><h5>' + staffArray[i].username + '</h5></td>' +
            '<td><h6>' + staffArray[i].email + '</h6></td>' +
            '<td><h5>' + staffArray[i].PhoneNumber + '</h5></td>' +
            '<td><button class="Edbutton" onclick="getStaff(\'' + staffArray[i]._id.$oid + '\')">Edit</button></td>' +
            '<td><button class="Delbutton" onclick="delStaff(\'' + staffArray[i]._id.$oid + '\')">Delete</button></td>' +
            '</tr>';
    }

    document.getElementById("staff_table").innerHTML = htmlStr;
}

function getStaff(StaffId) {
    window.location.href = "editStaff.php?id=" + StaffId;
}

function delStaff(StaffId) {
    window.location.href = "deleteStaffs.php?id=" + StaffId;
}