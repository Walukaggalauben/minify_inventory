<?php

include 'db.php';

$result = mysqli_query(

$conn,

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

?>

<h2>Sales History</h2>

<table border="1">

<tr>

<th>ID</th>
<th>Customer</th>
<th>Phone</th>
<th>Quantity</th>
<th>Total</th>
<th>Date</th>
<th>Receipt</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['customer_name']; ?></td>


<td>
<?php echo $row['brand']; ?>
<?php echo $row['model']; ?>
</td>

<td><?php echo $row['quantity']; ?></td>

<td><?php echo number_format($row['total']); ?></td>

<td><?php echo $row['sale_date']; ?></td>

<td>

<a href="receipt.php?id=<?php echo $row['id']; ?>">

View Receipt

</a>

</td>

</tr>

<?php } ?>

</table>