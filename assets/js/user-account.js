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
            let img = document.getElementById("img");
            img.src = user.image_path + user.image_name;
        }
    });
}

