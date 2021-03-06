<?php
include("conn.php");

if (isset($_POST["submit"])) {
    if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirmPassword"])) {
        echo "All fields need to be filled in";
        exit;
    }

    // prepare data for new user
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // hash the password and store the hash in our db
    $password = md5($password);

    // insert data for new user
    $sql = "INSERT INTO users (`name`, `email`, `password`, `role`) VALUES ('$name', '$email', '$password', 'patient')";
    $result = mysqli_query($conn, $sql);

    // send the email and redirect to login page if registration is successful
    if (!$result) {
        echo "Registration Query Failed";
    } else {
        $to = "f32ee@localhost";
        $subject = "Registration Successful";
        $message = "You have successfully registered";
        $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To:f32ee@localhost' . '\r\n' . 'X-Mailer:PHP/' . phpversion();

        mail($to, $subject, $message, $headers, '-ff32ee@localhost');

        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dental Register</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/register.css">
    <script src="js/form_validation.js"></script>
</head>

<body>
    <div id="wrapper">
        <header>
            <div id="menubar">
                <a href="index.php">
                    <img src="assets/dicon1.jpg" class="logo">
                </a>
                <h1>Welcome to M&Y Dental Clinic</h1>
            </div>
        </header>

        <div class="content">
            <div class="form-container">
                <form name="registrationForm" action="register.php" method="POST" onsubmit="return validateRegistrationForm()">
                    <h2>Register</h2>
                    <label for="name" class="form-label">Name: </label>
                    <input type="text" name="name" id="Name" class="form-input">
                    <br />
                    <label for="email" class="form-label">Email: </label>
                    <input type="text" name="email" id="Email" class="form-input">
                    <br />
                    <label for="password" class="form-label">Password: </label>
                    <input type="text" name="password" id="Password" class="form-input">
                    <br />
                    <label for="password" class="form-label">Confirm Password: </label>
                    <input type="text" name="confirmPassword" id="ConfirmPassword" class="form-input">
                    <br />
                    <input type="submit" class="form-btn" name="submit" value="Register" id="RegisterBtn"></input>
                    <br />
                    <p id="RegisterErrorMessage">
                    </p>
                    <hr />
                    <input type="button" class="form-btn" value="Already User? Login Here" id="LoginBtn" onclick="window.location='login.php'"></input>
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