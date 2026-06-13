<?php

include 'db.php';

$result = mysqli_query(

$conn,

"SELECT
sales.*,
phones.brand,
phones.model,
customers.customer_name

FROM sales

JOIN phones
ON sales.phone_id = phones.id

JOIN customers
ON sales.customer_id = customers.id

ORDER BY sales.id DESC"

);

include 'includes/header.php';

?>

<h1>📋 Sales History</h1>

<br>

<div class="card">

<table>

<tr>

<th>ID</th>
<th>Customer</th>
<th>Phone</th>
<th>Qty</th>
<th>Total</th>
<th>Profit</th>
<th>Date</th>
<th>Receipt</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['customer_name']; ?></td>

<td>
<?php echo $row['brand']; ?>
<?php echo " "; ?>
<?php echo $row['model']; ?>
</td>

<td><?php echo $row['quantity']; ?></td>

<td>
UGX <?php echo number_format($row['total']); ?>
</td>

<td>
UGX <?php echo number_format($row['profit']); ?>
</td>

<td><?php echo $row['sale_date']; ?></td>

<td>

<a href="receipt.php?id=<?php echo $row['id']; ?>">

🧾 View

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<?php include 'includes/footer.php'; ?>