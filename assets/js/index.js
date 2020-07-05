/**
 * Buttons on index.php page
 */
let login_btn = document.getElementById("login");
let signup_btn = document.getElementById("signup");

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
            </tr>`;
    });
}

/**
 * Pressing the login-button initiates validation of the login form data and sends data to the server through AJAX
 */
login_btn.onclick = () => {

    /**
     * Retrieving form data
     */
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

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
     * Prepare data for sending to the server
     */
    let data = new FormData();
    data.append("email", email);
    data.append("password", password);

    /**
     * AJAX processing
     */
    ajax({
        url: `/api/login`,
        data: data,
        method: 'POST',
        success: (response, status) => {
            localStorage.setItem('user', response);

            let user = JSON.parse(response);
            console.log(user);

            if (user.role === "admin") {
                window.location.href = "admin-account.php";
            } else if (user.role === "user") {
                window.location.href = "user-account.php";
            } else {
                document.getElementById("error-label").innerHTML = "Your password or email is incorrect!";
                return false;
            }
        }
    });
};

/**
 * Pressing the signup-button initiates validation of the registration form data and sends data to the server through AJAX
 */
signup_btn.onclick = () => {

    /**
     * Retrieving form data
     */
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    let email = document.getElementById("email_2").value;
    let password = document.getElementById("password_2").value;
    let option = document.getElementById("optionList").value;

    /**
     * Name validation
     */
    if (firstName.trim() === "") {
        document.getElementById("error-label_2").innerHTML = "Inaccessible first name!";
        return false;
    }

    /**
     * Surname validation
     */
    if (lastName.trim() === "") {
        document.getElementById("error-label_2").innerHTML = "Inaccessible last name!";
        return false;
    }

    /**
     * Email validation
     */
    let atpos = email.indexOf("@");
    let dotpos = email.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.trim().length) {
        document.getElementById("error-label_2").innerHTML = "Invalid email address!";
        return false;
    }

    /**
     * Password validation
     */
    if (password.trim() === "" || password.length < 6) {
        document.getElementById("error-label_2").innerHTML = "Password is too short!";
        return false;
    }

    /**
     * Prepare data for sending to the server
     */
    let data = new FormData();
    data.append("firstName", firstName);
    data.append("lastName", lastName);
    data.append("email", email);
    data.append("password", password);
    data.append("role", option);

    /**
     * AJAX processing
     */
    ajax({
        url: `/api/users`,
        data: data,
        method: 'POST',
        success: (response, status) => {
            console.log(JSON.parse(response));

            if (JSON.parse(response) === true) {

                /**
                 * AJAX processing
                 */
                ajax({
                    url: 'send.php',
                    data: null,
                    method: 'POST',
                    contentType: false,
                    processData: false,
                    success: (response, status) => {
                        console.log(response);
                        if (response === 'ok') {
                            console.log('Email has been sent!');
                        } else {
                            console.log('Error sending email..');
                        }
                    }
                });

                alert("Account created. Try logging into your account!");
                window.location.href = "index.php";
            } else {
                document.getElementById("error-label_2").innerHTML = "Email already exists! Need more unique.";
                return false;
            }
        }
    });
};

/**
 * The function allows you to increase the indent between letters when entering characters (now used to enter a password)
 * @param element (tag)
 */
function letter_spacing(element) {
    if (element.value.length > 0) {
        element.style.letterSpacing = "2.5px";
    } else {
        element.style.letterSpacing = "0px";
    }
}

/**
 * Initiate submitting by pressing ENTER for form ajaxForm1
 */
$(document.getElementById("ajaxForm1")).keypress((e) => {
    if (e.keyCode === 13) document.getElementById("login").click();
});

/**
 * Initiate submitting by pressing ENTER for form ajaxForm2
 */
$(document.getElementById("ajaxForm2")).keypress((e) => {
    if (e.keyCode === 13) document.getElementById("signup").click();
});

/**
 * Initiates closing the modal window using Escape
 */
$(document).keyup((e) => {
    if (e.key === "Escape") window.location.href = "index.php#";
});
