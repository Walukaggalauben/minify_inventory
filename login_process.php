<?php

include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query(
$conn,
"SELECT * FROM users
WHERE username='$username'
AND password='$password'"
);

if(mysqli_num_rows($sql)>0){

    header("Location: dashboard.php");

}else{

    echo "Invalid Username or Password";

}

?>