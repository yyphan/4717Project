<?php
include("conn.php");

//Declare variables 
$Java=$_GET['Java'];
$singleCafe=$_GET['singleCafe'];
$doubleCafe=$_GET['doubleCafe'];
$singleCappuccino=$_GET['singleCappuccino'];
$doubleCappuccino=$_GET['doubleCappuccino'];

for($j = 1; $j <= 5; $j++) {
	if ($j == 1) {
		$sql = "UPDATE f32ee.JAVATABLE SET product_price = $Java WHERE product_id = $j";
		mysqli_query($conn, $sql);
	} elseif ($j == 2) {
		$sql = "UPDATE f32ee.JAVATABLE SET product_price = $singleCafe WHERE product_id = $j";
		mysqli_query($conn, $sql);
	} elseif ($j == 3) {
		$sql = "UPDATE f32ee.JAVATABLE SET product_price = $doubleCafe WHERE product_id = $j";
		mysqli_query($conn, $sql);
	} elseif ($j == 4) {
		$sql = "UPDATE f32ee.JAVATABLE SET product_price = $singleCappuccino WHERE product_id = $j";
		mysqli_query($conn, $sql);
	} elseif ($j == 5) {
		$sql = "UPDATE f32ee.JAVATABLE SET product_price = $doubleCappuccino WHERE product_id = $j";
		mysqli_query($conn, $sql);
	}
}
mysqli_close($conn);
header("refresh:0;url=Price_update.php");

?>