<?php

include 'check_login.php';
include 'db.php';

$id = $_GET['id'];

mysqli_query(

$conn,

"DELETE FROM customers

WHERE id='$id'"

);

header("Location:view_customers.php");

exit();

?>