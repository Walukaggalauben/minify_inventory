<?php

include 'db.php';

$result = mysqli_query(
$conn,
"SELECT * FROM phones"
);

?>

<h2>Phone Inventory</h2>

<table border="1">

<tr>
<th>ID</th>
<th>Brand</th>
<th>Model</th>
<th>Quantity</th>
<th>Selling Price</th>
<th>Actions</th>
</tr>
<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['brand']; ?></td>
<td><?php echo $row['model']; ?></td>
<td><?php echo $row['quantity']; ?></td>
<td><?php echo $row['selling_price']; ?></td>

<td>
<a href="edit_phone.php?id=<?php echo $row['id']; ?>">Edit</a>

|

<a href="delete_phone.php?id=<?php echo $row['id']; ?>">
Delete
</a>
</td>

</tr>

<?php } ?>

</table>