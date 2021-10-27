<?php
    include "setupDB.php"; 
    include "setupDB_part2.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>JavaJam Coffee House</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <header>
            <img src="assets/header.png">
        </header>
        <div id="LeftColumn">
            <nav>
                <a href="index.php"><strong>Home</strong></a> &nbsp;
                <a href="menu.php"><strong>Menu</strong></a> &nbsp;
                <a href="music.html"><strong>Music</strong></a> &nbsp;
                <a href="jobs.html"><strong>Jobs</strong></a> &nbsp;
                <a href="sales_report_admin.html"><strong>Admin-SR</strong></a>
				<a href="Price_update.php"><strong>Admin-PU</strong></a>
            </nav>
        </div>
        <div id="RightColumn">
            <h2>Follow the Winding Road to JavaJam</h2>
            <div id="PhotoContainer">
                <img src="assets/photo.png">
            </div>
            <div id="DescriptionContainer">
                <ul>
                <li>Specialty Coffee and Tea</li>
                <li>Bagels, Muffins, and Organic Snacks</li>
                <li>Music and Poetry Readings</li>
                <li>Open Mic Night Every Friday</li>
            </ul>
            <p>
                54321 Route 42 
                <br>
                Ellison Bay, WI 54210
            </p></div>
            
        </div>
        <footer> 
            Copyright &copy; 2021 JavaJam Coffee House
            <br>
            <a href="mailto:yifan@yao.com">yifan@yao.com</a>
        </footer>
    </body>
</html>