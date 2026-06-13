<?php

include 'check_login.php';

include 'db.php';

$phone_id = $_POST['phone_id'];

$quantity_received = $_POST['quantity_received'];

$phone = mysqli_fetch_assoc(

mysqli_query(

$conn,

"SELECT *

FROM phones

WHERE id='$phone_id'"

)

);

$new_quantity =

$phone['quantity']

+

$quantity_received;

mysqli_query(

$conn,

"UPDATE phones

SET quantity='$new_quantity'

WHERE id='$phone_id'"

);

mysqli_query(

$conn,

"INSERT INTO stock_receiving

(
phone_id,
quantity_received
)

VALUES

(
'$phone_id',
'$quantity_received'
)"

);

$imeis = trim($_POST['imeis']);

if(!empty($imeis)){

    $imeiArray = explode("\n",$imeis);

    foreach($imeiArray as $imei){

        $imei = trim($imei);

        if($imei != ""){

            mysqli_query(

            $conn,

            "INSERT INTO phone_imei

            (
            phone_id,
            imei,
            status
            )

            VALUES

            (
            '$phone_id',
            '$imei',
            'In Stock'
            )"

            );

        }

    }

}

header("Location: stock_history.php");

exit();

?>