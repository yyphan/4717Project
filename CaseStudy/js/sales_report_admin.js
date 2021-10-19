function generateTotalSales() {
    if (document.getElementById("TotalSalesCB").checked)
    {
        window.open("total_sales_report.php");
    }
}

function generateSalesQty() {
    if (document.getElementById("SalesQtyCB").checked)
    {
        window.open("sales_qty_report.php");
    }
}