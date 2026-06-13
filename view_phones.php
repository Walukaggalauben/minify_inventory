<?php

include 'db.php';
$search = "";

if(isset($_GET['search'])){

    $search = $_GET['search'];

    $result = mysqli_query(
    $conn,

    "SELECT * FROM phones

    WHERE brand LIKE '%$search%'

    OR model LIKE '%$search%'

    OR imei LIKE '%$search%'"

    );

}else{

    $result = mysqli_query(
    $conn,
    "SELECT * FROM phones"
    );

}

include 'includes/header.php';

?>

<h1>📱 Inventory</h1>

<br>

<div class="card">

<form method="GET">

<input
type="text"
name="search"
placeholder="Search brand, model or IMEI..."
value="<?php echo $search; ?>">

<br><br>

<button type="submit">

🔍 Search

</button>

</form>

</div>

<br>

<br>

<div class="card">

<table>

<tr>
<th>ID</th>
<th>Brand</th>
<th>Model</th>
<th>Storage</th>
<th>RAM</th>
<th>Quantity</th>
<th>Price</th>
<th>Actions</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['brand']; ?></td>

<td><?php echo $row['model']; ?></td>

<td><?php echo $row['storage']; ?></td>

<td><?php echo $row['ram']; ?></td>

<td><?php echo $row['quantity']; ?></td>

<td>
UGX <?php echo number_format($row['selling_price']); ?>
</td>

<td>

<a href="edit_phone.php?id=<?php echo $row['id']; ?>">
Edit
</a>

|

<a href="delete_phone.php?id=<?php echo $row['id']; ?>">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<?php include 'includes/footer.php'; ?>