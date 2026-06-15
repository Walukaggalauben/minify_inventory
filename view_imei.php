<?php

include 'check_login.php';
include 'db.php';

$search = "";

if(isset($_GET['search'])){

    $search = $_GET['search'];

    $result = mysqli_query(

    $conn,

    "SELECT

    phone_imei.id,
    phones.brand,
    phones.model,
    phone_imei.imei,
    phone_imei.status

    FROM phone_imei

    JOIN phones
    ON phone_imei.phone_id = phones.id

    WHERE phone_imei.imei LIKE '%$search%'

    ORDER BY phone_imei.id DESC"

    );

}else{

    $result = mysqli_query(

    $conn,

    "SELECT

    phone_imei.id,
    phones.brand,
    phones.model,
    phone_imei.imei,
    phone_imei.status

    FROM phone_imei

    JOIN phones
    ON phone_imei.phone_id = phones.id

    ORDER BY phone_imei.id DESC"

    );

}

include 'includes/header.php';

?>

<h1>📱 IMEI Inventory</h1>

<br>

<a href="add_imei.php">

<button>

➕ Add IMEI

</button>

</a>

<br><br>

<div class="card">

<form method="GET">

<input
type="text"
name="search"
placeholder="Search IMEI..."
value="<?php echo $search; ?>">

<br><br>

<button type="submit">

🔍 Search IMEI

</button>

</form>

</div>

<br>

<div class="card">

<table>

<tr>

<th>ID</th>
<th>Brand</th>
<th>Model</th>
<th>IMEI</th>
<th>Status</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['brand']; ?></td>

<td><?php echo $row['model']; ?></td>

<td><?php echo $row['imei']; ?></td>

<td>

<?php

if($row['status'] == 'Sold'){

echo "<span style='color:red;font-weight:bold;'>🔴 Sold</span>";

}else{

echo "<span style='color:green;font-weight:bold;'>🟢 In Stock</span>";

}

?>

</td>

</tr>

<?php } ?>

</table>

</div>

<?php include 'includes/footer.php'; ?>
