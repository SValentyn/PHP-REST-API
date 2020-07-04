<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP-REST-API</title>
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
        <div style="height: 600px; text-align: center;">
            <h3 class="header">Start Page</h3>
            <div style="text-align: center;">

                <!-- Modal Login Window -->
                <a href="#win1" class="link" style="padding-right: 15px;">Login</a>
                <a href="#x" class="overlay" id="win1"></a>

                <div class="popup" style="width: 360px; top: 180px; padding: 0; margin-right: 0; border-radius: 10px;">
                    <div class="wrap-login100" style="width: 342px; padding-left: 40px;">
                        <div class="login">
                            <div class="input">
                                <form action="" id="ajaxForm1" method="POST">
                                    <h2 class="h2">
                                        Member Login
                                    </h2>

                                    <div class="blockinput" style="margin-bottom: 16px;">
                                        <label>
                                            <input id="email" name="email" type="email"
                                                   data-validate="Valid email is required: user@gmail.com"
                                                   placeholder="Email" autocomplete="off"
                                                   maxlength="255"/>
                                        </label>
                                    </div>

                                    <div class="blockinput">
                                        <label>
                                            <input id="password" name="password" type="password"
                                                   data-validate="Password is required"
                                                   placeholder="Password" autocomplete="off"
                                                   minlength="6" maxlength="255"/>
                                        </label>
                                    </div>

                                    <div class="error-label" id="error-label">&nbsp;</div>

                                    <button id="login" type="button" class="button-signup" style="margin-top: 20px;">
                                        Login
                                    </button>
                                    <p style="padding-top: 10px; font-size: 16px;">
                                        Don't have an account?
                                        <a href="#win2" style="font-size: 16px; font-weight: 700; color: #292929;">
                                            Sign Up
                                        </a>
                                    </p>
                                </form>
                                <a href="#x" class="close" style=" left: 370px;" title="Close"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Registration Window -->
                <a style="padding-left: 15px;" href="#win2" class="link">Sign up</a>
                <a href="#x" class="overlay" id="win2" tabindex="-1"></a>

                <div class="popup" style=" width: 360px; top: 120px; padding: 0; margin-right: 0; border-radius: 10px;"
                     tabindex="-1">
                    <div class="wrap-login100" style="width: 342px; height: 510px; padding-left: 40px;">
                        <div class="login">
                            <div class="input">
                                <form action="" id="ajaxForm2" method="POST">
                                    <h2 class="h2"
                                        style="padding-bottom: 0; padding-top: 0; margin-top: 40px; margin-bottom: 30px; text-align: center; font-size: 28px;">
                                        Registration form
                                    </h2>

                                    <div class="blockinput">
                                        <label>
                                            <input id="firstName" name="firstName" type="text"
                                                   placeholder="First Name*" autocomplete="off"
                                                   minlength="1" maxlength="255">
                                        </label>
                                    </div>

                                    <div class="blockinput">
                                        <label>
                                            <input id="lastName" name="lastName" type="text"
                                                   placeholder="Last Name*" autocomplete="off"
                                                   minlength="1" maxlength="255">
                                        </label>
                                    </div>

                                    <div class="blockinput" style="display: flex;">
                                        <label for="optionList" style="padding-left: 14px; box-shadow: none;">
                                            Select Role
                                        </label>
                                        <select class="select" name="optionList" id="optionList"
                                                autocomplete="off" style="width: 168px;">
                                            <option>admin</option>
                                            <option>user</option>
                                        </select>
                                    </div>

                                    <div class="blockinput">
                                        <label>
                                            <input type="email" name="email_2" id="email_2"
                                                   placeholder="Email*" autocomplete="off"
                                                   maxlength="255">
                                        </label>
                                    </div>

                                    <div class="blockinput">
                                        <label>
                                            <input type="password" name="password_2" id="password_2"
                                                   placeholder="Password*" autocomplete="off"
                                                   minlength="6" maxlength="255">
                                        </label>
                                    </div>

                                    <div id="error-label_2" class="error-label">&nbsp;</div>

                                    <button id="signup" type="button" class="button-signup" style="margin-top: 15px;">
                                        Create Account
                                    </button>
                                    <p style="padding-top: 5px; font-size: 16px;">
                                        Do you have an account?
                                        <a href="#win1" style="font-size: 16px; font-weight: 700; color: #292929;">
                                            Login
                                        </a>
                                    </p>
                                </form>
                                <a href="#x" class="close" style="left: 370px;" title="Close"></a>
                            </div>
                        </div>
                    </div>
                </div>

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
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="assets/js/ajax.js"></script>
<script src="assets/js/index.js"></script>
</html>