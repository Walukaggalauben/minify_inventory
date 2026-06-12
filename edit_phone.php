<?php

include 'db.php';

$id = $_GET['id'];

$result = mysqli_query(
$conn,
"SELECT * FROM phones WHERE id=$id"
);

$row = mysqli_fetch_assoc($result);

?>

<h2>Edit Phone</h2>

<form action="update_phone.php" method="POST">

<input type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

Brand:<br>
<input type="text"
name="brand"
value="<?php echo $row['brand']; ?>">
<br><br>

Model:<br>
<input type="text"
name="model"
value="<?php echo $row['model']; ?>">
<br><br>

Quantity:<br>
<input type="number"
name="quantity"
value="<?php echo $row['quantity']; ?>">
<br><br>

Selling Price:<br>
<input type="number"
name="selling_price"
value="<?php echo $row['selling_price']; ?>">
<br><br>

<button type="submit">
Update Phone
</button>

</form>