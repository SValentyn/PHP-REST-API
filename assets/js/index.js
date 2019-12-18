loadUsers();

function loadUsers() {
    ajax({
        url: "/api/users",
        method: "GET",
        success: response => {
            document.querySelector('.table-body').innerHTML = '';
            let users = JSON.parse(response);
            users.forEach(user => {
                document.querySelector('.table-body').innerHTML +=
                    `<tr>
                        <td class="user-id">${user.id}</td>
                        <td>${user.first_name}</td>
                        <td>${user.last_name}</td>
                        <td>${user.email}</td>
                        <td>${user.role}</td>
                    </tr>`;
            })
        }
    })
}

let login_btn = document.getElementById("login");
login_btn.onclick = function () {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    let atpos = email.indexOf("@");
    let dotpos = email.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
        document.getElementById("error-label").innerHTML = "Invalid email address";
        return false;
    }

    if (password === "" || password.length < 4) {
        document.getElementById("error-label").innerHTML = "Invalid password";
        return false;
    }

    ajax({
        url: `/api/login?email=${email}&password=${password}`,
        method: 'GET',
        success: (response) => {
            let user = JSON.parse(response);
            localStorage.setItem('user', response);
            if (user.role === "admin") {
                window.location.href = "admin-account.php";
            } else if (user.role === "user") {
                window.location.href = "user-account.php";
            } else {
                document.getElementById("error-label").innerHTML = "Your password or email is incorrect!";
                return false;
            }

            console.log(user);
        }
    });

};

let signup_btn = document.getElementById("signup");
signup_btn.onclick = function () {
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    let email = document.getElementById("email_2").value;
    let password = document.getElementById("password_2").value;
    let option = document.getElementById("optionList").value;

    if (firstName === "") {
        document.getElementById("error-label_2").innerHTML = "Inaccessible first name";
        return false;
    }

    if (lastName === "") {
        document.getElementById("error-label_2").innerHTML = "Inaccessible last name";
        return false;
    }

    let atpos = email.indexOf("@");
    let dotpos = email.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
        document.getElementById("error-label_2").innerHTML = "Invalid email address";
        return false;
    }

    if (password === "" || password.length < 6) {
        document.getElementById("error-label_2").innerHTML = "Invalid password";
        return false;
    }

    ajax({
        url: `/api/users?firstName=${firstName}&lastName=${lastName}&email=${email}&password=${password}&role=${option}`,
        method: 'POST',
        success: (response) => {
            console.log(JSON.parse(response));

            if (JSON.parse(response) === true) {
                ajax({
                    url: 'send.php',
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function (msg) {
                        console.log(msg);
                        if (msg === 'ok') {
                            console.log('Email has been sent!');
                        } else {
                            console.log('Error sending email..');
                        }
                    }
                });
                alert("Account created!");
                window.location.href = "index.php";
            } else {
                document.getElementById("error-label_2").innerHTML = "Email already exists! Need more unique.";
                return false;
            }
        }
    });
};

$(document.getElementById("ajaxForm1")).keypress(function (e) {
    if (e.which === 13) {
        document.getElementById("login").click();
    }
});

$(document.getElementById("ajaxForm2")).keypress(function (e) {
    if (e.which === 13) {
        document.getElementById("signup").click();
    }
});