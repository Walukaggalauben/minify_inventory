<?php

include 'db.php';

$phones = mysqli_query(
$conn,
"SELECT * FROM phones"
);


$customers = mysqli_query(
$conn,
"SELECT * FROM customers"
);

?>



<h2>Sell Phone</h2>

<form action="process_sale.php" method="POST">

Customer:

<select name="customer_id">

<?php

while($customer=mysqli_fetch_assoc($customers)){

?>

<option value="<?php echo $customer['id']; ?>">

<?php echo $customer['customer_name']; ?>

</option>

<?php } ?>

</select>

<br><br>

Phone:

<select name="phone_id">

<?php

while($phone=mysqli_fetch_assoc($phones)){

?>

<option value="<?php echo $phone['id']; ?>">

<?php echo $phone['brand']; ?>
<?php echo $phone['model']; ?>

</option>

<?php } ?>

</select>

<br><br>

Quantity:

<input type="number"
name="quantity"
required>

<br><br>

<button type="submit">
Sell
</button>

</form>