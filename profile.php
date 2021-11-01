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
				
			echo 'You are logged in as:  '.$_SESSION['user_name'].' , Email: '.$_SESSION['user_email'].'';}
			else {
				echo '<p>You are not signed in.</p>';
			echo '<p>Please sign in first...</p>';
			header('Refresh: 2; URL = login.php');}
			?></h8>
			<?php	//member information page
				include("conn.php");
				$username = $_SESSION['user_id'];
				
				$query = "SELECT id, start_at, end_at, doctor_id FROM appointments WHERE appointments.id = '$username' ORDER BY start_at DESC";
						
				
				$result = $conn->query($query);
				echo $result;
				
				if ($result->num_rows > 0 )
				{
					$i = 1;
					echo '<p style="margin: 20px auto;">';
					echo " The table below shows your booking history, if you encounter any problem, please don't hesitate to give us a call.";
					echo '</p>';
					echo '<table border="1">';
					echo '<tr><td>No.</td><td>Start Time</td><td>End Time</td><td>Doctor</td></tr>';
					while ($row = $result->fetch_assoc())
					{
						echo '<tr><td>'.$i.'</td><td>'.$row['start_at'].'</td><td>'.$row['end_at'].'</td><td>'.$row['doctor_id'].'</td>';
						
						
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
