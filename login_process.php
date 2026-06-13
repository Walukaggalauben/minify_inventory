<?php

session_start();

include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query(

$conn,

"SELECT * FROM users

WHERE username='$username'

AND password='$password'"

);

if(mysqli_num_rows($sql) > 0){

    $user = mysqli_fetch_assoc($sql);

    $_SESSION['user_id'] = $user['id'];

    $_SESSION['fullname'] = $user['fullname'];

    $_SESSION['username'] = $user['username'];

    header("Location: dashboard.php");

    exit();

}else{

    echo "Invalid Username or Password";

}

?>