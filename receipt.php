<?php

include 'db.php';

$sale_id = $_GET['id'];

$result = mysqli_query(

$conn,

"SELECT
sales.*,
phones.brand,
phones.model,
customers.customer_name

FROM sales

JOIN phones
ON sales.phone_id = phones.id

JOIN customers
ON sales.customer_id = customers.id

WHERE sales.id = $sale_id"

);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>

<title>Receipt</title>

<style>

body{
    font-family:Arial;
    width:400px;
    margin:auto;
}

.receipt{
    border:1px solid black;
    padding:20px;
}

button{
    padding:10px;
}

</style>

</head>

<body>

<div class="receipt">

<center>

<h2>MINIFY GADGETS</h2>

<p>Phone Inventory & Sales System</p>

<hr>

</center>

<p>
<b>Customer:</b>
<?php echo $row['customer_name']; ?>
</p>

<p>
<b>Phone:</b>
<?php echo $row['brand']; ?>
<?php echo $row['model']; ?>
</p>

<p>
<b>Quantity:</b>
<?php echo $row['quantity']; ?>
</p>

<p>
<b>Total:</b>
UGX <?php echo number_format($row['total']); ?>
</p>

<p>
<b>Date:</b>
<?php echo $row['sale_date']; ?>
</p>

<hr>

<center>

<h3>Thank You For Shopping</h3>

<p>MINIFY GADGETS</p>

</center>

</div>

<br>

<button onclick="window.print()">
Print Receipt
</button>

</body>
</html>