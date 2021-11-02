<?php
include("conn.php");
include("generate_timeslots.php");

session_start();

// redirect if user is not supposed to be in this page
if (!isset($_SESSION["user_role"])) {
    header("location: login.php");
} elseif ($_SESSION["user_role"] == "patient") {
    header("location: booking.php");
}

// get current doctor info
$doctor_info = [
    "id" => $_SESSION["user_id"],
    "name" => $_SESSION["user_name"]
];
?>

<html lang="en">

<head>
    <title>Block a Timeslot</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/booking.css">
    <script src="js/form_validation.js"></script>
</head>

<body>
    <div id="wrapper">
        <?php include("header.php"); ?>
        <div class="booking">
            <!-- booking_action.php is handling blocking of timeslots -->
            <form method="post" action="booking_action.php">
                <h4><strong>Welcome, Dr <?php echo $doctor_info["name"] ?> </strong></h4>

                <br />

                <div class="select">
                    <label for="timeslot">Block this Timeslot:</label>
                    <select name="timeslot" id="TimeslotSelect">
                        <?php 
                        // this function is from generate_timeslots.php
                        // it generates the doctor's available timeslots for him to block
                        GenerateTimeslotsForDoctor($conn, $doctor_info); 
                        ?>
                    </select>
                    <input id="bookings" type="submit" value="Block!">
                </div>
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