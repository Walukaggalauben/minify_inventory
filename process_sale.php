<?php

include 'db.php';

$phone_id = $_POST['phone_id'];
$customer_id = $_POST['customer_id'];
$imei_id = $_POST['imei_id'];
$quantity = $_POST['quantity'];

$phone = mysqli_fetch_assoc(

mysqli_query(
$conn,
"SELECT * FROM phones
WHERE id='$phone_id'"
)

);

$total =
$phone['selling_price']
*
$quantity;

$profit =

(
$phone['selling_price']
-
$phone['buying_price']
)

*
$quantity;

$new_stock =
$phone['quantity']
-
$quantity;

mysqli_query(

$conn,

"INSERT INTO sales
(customer_id,phone_id,quantity,total,profit)

VALUES
(
'$customer_id',
'$phone_id',
'$quantity',
'$total',
'$profit'
)"

);

$sale_id = mysqli_insert_id($conn);

mysqli_query(

$conn,

"UPDATE phones

SET quantity='$new_stock'

WHERE id='$phone_id'"

);

mysqli_query(

$conn,

"UPDATE phone_imei

SET
status='Sold',
customer_id='$customer_id',
sale_id='$sale_id'

WHERE id='$imei_id'"

);

header("Location:sales_history.php");

exit();

?>