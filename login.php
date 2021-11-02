<?php
include("conn.php");

session_start();

if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
    $email = $_POST["email"];
    $entered_password = $_POST["password"];
    $hashed_entered_password = md5($entered_password);

    $query = "SELECT * FROM users WHERE email = '" . $email . "'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        $error_message = "Query failed. Check DB connection.";
        mysqli_close($conn);
    }

    $row = $result->fetch_assoc();
    if (empty($row)) {
        $error_message = "This email is not registered. Check your email or register.";
        mysqli_close($conn);
    } elseif ($row["password"] == $hashed_entered_password) {
        $_SESSION["user_id"]    = $row["id"];
        $_SESSION["user_name"]  = $row["name"];
        $_SESSION["user_email"] = $row["email"];
        $_SESSION["user_role"]  = $row["role"];
        
        header("Location: profile.php");
    } else {
        $error_message = "The password you entered is invalid. Please try again.";
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dental Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/form_validation.js"></script>
</head>

<body>
    <div id="wrapper">
        <header>
            <div id="menubar">
                <a href="index.php">
                    <img src="assets/dicon1.jpg" class="logo">
                </a>
                <h1>Welcome Back to M&Y Dental Clinic</h1>
            </div>
        </header>

        <div class="content">
            <div class="form-container">
                <form name="loginForm" action="login.php" method="POST" onsubmit="return validateLoginForm()">
                    <h2>Login</h2>
                    <label for="email" class="form-label">Email: </label>
                    <input type="text" name="email" id="Email" class="form-input">
                    <br />
                    <label for="password" class="form-label">Password: </label>
                    <input type="text" name="password" id="Password" class="form-input">
                    <br />
                    <input type="submit" class="form-btn" value="Login" id="LoginBtn"></input>
                    <p id="LoginErrorMessage">
                        <?php echo $error_message; ?>
                    </p>
                    <br />
                    <hr />
                    <input type="button" class="form-btn" value="Register" id="RegisterBtn" onclick="window.location='register.php'"></input>
                    <input type="button" class="form-btn" value="Forgot Password" id="ResetPwdBtn"  onclick="window.open('reset_password.php')"></input>
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