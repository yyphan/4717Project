<?php
include("conn.php");

// Create `users` table 
$sql = "CREATE TABLE IF NOT EXISTS `users` (
`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(20) NOT NULL,
`email` VARCHAR(50) NOT NULL, 
`password` VARCHAR(150) NOT NULL,
`role` VARCHAR(20) NOT NULL
)";

if (!mysqli_query($conn, $sql)) {
    echo "Error creating users: " . mysqli_error($conn);
    mysqli_close($conn);
}

// Create `appointments` table
$sql = "CREATE TABLE IF NOT EXISTS `appointments` (
`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
`start_at` DATETIME NOT NULL,
`end_at` DATETIME NOT NULL, 
`doctor_id` INT NOT NULL,
`patient_id` INT NOT NULL
)";

if (!mysqli_query($conn, $sql)) {
    echo "Error creating appointments: " . mysqli_error($conn);
    mysqli_close($conn);
}

mysqli_close($conn);
