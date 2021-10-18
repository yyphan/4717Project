<?php

//Create table in database 

// Create connection
$conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "use f32ee";

if (!mysqli_query($conn, $sql)) {
	echo "Failed to switch tables, check use statement.";
	mysqli_close($conn);
}

//Create table with fields
$sql = "CREATE TABLE IF NOT EXISTS JAVATABLE (
product_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
product_name VARCHAR(30) NOT NULL,
product_price DOUBLE NOT NULL
)";

if (!mysqli_query($conn, $sql)) {
	echo "Error creating JAVATABLE: " . mysqli_error($conn);
	mysqli_close($conn);
}

//Insert Values to table
$sql = "INSERT INTO JAVATABLE (product_id, product_name, product_price)
VALUES (NULL, 'Endless cup', 2.00);";
if (!mysqli_query($conn, $sql)) {
	echo "Error inserting Java: " . mysqli_error($conn);
	mysqli_close($conn);
}

$sql = "INSERT INTO JAVATABLE (product_id, product_name, product_price)
VALUES (NULL, 'Single Cafe au Lait', 3.00);";
if (!mysqli_query($conn, $sql)) {
	echo "Error inserting Single cafe: " . mysqli_error($conn);
	mysqli_close($conn);
}
$sql = "INSERT INTO JAVATABLE (product_id, product_name, product_price)
VALUES (NULL, 'Double Cafe au Lait', 4.00);";
if (!mysqli_query($conn, $sql)) {
	echo "Error inserting Double cafe: " . mysqli_error($conn);
	mysqli_close($conn);
}
$sql = "INSERT INTO JAVATABLE (product_id, product_name, product_price)
VALUES (NULL, 'Single Cappuccino', 4.75);";
if (!mysqli_query($conn, $sql)) {
	echo "Error inserting Single Cappuccino: " . mysqli_error($conn);
	mysqli_close($conn);
}
$sql = "INSERT INTO JAVATABLE (product_id, product_name, product_price)
VALUES (NULL, 'Double Cappuccino', 5.75);";
if (!mysqli_query($conn, $sql)) {
	echo "Error inserting Double Cappuccino: " . mysqli_error($conn);
	mysqli_close($conn);
}

mysqli_close($conn);
?>