<?php
include("conn.php");

session_start();

if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "patient")
{
    if (isset($_POST["timeslot"]) && isset($_POST["doctorId"]))
    {
        $patient_id = $_SESSION["user_id"];
        $doctor_id = $_POST["doctorId"];
        $start_at = $_POST["timeslot"];
        $end_at_datetime = new DateTime($start_at);
        $end_at_datetime->add(new DateInterval("PT1H"));
        $end_at = $end_at_datetime->format("Y-m-d H:i:s");

        $new_appt_query = "INSERT INTO appointments (start_at, end_at, doctor_id, patient_id) VALUES ('$start_at', '$end_at', $doctor_id, $patient_id)";
        $new_appt_result = mysqli_query($conn, $new_appt_query);

        if (!$new_appt_result) {
            echo "Booking Query Failed";
        } else {
            $to = "f32ee@localhost";
            $subject = "Booking Successful";
            $message = "You have successfully Booked a session";
            $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To:f32ee@localhost' . '\r\n' . 'X-Mailer:PHP/' . phpversion();

            mail($to, $subject, $message, $headers, '-ff32ee@localhost');

            header("Location: profile.php");
        }
    }
}
