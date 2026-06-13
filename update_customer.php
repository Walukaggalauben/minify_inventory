<?php

include 'check_login.php';
include 'db.php';

$id = $_POST['id'];

$customer_name = mysqli_real_escape_string(
$conn,
$_POST['customer_name']
);

$phone = mysqli_real_escape_string(
$conn,
$_POST['phone']
);

mysqli_query(

$conn,

"UPDATE customers

SET

customer_name='$customer_name',
phone='$phone'

WHERE id='$id'"

);

header("Location:view_customers.php");

exit();

?>