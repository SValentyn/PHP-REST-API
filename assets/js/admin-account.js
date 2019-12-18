let id;

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
                        <td><a class="user-id" style="text-decoration: none; font-size: 24px;color: #403d40;" href="#win1" onclick="getDataById(${user.id})">${user.id}</a></td>
                        <td>${user.first_name}</td>
                        <td>${user.last_name}</td>
                        <td>${user.email}</td>
                        <td>${user.role}</td>
                        <td><a style="color: red; text-decoration: none; font-size: 30px" onclick="deleteById(${user.id})">X</a></td>
                    </tr>`;
            })
        }
    })
}

function getDataById(userId) {
    id = userId;
    ajax({
        method: 'GET',
        url: `/api/users/${id}`,
        success: (response) => {
            let user = JSON.parse(response);

            console.log(response);
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
    ajax({
        method: 'DELETE',
        url: `/api/users/${userId}`,
        success: (response) => {
            console.log(response);
        }
    });

    ajax({
        method: 'GET',
        url: `/api/users/${userId}`,
        success: (response) => {
            if (response.status === 404) {
                window.location.href = "index.php";
            } else {
                window.location.href = "admin-account.php";
            }
        }
    });
}

let change_button = document.getElementById("change-btn");
change_button.onclick = function () {
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    document.getElementById("error-label").style.color = "red";

    if (firstName === "") {
        document.getElementById("error-label").innerHTML = "Inaccessible first name";
        return false;
    }

    if (lastName === "") {
        document.getElementById("error-label").innerHTML = "Inaccessible last name";
        return false;
    }

    let atpos = email.indexOf("@");
    let dotpos = email.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
        document.getElementById("error-label").innerHTML = "Invalid email address";
        return false;
    }

    if (password === "" || password.length < 6) {
        document.getElementById("error-label").innerHTML = "Invalid password";
        return false;
    }

    ajax({
        method: 'PUT',
        url: `/api/users/${id}?firstName=${firstName}&lastName=${lastName}&email=${email}&password=${password}`,
        success: (response) => {
            let user = JSON.parse(response);

            console.log(response);
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