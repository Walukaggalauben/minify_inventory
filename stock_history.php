<?php

include 'check_login.php';

include 'db.php';

$result = mysqli_query(

$conn,

"SELECT

stock_receiving.*,
phones.brand,
phones.model

FROM stock_receiving

JOIN phones

ON stock_receiving.phone_id = phones.id

ORDER BY stock_receiving.id DESC"

);

include 'includes/header.php';

?>

<h1>📦 Stock Receiving History</h1>

<br>

<div class="card">

<table>

<tr>

<th>ID</th>

<th>Phone</th>

<th>Quantity Received</th>

<th>Date</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>

<?php echo $row['brand']; ?>
<?php echo " "; ?>
<?php echo $row['model']; ?>

</td>

<td><?php echo $row['quantity_received']; ?></td>

<td><?php echo $row['date_received']; ?></td>

</tr>

<?php } ?>

</table>

</div>

<?php include 'includes/footer.php'; ?>