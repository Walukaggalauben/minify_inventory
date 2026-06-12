<?php

include 'db.php';

$result = mysqli_query(
$conn,
"SELECT * FROM customers"
);

?>

<h2>Customers</h2>

<table border="1">

<tr>
<th>ID</th>
<th>Name</th>
<th>Phone</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['customer_name']; ?></td>
<td><?php echo $row['phone']; ?></td>

</tr>

<?php } ?>

</table>