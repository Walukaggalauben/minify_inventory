<?php

include 'check_login.php';
include 'db.php';

$id = $_GET['id'];

$customer = mysqli_fetch_assoc(

mysqli_query(
$conn,
"SELECT * FROM customers
WHERE id='$id'"
)

);

include 'includes/header.php';

?>

<h1>✏ Edit Customer</h1>

<br>

<div class="card">

<form action="update_customer.php" method="POST">

<input
type="hidden"
name="id"
value="<?php echo $customer['id']; ?>">

<p><strong>Customer Name</strong></p>

<input
type="text"
name="customer_name"
value="<?php echo $customer['customer_name']; ?>"
required>

<br><br>

<p><strong>Phone Number</strong></p>

<input
type="text"
name="phone"
value="<?php echo $customer['phone']; ?>"
required>

<br><br>

<button type="submit">

💾 Update Customer

</button>

</form>

</div>

<?php include 'includes/footer.php'; ?>