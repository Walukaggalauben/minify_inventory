<?php

include 'check_login.php';

include 'db.php';

$search = "";

if(isset($_GET['search'])){

    $search = mysqli_real_escape_string(
    $conn,
    $_GET['search']
    );

    $result = mysqli_query(

    $conn,

    "SELECT *

    FROM customers

    WHERE customer_name LIKE '%$search%'

    OR phone LIKE '%$search%'

    ORDER BY id DESC"

    );

}else{

    $result = mysqli_query(

    $conn,

    "SELECT *

    FROM customers

    ORDER BY id DESC"

    );

}

$totalCustomers = mysqli_num_rows($result);

include 'includes/header.php';

?>

<h1>👥 Customers</h1>

<br>

<div class="card">

    <h2>Customer Management</h2>

    <br>

    <p>
        <strong>Total Customers:</strong>
        <?php echo $totalCustomers; ?>
    </p>

    <br>

    <p>
        <a href="add_customer.php">
            ➕ Add New Customer
        </a>
    </p>

</div>

<br>

<div class="card">

<form method="GET">

<input
type="text"
name="search"
placeholder="Search customer name or phone..."
value="<?php echo $search; ?>">

<br><br>

<button type="submit">

🔍 Search Customer

</button>

</form>

</div>

<br>

<div class="card">

<table>

<tr>

<th>ID</th>
<th>Customer Name</th>
<th>Phone Number</th>
<th>Actions</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['customer_name']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td>

<a href="edit_customer.php?id=<?php echo $row['id']; ?>">

✏ Edit

</a>

|

<a
href="delete_customer.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this customer?')">

🗑 Delete

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<?php include 'includes/footer.php'; ?>