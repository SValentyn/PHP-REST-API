<?php
session_start();
$_SESSION["role"] = "admin";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Account</title>
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
                    <th scope="col" class="th-functional">Info</th>
                    <th scope="col" class="th-functional">Delete</th>
                </tr>
                </thead>
                <tbody id="table-users" class="table-body">
                </tbody>
            </table>

            <a href="#x" class="overlay" id="win1"></a>
            <div class="popup"
                 style="width: 450px; height: 630px; top: 50px; padding: 0; margin-right: 0; border-radius: 10px;">
                <div class="wrap-account-info">
                    <div class="login" style="width: 450px; height: 630px;">
                        <div class="modal-window" style="width: 450px; height: 630px;">
                            <div style="text-align: center;">
                                <div style="height: 150px; margin: 20px 0 22px 0;">
                                    <img id="img" src="" alt="User avatar"
                                         style="width: 165px; height: 150px;"/>
                                </div>
                                <div id="upload-choose-container">
                                    <input type="file" id="upload-file" accept="image/jpeg, image/png"/>
                                    <button id="choose-upload-button">Choose JPEG/PNG file</button>
                                </div>
                                <div id="upload-file-final-container">
                                    <span id="file-name"></span>
                                    <button id="upload-button">Upload</button>
                                    <button id="cancel-button">Cancel</button>
                                </div>

                                <div class="error-label" id="error-message">&nbsp;</div>

                                <script src="assets/js/upload.js"></script>

                                <form action="" method="POST">
                                    <h2 style="padding: 15px 20px 5px 40px; text-align: left; font-size: 25px;">
                                        User data:
                                    </h2>

                                    <div class="blockinput custom-blockinput">
                                        <label for="firstName" class="label-input">First name:</label>
                                        <input id="firstName" name="firstName" class="custom-input"
                                               autocomplete="off" minlength="1" maxlength="255"/><br>
                                    </div>

                                    <div class="blockinput custom-blockinput">
                                        <label for="lastName" class="label-input">Last name:</label>
                                        <input id="lastName" name="lastName" class="custom-input"
                                               autocomplete="off" minlength="1" maxlength="255"/><br>
                                    </div>

                                    <div class="blockinput custom-blockinput">
                                        <label for="email" class="label-input">Email:</label>
                                        <input id="email" name="email" type="email" class="custom-input"
                                               autocomplete="off" minlength="1" maxlength="255"/><br>
                                    </div>

                                    <div class="blockinput custom-blockinput">
                                        <label for="password" class="label-input">Password:</label>
                                        <input id="password" name="password" class="custom-input"
                                               autocomplete="off" minlength="6" maxlength="255"/><br>
                                    </div>

                                    <div id="error-label" class="error-label" style="margin-left: 35px;">&nbsp;</div>

                                    <button id="change-btn" type="submit" class="button-signup"
                                            style="width: 70%; margin-top: 18px;">
                                        Change data
                                    </button>
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
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="assets/js/ajax.js"></script>
<script src="assets/js/admin-account.js"></script>
</html>