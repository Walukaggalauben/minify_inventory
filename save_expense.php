<?php

include 'check_login.php';

include 'db.php';

$expense_name = mysqli_real_escape_string(
$conn,
$_POST['expense_name']
);

$amount = $_POST['amount'];

mysqli_query(

$conn,

"INSERT INTO expenses

(
expense_name,
amount
)

VALUES

(
'$expense_name',
'$amount'
)"

);

header("Location:view_expenses.php");

exit();

?>