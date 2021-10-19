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
$endless_cup_qty=0;
$single_qty=0;
$double_qty=0;

foreach($data_set as $data)
{
    switch ($data["product_id"]) {
        case 1:
            $endless_cup_qty++;
            break;
        case 2:
        case 4:
            $single_qty++;
            break;
        case 3:
        case 5:
            $double_qty++;
            break;
    }
}

$category_sales_arr = [
    "Endless Cup" => $endless_cup_qty,
    "Single Shots" => $single_qty,
    "Double Shots" => $double_qty
];


$best_seller = array_search(max($category_sales_arr), $category_sales_arr);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>JavaJam Coffee House</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/sales_qty_report.css">
    </head>
    <body>
        <header>
            <img src="assets/header.png">
        </header>
        <div id="LeftColumn">
            <p>Sales Quantity by Categories</p>
        </div>
        <div id="RightColumn">
            <h2>Sales Quantity by Categories</h2>
            <h3>The best selling category today is <?php echo $best_seller; ?> </h3>
            <table id="SalesQtyTable">
                <tr>
                    <td class="title"><strong>Endless Cup</strong></td>
                    <td class="sales"><?php echo $category_sales_arr["Endless Cup"]; ?>
                    </td>
                </tr>
                <tr>
                    <td class="title"><strong>Single Shots</strong></td>
                    <td class="sales"><?php echo $category_sales_arr["Single Shots"]; ?>
                    </td>
                </tr>
                <tr>
                    <td class="title"><strong>Double Shots</strong></td>
                    <td class="sales"><?php echo $category_sales_arr["Double Shots"]; ?>
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