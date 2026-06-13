<?php

include 'db.php';

if(!isset($_GET['phone_id'])){

    echo "<option value=''>Select Phone First</option>";

    exit();

}

$phone_id = $_GET['phone_id'];

$result = mysqli_query(

$conn,

"SELECT

id,
imei

FROM phone_imei

WHERE phone_id='$phone_id'

AND status='In Stock'

ORDER BY imei ASC"

);

if(mysqli_num_rows($result) == 0){

    echo "<option value=''>No IMEIs Available</option>";

}else{

    echo "<option value=''>Select IMEI</option>";

    while($row = mysqli_fetch_assoc($result)){

        echo "<option value='".$row['id']."'>";

        echo $row['imei'];

        echo "</option>";

    }

}

?>