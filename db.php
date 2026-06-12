<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "minify_inventory"
);

if(!$conn){
    die("Database Connection Failed");
}

?>