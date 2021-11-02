<?php
include("conn.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Profile</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/profile.css">
	<script src="js/profile.js"></script>
</head>

<body>
	<div id="wrapper">
		<?php include("header.php"); ?>
		<div class="profile">
			<!-- Rescheduling will be done by submitting the id of the appointment to be rescheduled-->
			<form method="POST" id="RescheduleForm" action="booking.php" hidden>
				<input type="text" name="appt_id" id="AppointmentId">
			</form>
			<h8>
				<?php
				// check session variable
				if (isset($_SESSION['user_name'])) {
					echo 'You are logged in as:  ' . $_SESSION['user_name'] . ', Email: ' . $_SESSION['user_email'] . '';
					$user_id = $_SESSION['user_id'];
				} else {
					header('location: login.php');
				}
				// get user list as id => name, to be used later to get names
				$user_list;
				$user_query = "SELECT * FROM users";
				$user_result = mysqli_query($conn, $user_query);
				while ($row = mysqli_fetch_assoc($user_result)) {
					$user_list[$row["id"]] = $row["name"];
				}
				?>
			</h8>

			<h8>
				<?php
				$currentDate = date('Y-m-d');
				echo $currentDate;
				?>
			</h8>

			<?php	// Active bookings
			if ($_SESSION["user_role"] == "patient") {
				$query = "SELECT * FROM appointments WHERE patient_id = " . $user_id . " AND start_at >=CURRENT_TIMESTAMP ORDER BY start_at ASC";
				$result = mysqli_query($conn, $query);
				if ($result->num_rows > 0) {
					$i = 1;
					echo '<p style="margin: 20px auto;">';
					echo "The table below shows your current appointments.";
					echo '</p>';
					echo '<table border="1">';
					echo '<tr><td>No.</td><td>Start Time</td><td>End Time</td><td>Doctor</td></tr>';
					while ($row = $result->fetch_assoc()) {
						// each row with reschedule button
						// store the id of the appt as id of <tr>
						// so that when rescheduling it can be known it is which appt to be resceduled
						echo '<tr><td>' . $i . '</td><td>' . $row['start_at'] . '</td><td>' . $row['end_at'] . '</td><td>' . $user_list[$row["doctor_id"]] . '</td><td><button id="' . $row["id"] . '" onclick="SubmitRescheduleForm(this)">Reschedule</button></td></tr>';
						$i = $i + 1;
					}
					echo '</table>';
				} else {
					echo '<p>You have no appointments.</p>';
				}
			} elseif ($_SESSION["user_role"] == "doctor") {
				$query = "SELECT * FROM appointments WHERE doctor_id = " . $user_id . " AND start_at >=CURRENT_TIMESTAMP ORDER BY start_at ASC";
				$result = mysqli_query($conn, $query);

				if ($result->num_rows > 0) {
					$i = 1;

					echo '<p style="margin: 20px auto;">';
					echo "The table below shows your current appointments.";
					echo '</p>';
					echo '<table border="1">';
					echo '<tr><td>No.</td><td>Start Time</td><td>End Time</td><td>Patient</td></tr>';
					while ($row = $result->fetch_assoc()) {
						// if doctor_id is same as patient_id
						// it means the record was doctor booking with himself
						// which means it was a result of doctor blocking his timeslot
						// thus we do not show here as here are all appt with patients
						if ($user_id != $row["patient_id"]) {
							// each row with reschedule button
							// store the id of the appt as id of <button>
							// so that when rescheduling it can be known it is which appt to be resceduled
							echo '<tr><td>' . $i . '</td><td>' . $row['start_at'] . '</td><td>' . $row['end_at'] . '</td><td>' . $user_list[$row["patient_id"]] . '</td><td><button id="' . $row["id"] . '" onclick="SubmitRescheduleForm(this)">Reschedule</button></td></tr>';
							$i = $i + 1;
						}
					}
					echo '</table>';
				} else {
					echo '<p>You have no appointments.</p>';
				}
			}
			?>

			<?php	// History bookings
			if ($_SESSION["user_role"] == "patient") {
				$query = "SELECT * FROM appointments WHERE patient_id = " . $user_id . " AND end_at <=CURRENT_TIMESTAMP ORDER BY start_at ASC";
				$result = mysqli_query($conn, $query);
				if ($result->num_rows > 0) {
					$i = 1;
					echo '<p style="margin: 20px auto;">';
					echo "The table below shows your booking history.";
					echo '</p>';
					echo '<table border="1">';
					echo '<tr><td>No.</td><td>Start Time</td><td>End Time</td><td>Doctor</td></tr>';
					while ($row = $result->fetch_assoc()) {
						// each row without reschedule button
						echo '<tr><td>' . $i . '</td><td>' . $row['start_at'] . '</td><td>' . $row['end_at'] . '</td><td>' . $user_list[$row["doctor_id"]] . '</td></tr>';
						$i = $i + 1;
					}
					echo '</table>';
				} else {
					echo '<p>You have not booked any appointments yet.</p>';
				}
			} elseif ($_SESSION["user_role"] == "doctor") {
				$query = "SELECT * FROM appointments WHERE doctor_id = " . $user_id . " AND end_at <=CURRENT_TIMESTAMP ORDER BY start_at ASC";
				$result = mysqli_query($conn, $query);

				if ($result->num_rows > 0) {
					$i = 1;

					echo '<p style="margin: 20px auto;">';
					echo "The table below shows your booking history.";
					echo '</p>';
					echo '<table border="1">';
					echo '<tr><td>No.</td><td>Start Time</td><td>End Time</td><td>Patient</td></tr>';
					while ($row = $result->fetch_assoc()) {
						// if doctor_id is same as patient_id
						// it means the record was doctor booking with himself
						// which means it was a result of doctor blocking his timeslot
						// thus we do not show here as here are all appt with patients
						if ($user_id != $row["patient_id"]) {
							// each row without reschedule button
							echo '<tr><td>' . $i . '</td><td>' . $row['start_at'] . '</td><td>' . $row['end_at'] . '</td><td>' . $user_list[$row["patient_id"]] . '</td></tr>';
							$i = $i + 1;
						}
					}
					echo '</table>';
				} else {
					echo '<p>You have no appointments.</p>';
				}
			}
			?>
		</div>
		<footer>
			Copyright &copy; 2021 M&Y Dental
			<br>
			<a href="mailto:MYDental@dental.com">MYDental@dental.com</a>
		</footer>
	</div>
</body>

</html>