<?php

include 'db.php';

$lowStock = mysqli_query(
$conn,
"SELECT * FROM phones
WHERE quantity <= 2"
);

$totalPhones = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) as total FROM phones")
);

$totalStock = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT SUM(quantity) as stock FROM phones")
);

$totalSales = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT SUM(total) as sales FROM sales")
);

$totalProfit = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT SUM(profit) as profit FROM sales")
);

?>
<!DOCTYPE html>
<html>
<head>
<title>MINIFY GADGETS Dashboard</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
    margin:0;
}

.header{
    background:#0f7b0f;
    color:white;
    padding:20px;
}

.container{
    display:flex;
    flex-wrap:wrap;
    padding:20px;
}

.card{
    background:white;
    width:250px;
    margin:10px;
    padding:20px;
    border-radius:10px;
    box-shadow:0 2px 8px rgba(0,0,0,.1);
}

.card h2{
    margin:0;
}

.menu{
    padding:20px;
}

a{
    text-decoration:none;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="header">
<h1>📱 MINIFY GADGETS</h1>
<h3>Inventory Dashboard</h3>
</div>

<div class="container">

<div class="card">
<h2><?php echo $totalPhones['total']; ?></h2>
<p>Total Phone Models</p>
</div>

<div class="card">
<h2><?php echo $totalStock['stock']; ?></h2>
<p>Total Stock Available</p>
</div>

<div class="card">
<h2>UGX <?php echo number_format($totalSales['sales']); ?></h2>
<p>Total Sales</p>
</div>

<div class="card">
<h2>UGX <?php echo number_format($totalProfit['profit']); ?></h2>
<p>Total Profit</p>
</div>

</div>

<div class="menu">

<p><a href="add_phone.php">➕ Add Phone</a></p>

<p><a href="view_phones.php">📦 View Inventory</a></p>

<p><a href="sales.php">💰 Sell Phone</a></p>

<p><a href="sales_history.php">📋 Sales History</a></p>

<p><a href="add_customer.php">👤 Add Customer</a></p>

<p><a href="view_customers.php">📋 View Customers</a></p>

</div>

<hr>

<h2>⚠ Low Stock Alerts</h2>

<?php

if(mysqli_num_rows($lowStock) > 0){

    while($phone = mysqli_fetch_assoc($lowStock)){

        echo "<p style='color:red;font-weight:bold;'>";

        echo $phone['brand']." ".
             $phone['model'].
             " only ".
             $phone['quantity'].
             " remaining";

        echo "</p>";
    }

}else{

    echo "<p style='color:green;'>All stock levels are healthy.</p>";

}

?>

</body>
</html>