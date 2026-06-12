<?php
include 'db.php';
?>

<h2>Add Customer</h2>

<form action="save_customer.php" method="POST">

Name:<br>
<input type="text" name="customer_name"><br><br>

Phone Number:<br>
<input type="text" name="phone"><br><br>

<button type="submit">
Save Customer
</button>

</form>