<?php
include("conn.php");

if (isset($_POST["email"])) {
    // get the email to reset password
    $email = $_POST["email"];

    // check if email is registered
    $query = "SELECT * FROM users WHERE email = '" . $email . "'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Query Failed. Check DB connection.";
        mysqli_close($conn);
        exit;
    }

    $row = $result->fetch_assoc();
    if (empty($row)) { // if email not registered, ask to reenter
        $result_message = "Email is not registerd. Please check your entered email.";
    } else {
        // generate a random password
        $new_password = substr(str_shuffle(MD5(microtime())), 0, 10);
        $hashed_new_password = md5($new_password);
        // update the newly generated password to db
        $reset_query = "UPDATE users SET password = '" . $hashed_new_password . "' WHERE email = '" . $email . "';";
        if (!mysqli_query($conn, $reset_query)) {
            echo "Reset query Failed. Check DB connection.";
            mysqli_close($conn);
            exit;
        }

        // send email to inform user of the new password
        $to = "f32ee@localhost";
        $subject = "Password has been reset";
        $message = "Please find your new password: " . $new_password;
        $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To:f32ee@localhost' . '\r\n' . 'X-Mailer:PHP/' . phpversion();

        mail($to, $subject, $message, $headers, '-ff32ee@localhost');

        $result_message = "An email has been sent to your email.";
    }
    mysqli_close($conn);
}
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
                <form name="resetPwdForm" action="reset_password.php" method="POST" onsubmit="return validateResetPwdForm()">
                    <h2>Reset Password</h2>
                    <label for="email" class="form-label">Email: </label>
                    <input type="text" name="email" id="Email" class="form-input">
                    <input type="submit" class="form-btn" value="Reset Password" id="ResetPwdBtn"></input>
                    <p id="ResetPwdMessage"><?php echo $result_message; ?></p>
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