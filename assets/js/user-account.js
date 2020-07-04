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
            let img = document.getElementById("img");
            img.src = user.image_path + user.image_name;
        }
    });
}

/**
 * Initiates closing the modal window using Escape
 */
$(document).keyup((e) => {
    if (e.key === "Escape") window.location.href = "index.php#";
});
