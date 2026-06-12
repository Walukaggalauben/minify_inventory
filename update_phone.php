<?php

include 'db.php';

$id = $_POST['id'];

mysqli_query(
$conn,

"UPDATE phones SET

brand='$_POST[brand]',
model='$_POST[model]',
quantity='$_POST[quantity]',
selling_price='$_POST[selling_price]'

WHERE id=$id"

);

header("Location:view_phones.php");

?>