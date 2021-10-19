<?php
// Create connection
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

// Create table with fields
$sql = "CREATE TABLE IF NOT EXISTS sales (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
product_id INT NOT NULL,
product_price DOUBLE NOT NULL,
created_at DATE NOT NULL
)";

if (!mysqli_query($conn, $sql)) {
	echo "Error creating sales: " . mysqli_error($conn);
	mysqli_close($conn);
}

mysqli_close($conn);
?>