<?php

include 'check_login.php';

include 'db.php';

$phones = mysqli_query(
$conn,
"SELECT * FROM phones ORDER BY brand ASC"
);

include 'includes/header.php';

?>

<h1>📦 Receive Stock</h1>

<br>

<div class="card">

<form action="process_stock.php" method="POST">

<p><strong>Select Phone</strong></p>

<select name="phone_id" required>

<option value="">-- Select Phone --</option>

<?php while($phone=mysqli_fetch_assoc($phones)){ ?>

<option value="<?php echo $phone['id']; ?>">

<?php echo $phone['brand']; ?>
<?php echo " "; ?>
<?php echo $phone['model']; ?>

</option>

<?php } ?>

</select>

<br><br>

<p><strong>Quantity Received</strong></p>

<input
type="number"
name="quantity_received"
min="1"
required>

<br><br>

<p><strong>IMEIs (One Per Line)</strong></p>

<textarea
name="imeis"
rows="8"
placeholder="356789123456789
356789123456780
356789123456781"></textarea>

<br><br>

<button type="submit">

📦 Receive Stock

</button>

</form>

</div>

<?php include 'includes/footer.php'; ?>