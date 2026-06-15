<?php

include 'db.php';

/*
|--------------------------------------------------------------------------
| GET FORM DATA
|--------------------------------------------------------------------------
*/

$phone_id = mysqli_real_escape_string(
$conn,
$_POST['phone_id']
);

$customer_id = mysqli_real_escape_string(
$conn,
$_POST['customer_id']
);

$imei_id = mysqli_real_escape_string(
$conn,
$_POST['imei_id']
);

$actual_price = mysqli_real_escape_string(
$conn,
$_POST['actual_price']
);

$quantity = 1;

/*
|--------------------------------------------------------------------------
| GET PHONE DETAILS
|--------------------------------------------------------------------------
*/

$phone_result = mysqli_query(

$conn,

"SELECT *

FROM phones

WHERE id='$phone_id'"

);

$phone = mysqli_fetch_assoc(
$phone_result
);

if(!$phone){

    die("Phone not found.");

}

/*
|--------------------------------------------------------------------------
| CHECK STOCK
|--------------------------------------------------------------------------
*/

if($phone['quantity'] < 1){

    die("This phone is out of stock.");

}

/*
|--------------------------------------------------------------------------
| CHECK IMEI EXISTS
|--------------------------------------------------------------------------
*/

$imei_result = mysqli_query(

$conn,

"SELECT *

FROM phone_imei

WHERE id='$imei_id'

AND status='In Stock'"

);

if(mysqli_num_rows($imei_result) == 0){

    die("Selected IMEI is not available.");

}

$imei_data = mysqli_fetch_assoc(
$imei_result
);

/*
|--------------------------------------------------------------------------
| CALCULATIONS
|--------------------------------------------------------------------------
*/

$total =
$actual_price
*
$quantity;

$profit =

(
$actual_price
-
$phone['buying_price']
)

*
$quantity;

$new_stock =
$phone['quantity']
-
$quantity;

/*
|--------------------------------------------------------------------------
| SAVE SALE
|--------------------------------------------------------------------------
*/

$sale = mysqli_query(

$conn,

"INSERT INTO sales

(
customer_id,
phone_id,
quantity,
sale_price,
total,
profit
)

VALUES

(
'$customer_id',
'$phone_id',
'$quantity',
'$actual_price',
'$total',
'$profit'
)"

);

if(!$sale){

    die(
    "Sale Error: "
    .
    mysqli_error($conn)
    );

}

/*
|--------------------------------------------------------------------------
| GET SALE ID
|--------------------------------------------------------------------------
*/

$sale_id = mysqli_insert_id(
$conn
);

/*
|--------------------------------------------------------------------------
| UPDATE PHONE STOCK
|--------------------------------------------------------------------------
*/

mysqli_query(

$conn,

"UPDATE phones

SET quantity='$new_stock'

WHERE id='$phone_id'"

);

/*
|--------------------------------------------------------------------------
| MARK IMEI AS SOLD
|--------------------------------------------------------------------------
*/

mysqli_query(

$conn,

"UPDATE phone_imei

SET

status='Sold',

customer_id='$customer_id',

sale_id='$sale_id'

WHERE id='$imei_id'"

);

/*
|--------------------------------------------------------------------------
| REDIRECT TO RECEIPT
|--------------------------------------------------------------------------
*/

header(

"Location: receipt.php?id="

.

$sale_id

);

exit();

?>
