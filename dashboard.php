<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'check_login.php';
include 'db.php';

$totalPhones = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM phones")
);

$totalStock = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT IFNULL(SUM(quantity),0) as stock FROM phones")
);

$totalSales = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT IFNULL(SUM(total),0) as sales FROM sales")
);

$totalProfit = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT IFNULL(SUM(profit),0) as profit FROM sales")
);

$totalExpenses = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT IFNULL(SUM(amount),0) as expenses
FROM expenses")
);

$netProfit =
($totalProfit['profit'] ?? 0)
-
($totalExpenses['expenses'] ?? 0);

$inventoryValue = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT IFNULL(SUM(quantity * buying_price),0) as value FROM phones")
);

$salesToday = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT IFNULL(SUM(total),0) as sales_today
FROM sales
WHERE DATE(sale_date)=CURDATE()")
);

$profitToday = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT IFNULL(SUM(profit),0) as profit_today
FROM sales
WHERE DATE(sale_date)=CURDATE()")
);

$totalCustomers = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM customers")
);

$monthlySales = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT IFNULL(SUM(total),0) as monthly_sales
FROM sales
WHERE MONTH(sale_date)=MONTH(CURDATE())
AND YEAR(sale_date)=YEAR(CURDATE())")
);

$monthlyProfit = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT IFNULL(SUM(profit),0) as monthly_profit
FROM sales
WHERE MONTH(sale_date)=MONTH(CURDATE())
AND YEAR(sale_date)=YEAR(CURDATE())")
);

$monthlyExpenses = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT IFNULL(SUM(amount),0) as monthly_expenses
FROM expenses
WHERE MONTH(expense_date)=MONTH(CURDATE())
AND YEAR(expense_date)=YEAR(CURDATE())"
)
);

$averageSale = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT IFNULL(AVG(total),0) as average_sale
FROM sales")
);

$bestSelling = mysqli_query(
$conn,
"SELECT
phones.brand,
phones.model,
SUM(sales.quantity) as sold
FROM sales
JOIN phones ON sales.phone_id = phones.id
GROUP BY sales.phone_id
ORDER BY sold DESC
LIMIT 5"
);

$lowStock = mysqli_query(
$conn,
"SELECT * FROM phones
WHERE quantity <= 2"
);

$salesChart = mysqli_query(

$conn,

"SELECT

MONTH(sale_date) as month,

SUM(total) as sales

FROM sales

GROUP BY MONTH(sale_date)

ORDER BY MONTH(sale_date)"

);

$months = [];
$salesData = [];

$monthNames = [

1 => "Jan",
2 => "Feb",
3 => "Mar",
4 => "Apr",
5 => "May",
6 => "Jun",
7 => "Jul",
8 => "Aug",
9 => "Sep",
10 => "Oct",
11 => "Nov",
12 => "Dec"

];

while($row=mysqli_fetch_assoc($salesChart)){

    $months[] = $monthNames[$row['month']];
    $salesData[] = $row['sales'];

}

include 'includes/header.php';

?>

<h1>📊 Dashboard</h1>

<br>

<div class="cards">

<div class="card">
<h2><?php echo $totalPhones['total']; ?></h2>
<p>Total Phone Models</p>
</div>

<div class="card">
<h2><?php echo $totalStock['stock']; ?></h2>
<p>Total Stock Available</p>
</div>

<div class="card">
<h2>UGX <?php echo number_format($totalSales['sales']); ?></h2>
<p>Total Sales</p>
</div>

<div class="card">
<h2>UGX <?php echo number_format($totalProfit['profit']); ?></h2>
<p>Total Profit</p>
</div>

<div class="card">
<h2>UGX <?php echo number_format($totalExpenses['expenses']); ?></h2>
<p>Total Expenses</p>
</div>

<div class="card">
<h2>UGX <?php echo number_format($netProfit); ?></h2>
<p>Net Profit</p>
</div>

<div class="card">
<h2>UGX <?php echo number_format($inventoryValue['value']); ?></h2>
<p>Inventory Value</p>
</div>

<div class="card">
<h2>UGX <?php echo number_format($salesToday['sales_today']); ?></h2>
<p>Sales Today</p>
</div>

<div class="card">
<h2>UGX <?php echo number_format($profitToday['profit_today']); ?></h2>
<p>Profit Today</p>
</div>

<div class="card">
<h2><?php echo $totalCustomers['total']; ?></h2>
<p>Total Customers</p>
</div>

</div>

<br>

<div class="card">

<h2>📈 Monthly Business Analytics</h2>

<br>

<table>

<tr>
<th>Metric</th>
<th>Value</th>
</tr>

<tr>
<td>Sales This Month</td>
<td>UGX <?php echo number_format($monthlySales['monthly_sales']); ?></td>
</tr>

<tr>
<td>Profit This Month</td>
<td>UGX <?php echo number_format($monthlyProfit['monthly_profit']); ?></td>
</tr>

<tr>
<td>Expenses This Month</td>
<td>UGX <?php echo number_format($monthlyExpenses['monthly_expenses']); ?></td>
</tr>

<tr>
<td>Total Customers</td>
<td><?php echo $totalCustomers['total']; ?></td>
</tr>

<tr>
<td>Average Sale Value</td>
<td>UGX <?php echo number_format($averageSale['average_sale']); ?></td>
</tr>

</table>

</div>

<br>

<pre>
</pre>

<div class="card">

<h2>📈 Monthly Sales Chart</h2>

<canvas id="salesChart"></canvas>

</div>

<script>

const ctx = document.getElementById('salesChart');

new Chart(ctx, {

type: 'bar',

data: {

labels: <?php echo json_encode($months); ?>,

datasets: [{

label: 'Sales (UGX)',

data: <?php echo json_encode($salesData); ?>,

borderWidth: 1

}]

},

options: {

responsive: true,

scales: {

y: {

beginAtZero: true

}

}

}

});

</script>

<h2>🏆 Best Selling Phones</h2>

<br>

<table>

<tr>
<th>Phone</th>
<th>Units Sold</th>
</tr>

<?php while($row=mysqli_fetch_assoc($bestSelling)){ ?>

<tr>

<td>
<?php echo $row['brand']; ?>
<?php echo " "; ?>
<?php echo $row['model']; ?>
</td>

<td>
<?php echo $row['sold']; ?>
</td>

</tr>

<?php } ?>

</table>

</div>

<br>

<div class="card">

<h2>⚠ Low Stock Alerts</h2>

<br>

<?php

if(mysqli_num_rows($lowStock) > 0){

while($phone=mysqli_fetch_assoc($lowStock)){

echo "<p style='color:red;font-weight:bold;'>";
echo $phone['brand']." ".$phone['model']." only ".$phone['quantity']." remaining";
echo "</p>";

}

}else{

echo "<p style='color:green;'>All stock levels are healthy.</p>";

}

?>

</div>

<?php include 'includes/footer.php'; ?>