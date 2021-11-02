<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <div id="wrapper">
        <?php include("header.php"); ?>
        <div class = "profile">
			<h8><?php
			  // check session variable
			
			if (isset($_SESSION['user_name'])) {
				
			echo 'You are logged in as:  '.$_SESSION['user_name'].', Email: '.$_SESSION['user_email'].'';}
			
		
			else {
				echo '<p>You are not signed in.</p>';
			echo '<p>Please sign in first...</p>';
			header('Refresh: 2; URL = login.php');}
			?></h8>
			
			<h8><?php
			$currentDate = date('Y-m-d');
			echo $currentDate;
			?></h8>
			
			<?php	//member information page
				$conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");
				// Check connection
				if ($conn->connect_error) {
				  die("Connection failed: " . $conn->connect_error);
				}
				// Use the f32ee database
				$sql = "use f32ee";
				if (!mysqli_query($conn, $sql)) {
					echo "Failed to switch tables, check use statement.";
					mysqli_close($conn);
				}
				$user_id = $_SESSION['user_id'];
				$query = "SELECT start_at, end_at, doctor_id FROM appointments WHERE patient_id = " . $user_id . " AND start_at >=CURRENT_TIMESTAMP ORDER BY start_at DESC";	
			
				$result = mysqli_query($conn,$query);
				
				
				if ($result->num_rows > 0 )
				{
					$i = 1;
					
					echo '<p style="margin: 20px auto;">';
					echo "The table below shows your current appointments.";
					echo '</p>';
					echo '<table border="1">';
					echo '<tr><td>No.</td><td>Start Time</td><td>End Time</td><td>Doctor</td></tr>';
					while ($row = $result->fetch_assoc())
					{
						
						if ($row['doctor_id'] == 0){
							
							echo '<tr><td>'.$i.'</td><td>'.$row['start_at'].'</td><td>'.$row['end_at'].'</td><td>Bender Bot<td><button>Reschedule</button></td></td>';
						}
						else {
						echo '<tr><td>'.$i.'</td><td>'.$row['start_at'].'</td><td>'.$row['end_at'].'</td><td>Goldman Bot<td><button>Reschedule</button></td></td>';
						}
						
						$i = $i + 1;
					}
					echo '</table>';
				}
				else
				{
					echo '<p>You have no appointments.</p>';	
				}
			?>
			
			<?php	//member information page
				$conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");
				// Check connection
				if ($conn->connect_error) {
				  die("Connection failed: " . $conn->connect_error);
				}
				// Use the f32ee database
				$sql = "use f32ee";
				if (!mysqli_query($conn, $sql)) {
					echo "Failed to switch tables, check use statement.";
					mysqli_close($conn);
				}
				$user_id = $_SESSION['user_id'];
				$query = "SELECT start_at, end_at, doctor_id FROM appointments WHERE patient_id = " . $user_id . " AND end_at <=CURRENT_TIMESTAMP ORDER BY start_at DESC";	
			
				$result = mysqli_query($conn,$query);
				
				
				if ($result->num_rows > 0 )
				{
					$i = 1;
					echo '<p style="margin: 20px auto;">';
					echo "The table below shows your booking history.";
					echo '</p>';
					echo '<table border="1">';
					echo '<tr><td>No.</td><td>Start Time</td><td>End Time</td><td>Doctor</td></tr>';
					while ($row = $result->fetch_assoc())
					{
						if ($row['doctor_id'] == 0){
							
							echo '<tr><td>'.$i.'</td><td>'.$row['start_at'].'</td><td>'.$row['end_at'].'</td><td>Bender Bot<td><button>Reschedule</button></td></td>';
						}
						else {
						echo '<tr><td>'.$i.'</td><td>'.$row['start_at'].'</td><td>'.$row['end_at'].'</td><td>Goldman Bot<td><button>Reschedule</button></td></td>';
						}
						
						
						$i = $i + 1;
					}
					echo '</table>';
				}
				else
				{
					echo '<p>You have not booked any appointments yet.</p>';	
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
