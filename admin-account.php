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
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/popup.css">
    <link rel="stylesheet" href="assets/css/main-popup.css">
    <link rel="stylesheet" href="assets/css/component-style.css">
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
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody id="table-users" class="table-body">
                </tbody>
            </table>

            <a href="#x" class="overlay" id="win1"></a>
            <div class="popup" style="width: 450px; top: 80px; padding: 0; margin-right: 0; border-radius: 10px;">
                <div class="wrap-account-info">
                    <div class="login" style="width: 450px;">
                        <div class="input" style="width: 450px;">
                            <center>
                                <div style="padding-bottom: 10px;">
                                    <img id="img" src="" alt="User avatar"/>
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
                                <div id="error-message"></div>
                                <script src="assets/js/upload.js"></script>

                                <form action="" method="POST">
                                    <p class="h2"
                                       style="margin-top: 20px; padding-left: 38px; margin-bottom: 10px; text-align: left; font-size: 25px;">
                                        User data:
                                    </p>

                                    <div class="blockinput custom-blockinput">
                                        <label for="firstName" class="label-input">First name:</label>
                                        <input id="firstName" name="firstName" class="custom-input"
                                               autocomplete="off"/><br>
                                    </div>

                                    <div class="blockinput custom-blockinput">
                                        <label for="lastName" class="label-input">Last name:</label>
                                        <input id="lastName" name="lastName" class="custom-input"
                                               autocomplete="off" style="margin-left: 15px;"/><br>
                                    </div>

                                    <div class="blockinput custom-blockinput">
                                        <label for="email" class="label-input">Email:</label>
                                        <input id="email" name="email" type="email" class="custom-input"
                                               autocomplete="off" style="margin-left: 50px;"/><br>
                                    </div>

                                    <div class="blockinput custom-blockinput">
                                        <label for="password" class="label-input">Password:</label>
                                        <input id="password" name="password" class="custom-input"
                                               autocomplete="off" style="margin-left: 20px;"/><br>
                                    </div>

                                    <div id="error-label" class="error-label" style="margin-left: 35px;">&nbsp;</div>

                                    <button id="change-btn" type="submit"
                                            class="button-signup" style="width: 360px; margin-top: 14px;">
                                        Change data
                                    </button>
                                </form>
                                <a href="#x" class="close" id="close" style="left: 435px;" title="Close"></a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>

            <div id="footer">
                <div>
                    <a href="https://github.com/SValentyn/PHP-REST-API">
                        <img id="github-ico" src="assets/images/icons/GitHub-Mark-32px.ico" title="View code on GitHub"
                             alt="View code on GitHub"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="assets/js/ajax.js"></script>
<script src="assets/js/admin-account.js"></script>
<script type="text/javascript">
    $(document).keyup(function (e) {
        if (e.key === "Escape") {
            window.location.href = "admin-account.php#";
        }
    });
</script>
</html>