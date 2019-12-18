<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/popup.css">
    <link rel="stylesheet" href="assets/css/main-popup.css">
    <link rel="stylesheet" href="assets/css/component-style.css">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script type="text/javascript">
        $(document).keyup(function (e) {
            if (e.key === "Escape") {
                window.location.href = "index.php#";
            }
        });
    </script>
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div style=" height: 600px;  text-align: center;">
            <h3 class="header">Start Page</h3>
            <div style="text-align: center;">

                <!-- Вызов модального окна входа -->
                <a href="#win1" class="button" style="padding-right: 15px; ">Login</a>
                <a href="#x" class="overlay" id="win1"></a>

                <div class="popup"
                     style=" width: 360px; padding-left: 0px; padding-bottom: 0px; padding-right: 0px; padding-top: 0px;
                     margin-right: 0px; border-radius: 10px;">
                    <div class="wrap-login100" style=" padding-left: 40px; width: 342px;">
                        <div class="login">
                            <div class="input">
                                <form action="" id="ajaxForm1" method="POST">
                                    <h2 class="h2"
                                        style=" text-align:center; padding-top: 45px; padding-bottom: 70px; color: #232323; text-shadow: 0px 1px 1px #000000; font-family: Poppins-Regular, sans-serif; font-size: 40px; ">
                                        Member Login</h2>

                                    <div class="blockinput" style=" margin-bottom: 25px; ">
                                        <label>
                                            <input type="email" name="email" id="email" placeholder="Email"
                                                   autocomplete="off"
                                                   data-validate="Valid email is required: user@gmail.com">
                                        </label>
                                    </div>

                                    <div class="blockinput">
                                        <label>
                                            <input type="password" name="password" id="password"
                                                   placeholder="Password"
                                                   autocomplete="off" data-validate="Password is required">
                                        </label>
                                    </div>
                                    <div class="error-label" id="error-label">&nbsp;</div>
                                    <button type="button" class="button-signup" style="margin-top: 30px;"
                                            id="login">
                                        Login
                                    </button>
                                    <p style="font-size: 16px; padding-top: 10px;">Don't have an account?
                                        <a href="#win2" style="font-size: 16px; font-weight: 700; color: #292929">
                                            Sign Up</a>
                                    </p>
                                </form>
                                <a href="#x" class="close" style=" left: 370px;" title="Close"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Вызов модального окна регистрации -->
                <a style="margin-right: 15px; padding-left: 15px;" href="#win2" class="button">Sign up</a>
                <a href="#x" class="overlay" id="win2"></a>

                <div class="popup"
                     style=" width: 360px; padding: 0px;
                     margin-right: 0px; border-radius: 10px;">
                    <div class="wrap-login100" style="width: 342px; height: 480px; padding-left: 40px;">
                        <div class="login">
                            <div class="input">
                                <form id="ajaxForm2" action="" method="POST">
                                    <h2 class="h2" style=" text-align:center; padding-bottom: 10px; padding-top: 20px;
                                        color: #232323; text-shadow: 0px 1px 1px #000000; font-family: Poppins-Regular,
                                        sans-serif; font-size: 28px; ">Registration form</h2>
                                    <div class="blockinput">
                                        <label>
                                            <input type="text" name="firstName" id="firstName"
                                                   placeholder="First Name"
                                                   autocomplete="off">
                                        </label>
                                    </div>

                                    <div class="blockinput">
                                        <label>
                                            <input type="text" name="lastName" id="lastName" placeholder="Last Name"
                                                   autocomplete="off">
                                        </label>
                                    </div>

                                    <div class="blockinput" style="display:flex;">
                                        <label for="optionList" style="padding-left: 14px; box-shadow: none;">
                                            Select
                                            Role</label>
                                        <select class="select" name="optionList" id="optionList" autocomplete="off"
                                                style="width: 168px;">
                                            <option>admin</option>
                                            <option>user</option>
                                        </select>
                                    </div>

                                    <div class="blockinput">
                                        <label>
                                            <input type="email" name="email_2" id="email_2" placeholder="Email"
                                                   autocomplete="off">
                                        </label>
                                    </div>

                                    <div class="blockinput">
                                        <label>
                                            <input type="password" name="password_2" id="password_2"
                                                   placeholder="Password" autocomplete="off">
                                        </label>
                                    </div>
                                    <div class="error-label" id="error-label_2"></div>
                                    <button type="button" class="button-signup" id="signup"
                                            style="margin-top: 20px;">
                                        Create Account
                                    </button>
                                    <p style="font-size: 16px; padding-top: 5px;">Do you have an account?
                                        <a href="#win1"
                                           style="font-size: 16px; font-weight: 700; color: #292929">Login</a>
                                    </p>
                                </form>
                                <a href="#x" class="close" style=" left: 370px;" title="Close"></a>
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
        </div>
    </div>
</div>
<script src="assets/js/ajax.js"></script>
<script src="assets/js/index.js"></script>
</body>
</html>