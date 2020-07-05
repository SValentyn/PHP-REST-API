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
                    <a href="#win1" class="info-user" title="Get user info" onclick="getUserById(${user.id})">
                        <img src="assets/images/icons/info.png" alt="Info" class="info-img"/>
                    </a>
                </td>   
            </tr>`;
    });
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
            let img = document.getElementById("img");
            img.src = user.image_path + user.image_name;
        }
    });
}

/**
 * Initiates closing the modal window using Escape
 */
$(document).keyup((e) => {
    if (e.key === "Escape") window.location.href = "user-account.php#";
});
