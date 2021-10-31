<?php
include("setupDB.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dental Reset Password</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/reset_password.css">
    <script src="js/form_validation.js"></script>
</head>

<body>
    <div id="wrapper">
        <header>
            <div id="menubar">
                <img src="assets/dicon1.jpg" class="logo">
                <h1>Forgot Your Password? Don't Worry</h1>
            </div>
        </header>

        <div class="content">
            <div class="form-container">
                <form action="reset_password.php" method="POST">
                    <h2>Reset Password</h2>
                    <label for="email" class="form-label">Email: </label>
                    <input type="text" name="email" id="Email" class="form-input">
                    <input type="submit" class="form-btn" value="Reset Password" id="ResetPwdBtn"></input>
                    <br />
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