<?php
session_start();

$_SESSION["role"] = "user";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Project</title>
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/popup.css">
    <link rel="stylesheet" href="assets/css/main-popup.css">
    <link rel="stylesheet" href="assets/css/component-style.css">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script type="text/javascript">
        $(document).keyup(function (e) {
            if (e.key === "Escape") {
                window.location.href = "user-account.php#";
            }
        });
    </script>
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div style=" height: 800px;  text-align: center;">
            <?php
            echo "<div style=\"text-align: right; height: 60px; margin-top: 30px;\">
                    <span>
                        <a style=\"padding-left: 15px\" onclick=\"window.location.replace('index.php'); return false;\">Sign out</a>
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
                                <div style="margin-top: 60px; padding-bottom: 20px;">
                                    <img id="img" src=""/>
                                </div>
                                <form action="" method="POST">
                                    <p class="h2" style="margin-top: 70px;padding-left: 38px;margin-bottom: 10px">
                                        User data:</p>

                                    <div class="blockinput custom-blockinput">
                                        <label for="firstName" class="label-input">First name:</label>
                                        <input name="firstName" class="custom-input" id="firstName"
                                               disabled><br>
                                    </div>

                                    <div class="blockinput custom-blockinput">
                                        <label for="lastName" class="label-input">Last name:</label>
                                        <input name="lastName" class="custom-input" id="lastName" disabled
                                               style="margin-left: 15px;"><br>
                                    </div>

                                    <div class="blockinput custom-blockinput">
                                        <label for="email" class="label-input">Email:</label>
                                        <input type="email" class="custom-input" name="email" id="email"
                                               disabled style="margin-left: 50px;"><br>
                                    </div>
                                    <br>
                                </form>
                                <a href="#x" class="close" id="close" style="left: 435px;" title="Close"></a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/ajax.js"></script>
<script src="assets/js/user-account.js"></script>
</body>
</html>