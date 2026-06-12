<?php

include 'db.php';

$phone_id = $_POST['phone_id'];
$quantity = $_POST['quantity'];

$phone = mysqli_fetch_assoc(

mysqli_query(
$conn,
"SELECT * FROM phones
WHERE id=$phone_id"
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

INSERT INTO sales
(phone_id,quantity,total,profit)

VALUES
(
'$phone_id',
'$quantity',
'$total',
'$profit'
)
mysqli_query(

$conn,

"UPDATE phones

SET quantity='$new_stock'

WHERE id='$phone_id'"

);

header("Location:view_phones.php");

?>