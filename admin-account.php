<?php
session_start();

$_SESSION["role"] = "admin";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Project</title>
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
    <link rel="stylesheet" href="assets/css/popup.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/main-popup.css">
    <link rel="stylesheet" href="assets/css/component-style.css">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script type="text/javascript">
        $(document).keyup(function (e) {
            if (e.key === "Escape") {
                window.location.href = "admin-account.php#";
            }
        });
    </script>
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div style="height: 800px; width: 940px; text-align: center;">
            <?php
            echo "<div style=\"text-align: right; height: 60px; margin-top: 30px;\">
                        <span>
                            <a class='link' style=\"padding-left: 15px\" onclick=\"window.location.replace('index.php'); return false;\">Sign out</a>
                        </span>
                  </div>";
            ?>

            <!-- Calling the user table builder -->
            <table style="width: 950px; margin-top: 60px; margin-bottom: 15px;">
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
            <div class="popup"
                 style=" width: 450px; height: 660px; top: 100px; padding: 0px; margin-right: 0px; border-radius: 10px;">
                <div class="wrap-login100" style="width: 450px; height: 660px; padding-left: 0px;">
                    <div class="login" style="width: 450px;height: 660px; ">
                        <div class="input" style="width: 450px;height: 660px;">
                            <center>
                                <div style=" padding-bottom: 20px; ">
                                    <img id="img" src=""/>
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
                                    <p class="h2" style="margin-top: 24px;padding-left: 38px;margin-bottom: 10px">
                                        User data:</p>

                                    <div class="blockinput custom-blockinput">
                                        <label for="firstName" class="label-input">First name:</label>
                                        <input name="firstName" class="custom-input" id="firstName"
                                               autocomplete="off"><br>
                                    </div>

                                    <div class="blockinput custom-blockinput">
                                        <label for="lastName" class="label-input">Last name:</label>
                                        <input name="lastName" class="custom-input" id="lastName" autocomplete="off"
                                               style="margin-left: 15px;"><br>
                                    </div>

                                    <div class="blockinput custom-blockinput">
                                        <label for="email" class="label-input">Email:</label>
                                        <input type="email" class="custom-input" name="email" id="email"
                                               autocomplete="off"
                                               style="margin-left: 50px;"
                                        ><br>
                                    </div>

                                    <div class="blockinput custom-blockinput">
                                        <label for="password" class="label-input">Password:</label>
                                        <input name="password" class="custom-input" id="password" autocomplete="off"
                                               style=" margin-left: 20px; "

                                        ><br>
                                    </div>

                                    <div class="error-label" id="error-label" style="margin-left: 35px;"></div>
                                    <button type="submit" class="button-signup" id="change-btn"
                                            style="width: 360px; margin-top: 18px;">
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
                        <img id="github-ico" src="assets/images/icons/GitHub-Mark-32px.ico" title="View code on GitHub" alt="View code on GitHub"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/ajax.js"></script>
    <script src="assets/js/admin-account.js"></script>
</body>
</html>