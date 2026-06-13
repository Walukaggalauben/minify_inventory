<?php

include 'check_login.php';
include 'db.php';

$report = mysqli_fetch_assoc(

mysqli_query(

$conn,

"SELECT

COUNT(*) as transactions,

IFNULL(SUM(profit),0) as total_profit

FROM sales"

)

);

include 'includes/header.php';

?>

<h1>💰 Profit Report</h1>

<br>

<div class="card">

<p>

<strong>Total Transactions:</strong>

<?php echo $report['transactions']; ?>

</p>

<br>

<p>

<strong>Total Profit:</strong>

UGX <?php echo number_format($report['total_profit']); ?>

</p>

</div>

<?php include 'includes/footer.php'; ?>