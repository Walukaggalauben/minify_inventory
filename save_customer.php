<?php

include 'db.php';

mysqli_query(

$conn,

"INSERT INTO customers
(customer_name, phone)

VALUES

(
'$_POST[customer_name]',
'$_POST[phone]'
)"

);

header("Location:view_customers.php");

?>