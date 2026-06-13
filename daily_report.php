<?php

include 'check_login.php';
include 'db.php';

$report = mysqli_fetch_assoc(

mysqli_query(

$conn,

"SELECT

COUNT(*) as total_sales,

IFNULL(SUM(total),0) as sales,

IFNULL(SUM(profit),0) as profit

FROM sales

WHERE DATE(sale_date)=CURDATE()"

)

);

include 'includes/header.php';

?>

<h1>📅 Daily Sales Report</h1>

<br>

<div class="card">

<p>

<strong>Total Transactions:</strong>

<?php echo $report['total_sales']; ?>

</p>

<br>

<p>

<strong>Total Sales:</strong>

UGX <?php echo number_format($report['sales']); ?>

</p>

<br>

<p>

<strong>Total Profit:</strong>

UGX <?php echo number_format($report['profit']); ?>

</p>

</div>

<?php include 'includes/footer.php'; ?>