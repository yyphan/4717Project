<?php
//Fetch and update price from table
function insert_row($id) {
	include("conn.php");
	
	$sql = "SELECT product_price FROM JAVATABLE WHERE product_id = $id;";
	if ($result = mysqli_query($conn, $sql)) {
		$row = mysqli_fetch_row($result);
		echo number_format((float)$row[0], 2, '.', '');
	} else {
		echo "Failed fetching data from database.";
	}
	mysqli_close($conn);
}
?>