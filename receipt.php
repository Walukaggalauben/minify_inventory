<?php

include 'db.php';

$sale_id = $_GET['id'];

$result = mysqli_query(

$conn,

"SELECT
sales.*,
phones.brand,
phones.model,
phones.selling_price,
customers.customer_name,
customers.phone

FROM sales

JOIN phones
ON sales.phone_id = phones.id

JOIN customers
ON sales.customer_id = customers.id

WHERE sales.id = '$sale_id'"

);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<title>MINIFY GADGETS Receipt</title>

<style>

body{
    font-family:Arial, sans-serif;
    background:#f5f5f5;
    padding:20px;
}

.receipt{

    width:700px;
    margin:auto;
    background:white;
    padding:25px;
    border:2px solid #00695C;

}

.header{
    text-align:center;
}

.header h1{
    color:#00695C;
    margin-bottom:5px;
}

.header h3{
    margin-bottom:10px;
}

.info{
    margin-top:15px;
    margin-bottom:15px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
}

table th{
    background:#00695C;
    color:white;
    padding:10px;
}

table td{
    border:1px solid #ddd;
    padding:10px;
}

.total{
    text-align:right;
    margin-top:15px;
    font-size:20px;
    font-weight:bold;
}

.signature{
    margin-top:60px;
    display:flex;
    justify-content:space-between;
}

button{
    background:#00695C;
    color:white;
    border:none;
    padding:12px 20px;
    cursor:pointer;
    margin-top:20px;
}

@media print{

    button{
        display:none;
    }

    body{
        background:white;
    }

}

</style>

</head>

<body>

<div class="receipt">

<div class="header">

<h1>MINIFY GADGETS</h1>

<h3>AND PHONE ACCESSORIES</h3>

<p>
0765 062 613 /
0787 808 501
</p>

<p>
Location: Pioneer Mall PA41
</p>

<h2>RECEIPT</h2>

</div>

<hr>

<div class="info">

<p>
<b>Receipt No:</b>
<?php echo $row['id']; ?>
</p>

<p>
<b>Date:</b>
<?php echo date("d/m/Y",strtotime($row['sale_date'])); ?>
</p>

<p>
<b>Customer:</b>
<?php echo $row['customer_name']; ?>
</p>

<p>
<b>Client Contact:</b>
<?php echo $row['phone']; ?>
</p>

</div>

<table>

<tr>

<th>Quantity</th>

<th>Description</th>

<th>Rate</th>

<th>Amount</th>

</tr>

<tr>

<td>
<?php echo $row['quantity']; ?>
</td>

<td>
<?php echo $row['brand']; ?>
<?php echo " "; ?>
<?php echo $row['model']; ?>
</td>

<td>
UGX <?php echo number_format($row['selling_price']); ?>
</td>

<td>
UGX <?php echo number_format($row['total']); ?>
</td>

</tr>

</table>

<div class="total">

TOTAL:
UGX <?php echo number_format($row['total']); ?>

</div>

<br><br>

<p>

<b>Amount in Words:</b>

_________________________________________

</p>

<div class="signature">

<div>

Customer Signature

<br><br>

____________________

</div>

<div>

Authorized Signature

<br><br>

____________________

</div>

</div>

<br>

<center>

<p>

Thank you for shopping with MINIFY GADGETS

</p>

<button onclick="window.print()">

🖨 Print Receipt

</button>

</center>

</div>

</body>

</html>