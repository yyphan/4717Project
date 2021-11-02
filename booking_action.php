<?php
include("conn.php");

session_start();

// patient booking a new appointment with doctor
if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "patient" && !isset($_SESSION["appt_id"]))
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
            $message = "You have successfully booked a session";
            $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To:f32ee@localhost' . '\r\n' . 'X-Mailer:PHP/' . phpversion();

            mail($to, $subject, $message, $headers, '-ff32ee@localhost');

            header("Location: profile.php");
        }
    }
}

// patient rescheduling an existing appointment
if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "patient" && isset($_SESSION["appt_id"]))
{
    if (isset($_POST["timeslot"]) && isset($_POST["doctorId"]))
    {
        $appt_id = $_SESSION["appt_id"];
        $patient_id = $_SESSION["user_id"];
        $doctor_id = $_POST["doctorId"];
        $start_at = $_POST["timeslot"];
        $end_at_datetime = new DateTime($start_at);
        $end_at_datetime->add(new DateInterval("PT1H"));
        $end_at = $end_at_datetime->format("Y-m-d H:i:s");

        $resche_appt_query = "UPDATE appointments SET start_at='$start_at', end_at='$end_at', doctor_id=$doctor_id WHERE id=$appt_id";
        $resche_appt_result = mysqli_query($conn, $resche_appt_query);

        if (!$resche_appt_result) {
            echo "Rescheduling Query Failed";
        } else {
            $to = "f32ee@localhost";
            $subject = "Recheduled Successful";
            $message = "You have successfully rescheduled a session";
            $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To:f32ee@localhost' . '\r\n' . 'X-Mailer:PHP/' . phpversion();

            mail($to, $subject, $message, $headers, '-ff32ee@localhost');

            unset($_SESSION["appt_id"]);

            header("Location: profile.php");
        }
    }
}

// doctor blocking a timeslot (booking an appointment with himself)
if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "doctor" && !isset($_SESSION["appt_id"]))
{
    if (isset($_POST["timeslot"]))
    {
        $patient_id = $_SESSION["user_id"];
        $doctor_id = $_SESSION["user_id"];
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
            $subject = "Blocking Timeslot Successful";
            $message = "You have successfully blocked a timeslot";
            $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To:f32ee@localhost' . '\r\n' . 'X-Mailer:PHP/' . phpversion();

            mail($to, $subject, $message, $headers, '-ff32ee@localhost');

            header("Location: profile.php");
        }
    }
}

// doctor rescheduling an existing appointment
if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "doctor" && isset($_SESSION["appt_id"]))
{
    if (isset($_POST["timeslot"]))
    {
        $appt_id = $_SESSION["appt_id"];
        $start_at = $_POST["timeslot"];
        $end_at_datetime = new DateTime($start_at);
        $end_at_datetime->add(new DateInterval("PT1H"));
        $end_at = $end_at_datetime->format("Y-m-d H:i:s");

        $resche_appt_query = "UPDATE appointments SET start_at='$start_at', end_at='$end_at' WHERE id=$appt_id";
        $resche_appt_result = mysqli_query($conn, $resche_appt_query);

        if (!$resche_appt_result) {
            echo "Rescheduling Query Failed";
        } else {
            $to = "f32ee@localhost";
            $subject = "Rescheduling Timeslot Successful";
            $message = "You have successfully rescheduled a timeslot";
            $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To:f32ee@localhost' . '\r\n' . 'X-Mailer:PHP/' . phpversion();

            mail($to, $subject, $message, $headers, '-ff32ee@localhost');

            header("Location: profile.php");
        }
    }
}