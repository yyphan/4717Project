<?php
include("conn.php");
include("generate_timeslots.php");

session_start();

// if this is a rescheduling operation
// create a session variable to track the id of the appointment
if (isset($_POST["appt_id"])) {
    $_SESSION["appt_id"] = $_POST["appt_id"];
} else {
    unset($_SESSION["appt_id"]);
}

// redirect if user is not supposed to be in this page
if (!isset($_SESSION["user_role"])) {
    header("location: login.php");
} elseif ($_SESSION["user_role"] == "doctor" && !isset($_SESSION["appt_id"])) {
    header("location: block_time.php");
} elseif ($_SESSION["user_role"] == "doctor" && isset($_SESSION["appt_id"])) {
    header("location: doctor_reschedule.php");
}

// fetch all doctors
$doctor_list;
$doctor_query = "SELECT * FROM users WHERE role = 'doctor'";
$doctor_result = mysqli_query($conn, $doctor_query);
while ($row = mysqli_fetch_assoc($doctor_result)) {
    $doctor_list[] = [
        "id" => $row["id"],
        "name" => $row["name"]
    ];
}
?>

<html lang="en">

<head>
    <title>Book an Appointment</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/booking.css">
    <script src="js/booking.js"></script>
    <script src="js/form_validation.js"></script>
</head>

<body>
    <div id="wrapper">
        <?php include("header.php"); ?>
        <div class="booking">
            <!-- booking_action.php is handling blocking of timeslots -->
            <form method="post" action="booking_action.php" onsubmit="return validateBookingForm()" name="bookingForm">
                <h4><strong>Welcome, </strong></h4>
                <h4>
                    <strong>I would like to book an appointment with Dr
                        <select name="doctorId" onchange="handleSelectDoctor(this)">
                            <option disabled selected>Select Your Doctor</option>
                            <?php
                            foreach ($doctor_list as $doctor) {
                                echo "<option value=" . $doctor["id"] . ">" . $doctor["name"] . "</option>";
                            }
                            ?>
                        </select>
                    </strong>
                </h4>

                <br />

                <div class="select">
                    <label for="timeslot">Available Timeslots:</label>
                    <select name="timeslot" id="TimeslotSelect">
                        <?php
                        // this function is from generate_timeslots.php
                        // it generates the doctor's available timeslots for user to choose
                        GenerateTimeslots($conn, $doctor_list);
                        ?>
                    </select>
                    <small>Office hours are 9am to 6pm</small>
                    <input id="bookings" type="submit" value="Book now!">
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