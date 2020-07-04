/**
 * Buttons and variables on admin-account.php page
 */
let change_button = document.getElementById("change-btn");
let id;

/**
 * It starts immediately after the page loads
 */
window.addEventListener("load", () => {
    loadUsers();
});

function loadUsers() {

    // Clear user table
    document.querySelector('.table-body').innerHTML = '';

    /**
     * AJAX processing
     */
    ajax({
        url: "/api/users",
        data: null,
        method: "GET",
        success: response => {
            let users = JSON.parse(response);
            users.forEach(user => {
                document.querySelector('.table-body').innerHTML +=
                    `<tr>
                        <td><a class="user-id" title="Get user info" href="#win1" onclick="getUserById(${user.id})">${user.id}</a></td>
                        <td>${user.first_name}</td>
                        <td>${user.last_name}</td>
                        <td>${user.email}</td>
                        <td>${user.role}</td>
                        <td><a class="delete-button" title="Delete user" onclick="deleteById(${user.id})">X</a></td>
                    </tr>`;
            })
        }
    })
}

function getUserById(userId) {
    id = userId;

    /**
     * AJAX processing
     */
    ajax({
        url: `/api/users/${id}`,
        data: null,
        method: 'GET',
        success: (response) => {
            console.log(response);

            let user = JSON.parse(response);
            document.getElementById("firstName").value = user.firstName;
            document.getElementById("lastName").value = user.lastName;
            document.getElementById("email").value = user.email;
            document.getElementById("password").value = user.password;
            let img = document.getElementById("img");
            img.src = user.image_path + user.image_name;
        }
    });
}

function deleteById(userId) {

    /**
     * AJAX processing
     */
    ajax({
        url: `/api/users/${userId}`,
        data: null,
        method: 'DELETE',
        success: (response) => {
            console.log(response);
        }
    });

    /**
     * AJAX processing
     * Handling the case of deleting own account from the system
     */
    ajax({
        url: `/api/users/${userId}`,
        data: null,
        method: 'GET',
        success: (response) => {
            console.log(response);
            if (response.status === 404) {
                window.location.href = "index.php";
            } else {
                window.location.href = "admin-account.php";
            }
        }
    });
}

/**
 * Pressing the change-button initiates validation of the form data and sends data to the server through AJAX
 */
change_button.onclick = () => {

    // Setting the initial label style
    document.getElementById("error-label").style.color = "red";

    /**
     * Retrieving form data
     */
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    /**
     * Name validation
     */
    if (firstName.trim() === "") {
        document.getElementById("error-label").innerHTML = "Inaccessible first name";
        return false;
    }

    /**
     * Surname validation
     */
    if (lastName.trim() === "") {
        document.getElementById("error-label").innerHTML = "Inaccessible last name";
        return false;
    }

    /**
     * Email validation
     */
    let atpos = email.indexOf("@");
    let dotpos = email.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.trim().length) {
        document.getElementById("error-label").innerHTML = "Invalid email address";
        return false;
    }

    /**
     * Password validation
     */
    if (password.trim() === "" || password.length < 6) {
        document.getElementById("error-label").innerHTML = "Password is too short";
        return false;
    }

    /**
     * AJAX processing
     */
    ajax({
        method: 'PUT',
        data: null,
        url: `/api/users/${id}?firstName=${firstName}&lastName=${lastName}&email=${email}&password=${password}`,
        success: (response) => {
            console.log(response);

            let user = JSON.parse(response);
            document.getElementById("firstName").value = user.firstName;
            document.getElementById("lastName").value = user.lastName;
            document.getElementById("email").value = user.email;
            document.getElementById("password").value = user.password;
            let img = document.getElementById("img");
            img.src = user.image_path + user.image_name;
        }
    });

    document.getElementById("error-label").style.color = "green";
    document.getElementById("error-label").innerHTML = "Data saved!";
    return false;
};

$(document).keyup((e) => {
    if (e.key === 27) window.location.href = "admin-account.php#";
});
