<?php

include 'check_login.php';
include 'db.php';

$result = mysqli_query(
$conn,
"SELECT * FROM phones
ORDER BY quantity ASC"
);

include 'includes/header.php';

?>

<h1>📦 Stock Report</h1>

<br>

<div class="card">

<table>

<tr>

<th>ID</th>
<th>Brand</th>
<th>Model</th>
<th>Stock</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['brand']; ?></td>

<td><?php echo $row['model']; ?></td>

<td><?php echo $row['quantity']; ?></td>

</tr>

<?php } ?>

</table>

</div>

<?php include 'includes/footer.php'; ?>