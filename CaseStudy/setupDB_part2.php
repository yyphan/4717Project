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

// -------------Do these manually in phpmyadmin----------------
// -------------created_at will be current date----------------

// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '1', 2.00, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '1', 2.00, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '2', 3.00, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '3', 4.00, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '4', 4.75, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '2', 3.00, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '3', 4.00, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '5', 5.75, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '1', 2.00, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '2', 3.00, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '3', 4.00, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '5', 5.75, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '2', 3.00, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '3', 4.00, '2021-10-19');
// INSERT INTO sales (id, product_id, product_price, created_at)
// VALUES (NULL, '5', 5.75, '2021-10-19');
?>