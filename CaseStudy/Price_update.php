<?php
include "fetch.php";
?>

<!doctype html>
<html lang="en">

<head>
	 <title>JavaJam Coffee House</title>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/menu.css">
	 <script defer src="js/update.js"></script>
</head>
<body>
	<div class="wrapper">
<header>
     <img src="assets/header.png">
</header>
        <div id="LeftColumn">
            <nav>
                <a href="index.php"><strong>Home</strong></a> &nbsp;
                <a href="menu.php"><strong>Menu</strong></a> &nbsp;
                <a href="music.html"><strong>Music</strong></a> &nbsp;
                <a href="jobs.html"><strong>Jobs</strong></a> &nbsp;
                <a href="sales_report.html"><strong>Admin-SR</strong></a>
				<a href="Price_update.php"><strong>Admin-PU</strong></a>
            </nav>
        </div>

			<div id="RightColumn">
            <h2>Click to update product prices</h2>
			<form action="UpdateDB.php" method="get">
			
            <table id="MenuTable">
                <tr>
					<td class="width:50px;"><input type="checkbox" name="JavaCheck" id="JavaCheck" onclick="updateInput(1)">
                    <td class="title"><strong>Just Java</strong></td>
                    <td class="description">
                        Regular house blend, decaffeinated coffee, or flavor of the day.
                        <br>
                        <strong>Endless Cup $<span id="JavaPrice"></span><input style="width:50px;" step="0.01" formnovalidate type="hidden" id="Java" name="Java"></strong>
									<?php insert_row(1) ?>
                   
                    </td>
                    
                </tr>
                <tr>
					<td class="width:50px;"><input type="checkbox" name="cafeCheck" id="cafeCheck" onclick="updateInput(2)">
                    <td class="title"><strong>Cafe au Lait</strong></td>
                    <td class="description">
                        House blended coffee infused into a smooth, steamed milk.
                        <br>
                        <strong>Single $<span id="singleCafePrice"></span><input style="width: 50px;" step="0.01" type="hidden" id="singleCafe" name="singleCafe"></strong>
						<?php insert_row(2) ?>
                        
                        <strong>Double $<span id="doubleCafePrice"></span><input style="width: 50px;" step="0.01" type="hidden" id="doubleCafe" name="doubleCafe"></strong>
						<?php insert_row(3) ?>
                    </td>
                    
                </tr>
                <tr>
					<td class="width:50px;"><input type="checkbox" name="cappuccinoCheck" id="cappuccinoCheck" onclick="updateInput(3)">
                    <td class="title"><strong>Iced Cappuccino</strong></td>
                    <td class="description">
                        Sweetened espresso blended with icy-cold milk and served in a chilled glass.
                        <br>
                        <strong>Single $<span id="singleCappuccinoPrice"></span><input style="width: 50px;" step="0.01" type="hidden" id="singleCappuccino" name="singleCappuccino"></strong>
						 <?php insert_row(4) ?>
                        <strong>Double $<span id="doubleCappuccinoPrice"></span><input style="width: 50px;" step="0.01" type="hidden" id="doubleCappuccino" name="doubleCappuccino"></strong>
						 <?php insert_row(5) ?>
                    </td>
                    
                </tr>
               
            </table>
        </div>
        <footer> 
            Copyright &copy; 2021 JavaJam Coffee House
            <br>
            <a href="mailto:yifan@yao.com">yifan@yao.com</a>
        </footer>
   


