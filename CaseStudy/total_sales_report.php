<?php
include("conn.php");

// Get sales data by date
$date_to_query = date('Y-m-d');
$data_set_sql = "SELECT * FROM sales WHERE created_at = '" .$date_to_query ."';";
$data_set;
if (!mysqli_query($conn, $data_set_sql)) {
    echo "Failed to fetch sales data";
    mysqli_close($conn);
}
else
{
    $data_set = mysqli_query($conn, $data_set_sql);
}

// Calculate total sales based on products
$just_java_total=0;
$cafe_au_lait_total=0;
$iced_cap_total=0;

foreach($data_set as $data)
{
    switch ($data["product_id"]) {
        case 1:
            $just_java_total += $data["product_price"];
            break;
        case 2:
        case 3:
            $cafe_au_lait_total += $data["product_price"];
            break;
        case 4:
        case 5:
            $iced_cap_total += $data["product_price"];
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>JavaJam Coffee House</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/total_sales_report.css">
    </head>
    <body>
        <header>
            <img src="assets/header.png">
        </header>
        <div id="LeftColumn">
            <p>Total Sales by Products</p>
        </div>
        <div id="RightColumn">
            <h2>Total Sales by Products</h2>
            <table id="TotalSalesTable">
                <tr>
                    <td class="title"><strong>Just Java</strong></td>
                    <td class="sales">$ <?php echo $just_java_total; ?>
                    </td>
                </tr>
                <tr>
                    <td class="title"><strong>Cafe au Lait</strong></td>
                    <td class="sales">$ <?php echo $cafe_au_lait_total; ?>
                    </td>
                </tr>
                <tr>
                    <td class="title"><strong>Iced Cappuccino</strong></td>
                    <td class="sales">$ <?php echo $iced_cap_total; ?>
                    </td>
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