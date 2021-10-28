<?php
include("setupDB.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dental Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div id="wrapper">
        <header>
            <div id="menubar">
                <img src="assets/dicon1.jpg" class="logo">
                <h1>Welcome Back to M&Y Dental Clinic</h1>
            </div>
        </header>

        <div class="content">
            <div class="form-container">
                <form action="login.php" method="POST">
                    <h2>Login</h2>
                    <label for="email" class="form-label">Email: </label>
                    <input type="text" name="email" id="Email" class="form-input">
                    <br />
                    <label for="password" class="form-label">Password: </label>
                    <input type="text" name="password" id="Password" class="form-input">
                    <br />
                    <input type="submit" class="form-btn" value="Login" id="LoginBtn"></input>
                    <br />
                    <hr />
                    <input type="button" class="form-btn" value="Register" id="RegisterBtn"></input>
                    <input type="button" class="form-btn" value="Forgot Password" id="ResetPwdBtn"></input>
                </form>
            </div>
        </div>

        <footer>
            Copyright &copy; 2021 M&Y Dental
            <br>
            <a href="mailto:MYDental@dental.com">MYDental@dental.com</a>
        </footer>
    </div>
</body>

</html>