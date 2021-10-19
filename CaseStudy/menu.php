<?php
include "fetch.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>JavaJam Coffee House</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/menu.css">
        <script src="js/menu.js"></script>
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
            <h2>Coffee at JavaJam</h2>
            <table id="MenuTable">
                <tr>
                    <td class="title"><strong>Just Java</strong></td>
                    <td class="description">
                        Regular house blend, decaffeinated coffee, or flavor of the day.
                        <br>
                        <strong>Endless Cup $<span id="JavaPrice"><?php insert_row(1) ?></span></strong>
                        <input type="radio" class="price-select" name="JustJavaChoice" value="just_java_single" checked>
                    </td>
                    <td class="order"><input type="text" id="JustJavaQty" placeholder="0" value=0 onkeyup="CalculateJustJava(this)"></td>
                    <td class="order"><input type="text" id="JustJavaPrice" placeholder="0" value=0 readonly></td>
                </tr>
                <tr>
                    <td class="title"><strong>Cafe au Lait</strong></td>
                    <td class="description">
                        House blended coffee infused into a smooth, steamed milk.
                        <br>
                        <strong>Single $<span id="singleCafePrice"><?php insert_row(2) ?></span></strong>
						
                        <input type="radio" class="price-select" name="CafeAuLaitChoice" value="cafe_au_lait_single" onchange="CalculateCafeAuLait()" checked>
                        <strong>Double $<span id="doubleCafePrice"><?php insert_row(3) ?></span></strong></strong>
                        <input type="radio" class="price-select" name="CafeAuLaitChoice" value="cafe_au_lait_double" onchange="CalculateCafeAuLait()">
                    </td>
                    <td class="order"><input type="text" id="CafeAuLaitQty" placeholder="0" value=0 onkeyup="CalculateCafeAuLait()"></td>
                    <td class="order"><input type="text" id="CafeAuLaitPrice" placeholder="0" value=0 readonly></td>
                </tr>
                <tr>
                    <td class="title"><strong>Iced Cappuccino</strong></td>
                    <td class="description">
                        Sweetened espresso blended with icy-cold milk and served in a chilled glass.
                        <br>
                        <strong>Single $<span id="singleCappuccinoPrice"><?php insert_row(4) ?></span></strong>
						
                        <input type="radio" class="price-select" name="IcedCapChoice" value="iced_cappuccino_single" onchange="CalculateIcedCap()" checked>
                        <strong>Double $<span id="doubleCappuccinoPrice"><?php insert_row(5) ?></span></strong>
                        <input type="radio" class="price-select" name="IcedCapChoice" value="iced_cappuccino_double" onchange="CalculateIcedCap()">
                    </td>
                    <td class="order"><input type="text" id="IcedCapQty" placeholder="0" value=0 onkeyup="CalculateIcedCap()"></td>
                    <td class="order"><input type="text" id="IcedCapPrice" placeholder="0" value=0 readonly></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="title">Total Price</td>
                    <td class="order"><input type="text" id="TotalPrice" placeholder="0" value=0></td>
                </tr>
            </table>
        </div>
        <footer> 
            Copyright &copy; 2021 JavaJam Coffee House
            <br>
            <a href="mailto:yifan@yao.com">yifan@yao.com</a>
        </footer>
    </body>
</html>