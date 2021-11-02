<?php
function GenerateTimeslots($conn, $doctor_list)
{
    // calculate avaiable time slots for each doctor
    $available_timeslots_by_doctor = [];
    foreach ($doctor_list as $doctor) {
        $id = $doctor["id"];
        $appointment_query = "SELECT * FROM appointments WHERE doctor_id =" . $id;
        $appointment_result = mysqli_query($conn, $appointment_query);
        $booked_timeslots = [];
        while ($row = mysqli_fetch_assoc($appointment_result)) {
            $booked_timeslots[] = $row["start_at"];
        }

        // get the next 5 working days
        $next_5_working_dates = [];
        $date = new DateTime();
        while (count($next_5_working_dates) < 5) {
            $date->add(new DateInterval('P1D'));
            if ($date->format("N") < 6) {
                $next_5_working_dates[] = $date->format("Y-m-d");
            }
        }

        // initialize available timeslots for the next 5 working days
        $working_hours = [
            "09:00:00",
            "10:00:00",
            "11:00:00",
            "12:00:00",
            "13:00:00",
            "14:00:00",
            "15:00:00",
            "16:00:00",
            "17:00:00",
        ];
        $initial_timeslots = [];
        foreach ($next_5_working_dates as $date) {
            foreach ($working_hours as $working_hour) {
                $initial_timeslots[] = $date . " " . $working_hour;
            }
        }

        // extract booked timeslots to get actual available timeslots
        $available_timeslots = array_diff($initial_timeslots, $booked_timeslots);
        $available_timeslots_by_doctor[$doctor["id"]] = $available_timeslots;
    }

    // populate the options
    foreach ($available_timeslots_by_doctor as $doctor_id => $available_timeslots) {
        foreach ($available_timeslots as $timeslot) {
            $start_datetime = new DateTime($timeslot);
            $end_datetime = new DateTime($timeslot);
            $end_datetime = $end_datetime->add(new DateInterval("PT1H"));
            $human_readable_timeslot = $start_datetime->format("Y-M-d hA") . " - " . $end_datetime->format("hA");
            echo "<option value='" . $timeslot . "' class='timeslot-option option-for-id-" . $doctor_id . "' disabled>" . $human_readable_timeslot . "</option>";
        }
    }
}

function GenerateTimeslotsForDoctor($conn, $doctor_info)
{
    // calculate avaiable time slots for each doctor
    $doctor_id = $doctor_info["id"];
    $appointment_query = "SELECT * FROM appointments WHERE doctor_id =" . $doctor_id;
    $appointment_result = mysqli_query($conn, $appointment_query);
    $booked_timeslots = [];
    while ($row = mysqli_fetch_assoc($appointment_result)) {
        $booked_timeslots[] = $row["start_at"];
    }

    // get the next 5 working days
    $next_5_working_dates = [];
    $date = new DateTime();
    while (count($next_5_working_dates) < 5) {
        $date->add(new DateInterval('P1D'));
        if ($date->format("N") < 6) {
            $next_5_working_dates[] = $date->format("Y-m-d");
        }
    }

    // initialize available timeslots for the next 5 working days
    $working_hours = [
        "09:00:00",
        "10:00:00",
        "11:00:00",
        "12:00:00",
        "13:00:00",
        "14:00:00",
        "15:00:00",
        "16:00:00",
        "17:00:00",
    ];
    $initial_timeslots = [];
    foreach ($next_5_working_dates as $date) {
        foreach ($working_hours as $working_hour) {
            $initial_timeslots[] = $date . " " . $working_hour;
        }
    }

    // extract booked timeslots to get actual available timeslots
    $available_timeslots = array_diff($initial_timeslots, $booked_timeslots);

    // populate the options
    foreach ($available_timeslots as $timeslot) {
        $start_datetime = new DateTime($timeslot);
        $end_datetime = new DateTime($timeslot);
        $end_datetime = $end_datetime->add(new DateInterval("PT1H"));
        $human_readable_timeslot = $start_datetime->format("Y-M-d hA") . " - " . $end_datetime->format("hA");
        echo "<option value='" . $timeslot . "' class='timeslot-option option-for-id-" . $doctor_id . "'>" . $human_readable_timeslot . "</option>";
    }
}
