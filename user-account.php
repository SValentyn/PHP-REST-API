<?php
session_start();
$_SESSION["role"] = "user";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Account</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="container">
            <?php
            echo "<div class='block-signout'>
                        <span>
                            <a class='link' onclick=\"window.location.replace('index.php'); return false;\">Sign out</a>
                        </span>
                  </div>";
            ?>

            <!-- Calling the user table builder -->
            <table id="table-body">
                <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Info</th>
                </tr>
                </thead>
                <tbody id="table-users" class="table-body">
                </tbody>
            </table>

            <a href="#x" class="overlay" id="win1"></a>
            <div class="popup"
                 style="width: 450px; height: 480px; top: 100px; padding: 0; margin-right: 0; border-radius: 10px;">
                <div class="wrap-account-info" style="width: 450px; height: 480px;">
                    <div class="login" style="width: 450px; height: 480px;">
                        <div class="modal-window" style="width: 450px;">
                            <div style="text-align: center;">
                                <div style="height: 200px; margin-top: 30px;">
                                    <img id="img" src="" alt="User avatar"/>
                                </div>

                                <form action="" method="POST">
                                    <h2 style="padding: 30px 20px 5px 40px; text-align: left; font-size: 32px;">
                                        User data:
                                    </h2>

                                    <div class="blockinput custom-blockinput">
                                        <label for="firstName" class="label-input">First name:</label>
                                        <input id="firstName" name="firstName" class="custom-input" disabled/><br>
                                    </div>

                                    <div class="blockinput custom-blockinput">
                                        <label for="lastName" class="label-input">Last name:</label>
                                        <input id="lastName" name="lastName" class="custom-input" disabled/><br>
                                    </div>

                                    <div class="blockinput custom-blockinput">
                                        <label for="email" class="label-input">Email:</label>
                                        <input id="email" name="email" type="email" class="custom-input" disabled/><br>
                                    </div>
                                    <br>
                                </form>
                                <a href="#x" class="close" id="close" style="left: 435px;" title="Close"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="footer">
                <div>
                    <a href="https://github.com/SValentyn/PHP-REST-API">
                        <img id="github-ico" src="assets/images/icons/GitHub-Mark-32px.ico"
                             title="View project code on GitHub" alt="View code on GitHub"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="assets/js/ajax.js"></script>
<script src="assets/js/user-account.js"></script>
</html>