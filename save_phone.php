<?php

include 'db.php';

$sql = "INSERT INTO phones
(
brand,
model,
color,
storage,
ram,
buying_price,
selling_price,
quantity,
imei
)

VALUES

(
'$_POST[brand]',
'$_POST[model]',
'$_POST[color]',
'$_POST[storage]',
'$_POST[ram]',
'$_POST[buying_price]',
'$_POST[selling_price]',
'$_POST[quantity]',
'$_POST[imei]'
)";

mysqli_query($conn,$sql);

header("Location:view_phones.php");

?>