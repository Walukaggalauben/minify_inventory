<?php

include 'check_login.php';
include 'db.php';

$result = mysqli_query(
$conn,
"SELECT * FROM customers
ORDER BY customer_name ASC"
);

$total = mysqli_num_rows($result);

include 'includes/header.php';

?>

<h1>👥 Customer Report</h1>

<br>

<div class="card">

<h2>

Total Customers:
<?php echo $total; ?>

</h2>

</div>

<br>

<div class="card">

<table>

<tr>

<th>ID</th>
<th>Customer Name</th>
<th>Phone Number</th>

</tr>

<?php

mysqli_data_seek($result,0);

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['customer_name']; ?></td>

<td><?php echo $row['phone']; ?></td>

</tr>

<?php } ?>

</table>

</div>

<?php include 'includes/footer.php'; ?>