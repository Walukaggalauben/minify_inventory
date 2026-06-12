<?php

include 'db.php';

$id = $_GET['id'];

mysqli_query(
$conn,
"DELETE FROM phones WHERE id=$id"
);

header("Location:view_phones.php");

?>