<?php
include("conn.php");

session_start();

// This php file handles 4 different actions:
// 1. patient booking a new appointment
// 2. patient rescheduling
// 3. doctor blocking his timeslots
// 4. doctor rescheduling

// patient booking a new appointment with doctor
if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "patient" && !isset($_SESSION["appt_id"]))
{
    if (isset($_POST["timeslot"]) && isset($_POST["doctorId"]))
    {
        // prepare the data to be inserted
        $patient_id = $_SESSION["user_id"];
        $doctor_id = $_POST["doctorId"];
        $start_at = $_POST["timeslot"];
        $end_at_datetime = new DateTime($start_at);
        $end_at_datetime->add(new DateInterval("PT1H"));
        $end_at = $end_at_datetime->format("Y-m-d H:i:s");

        // insert the data
        $new_appt_query = "INSERT INTO appointments (start_at, end_at, doctor_id, patient_id) VALUES ('$start_at', '$end_at', $doctor_id, $patient_id)";
        $new_appt_result = mysqli_query($conn, $new_appt_query);

        // send the email and redirect to profile page if booking is successful
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
        // prepare the data to be updated
        $appt_id = $_SESSION["appt_id"];
        $doctor_id = $_POST["doctorId"];
        $start_at = $_POST["timeslot"];
        $end_at_datetime = new DateTime($start_at);
        $end_at_datetime->add(new DateInterval("PT1H"));
        $end_at = $end_at_datetime->format("Y-m-d H:i:s");

        // update that particular appointment (passed in with $_SESSION["appt_id"])
        $resche_appt_query = "UPDATE appointments SET start_at='$start_at', end_at='$end_at', doctor_id=$doctor_id WHERE id=$appt_id";
        $resche_appt_result = mysqli_query($conn, $resche_appt_query);

        // send the email and redirect to profile page if rescheduling is successful
        if (!$resche_appt_result) {
            echo "Rescheduling Query Failed";
        } else {
            $to = "f32ee@localhost";
            $subject = "Rechedule Successful";
            $message = "You have successfully rescheduled a session";
            $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To:f32ee@localhost' . '\r\n' . 'X-Mailer:PHP/' . phpversion();

            mail($to, $subject, $message, $headers, '-ff32ee@localhost');

            // unset the session variable on successful rescheduling
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
        // prepare the data to be inserted
        $patient_id = $_SESSION["user_id"];
        $doctor_id = $_SESSION["user_id"];
        $start_at = $_POST["timeslot"];
        $end_at_datetime = new DateTime($start_at);
        $end_at_datetime->add(new DateInterval("PT1H"));
        $end_at = $end_at_datetime->format("Y-m-d H:i:s");

        // insert the data
        $new_appt_query = "INSERT INTO appointments (start_at, end_at, doctor_id, patient_id) VALUES ('$start_at', '$end_at', $doctor_id, $patient_id)";
        $new_appt_result = mysqli_query($conn, $new_appt_query);

        // send the email and redirect to profile page if blocking is successful
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
        // prepare the data to be updated
        $appt_id = $_SESSION["appt_id"];
        $start_at = $_POST["timeslot"];
        $end_at_datetime = new DateTime($start_at);
        $end_at_datetime->add(new DateInterval("PT1H"));
        $end_at = $end_at_datetime->format("Y-m-d H:i:s");

        // update that particular appointment (passed in with $_SESSION["appt_id"])
        $resche_appt_query = "UPDATE appointments SET start_at='$start_at', end_at='$end_at' WHERE id=$appt_id";
        $resche_appt_result = mysqli_query($conn, $resche_appt_query);

        // send the email and redirect to profile page if rescheduling is successful
        if (!$resche_appt_result) {
            echo "Rescheduling Query Failed";
        } else {
            $to = "f32ee@localhost";
            $subject = "Rescheduling Timeslot Successful";
            $message = "You have successfully rescheduled a timeslot";
            $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To:f32ee@localhost' . '\r\n' . 'X-Mailer:PHP/' . phpversion();

            mail($to, $subject, $message, $headers, '-ff32ee@localhost');

            // unset the session variable on successful rescheduling
            unset($_SESSION["appt_id"]);

            header("Location: profile.php");
        }
    }
}