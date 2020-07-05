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

/**
 * This starts every 10 seconds to display the latest data
 */
setInterval(loadUsers, 10000);

function loadUsers() {
    let tmpUsers;

    /**
     * AJAX processing
     */
    ajax({
        url: "/api/users",
        data: null,
        method: "GET",
        success: (response, status) => {
            if (status === 404) {
                window.location.href = "index.php#";
            }

            let users = JSON.parse(response);

            if (tmpUsers == null || tmpUsers !== users) {
                tmpUsers = users;
                fillTable(users);
            }
        }
    })
}

function fillTable(users) {

    // Clear user table
    document.querySelector('.table-body').innerHTML = '';

    users.forEach((user) => {
        document.querySelector('.table-body').innerHTML +=
            `<tr>
                <td>${user.first_name}</td>
                <td>${user.last_name}</td>
                <td>${user.email}</td>
                <td>${user.role}</td>
                <td>
                    <a href="#win1" class="info-user" onclick="getUserById(${user.id})" title="Get user info">
                        <img src="assets/images/icons/info.png" alt="Info" class="info-img"/>
                    </a>
                </td>
                <td>
                    <a class="delete-button" title="Delete user" onclick="deleteUserById(${user.id})">
                       &#10060;
                    </a>
                </td>
            </tr>`;
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
        success: (response, status) => {
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

function deleteUserById(userId) {

    /**
     * AJAX processing
     */
    ajax({
        url: `/api/users/${userId}`,
        data: null,
        method: 'DELETE',
        success: (response, status) => {
            console.log(response);

            /**
             * Handling the case of deleting own account from the system
             */
            let user = JSON.parse(localStorage.getItem('user'));
            if (user.id == userId) {
                window.location.href = "index.php#";
            } else {
                loadUsers();
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
        document.getElementById("error-label").innerHTML = "Inaccessible first name!";
        return false;
    }

    /**
     * Surname validation
     */
    if (lastName.trim() === "") {
        document.getElementById("error-label").innerHTML = "Inaccessible last name!";
        return false;
    }

    /**
     * Email validation
     */
    let atpos = email.indexOf("@");
    let dotpos = email.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.trim().length) {
        document.getElementById("error-label").innerHTML = "Invalid email address!";
        return false;
    }

    /**
     * Password validation
     */
    if (password.trim() === "" || password.length < 6) {
        document.getElementById("error-label").innerHTML = "Password is too short!";
        return false;
    }

    /**
     * AJAX processing
     */
    ajax({
        method: 'PUT',
        data: null,
        url: `/api/users/${id}?firstName=${firstName}&lastName=${lastName}&email=${email}&password=${password}`,
        success: (response, status) => {
            console.log(response);

            let user = JSON.parse(response);
            document.getElementById("firstName").value = user.firstName;
            document.getElementById("lastName").value = user.lastName;
            document.getElementById("email").value = user.email;
            document.getElementById("password").value = user.password;
            let img = document.getElementById("img");
            img.src = user.image_path + user.image_name;

            loadUsers();
        }
    });

    document.getElementById("error-label").style.color = "green";
    document.getElementById("error-label").innerHTML = "Data saved!";

    /**
     * Hide action notification
     */
    setTimeout(() => {
        document.getElementById("error-label").innerHTML = '&nbsp;';
    }, 3200);

    return false;
};

/**
 * Initiates closing the modal window using Escape
 */
$(document).keyup((e) => {
    if (e.key === "Escape") window.location.href = "admin-account.php#";
});
