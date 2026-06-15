<?php

include 'check_login.php';
include 'db.php';

$phones = mysqli_query(
$conn,
"SELECT * FROM phones
ORDER BY brand, model"
);

include 'includes/header.php';

?>

<h1>➕ Add IMEI</h1>

<br>

<div class="card">

<form action="save_imei.php" method="POST">

<p><strong>Select Phone</strong></p>

<select name="phone_id" required>

<option value="">
Select Phone
</option>

<?php while($phone=mysqli_fetch_assoc($phones)){ ?>

<option value="<?php echo $phone['id']; ?>">

<?php echo $phone['brand']; ?>

<?php echo " "; ?>

<?php echo $phone['model']; ?>

</option>

<?php } ?>

</select>

<br><br>

<p><strong>IMEI</strong></p>

<input
type="text"
name="imei"
required>

<br><br>

<button type="submit">

💾 Save IMEI

</button>

</form>

</div>

<?php include 'includes/footer.php'; ?>
