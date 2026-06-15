<?php

include 'db.php';

$phone_id = mysqli_real_escape_string($conn, $_POST['phone_id']);
$imei = trim(mysqli_real_escape_string($conn, $_POST['imei']));

/*
|--------------------------------------------------------------------------
| CHECK IF IMEI ALREADY EXISTS
|--------------------------------------------------------------------------
*/

$check = mysqli_query(
    $conn,
    "SELECT id FROM phone_imei WHERE imei='$imei'"
);

if(mysqli_num_rows($check) > 0)
{
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>
        <title>Duplicate IMEI</title>

        <style>
            body{
                font-family: Arial, sans-serif;
                background:#f5f7fa;
                padding:50px;
            }

            .message{
                max-width:500px;
                margin:auto;
                background:#fff;
                padding:30px;
                border-radius:10px;
                box-shadow:0 2px 10px rgba(0,0,0,0.1);
                text-align:center;
            }

            .error{
                color:#dc3545;
                font-size:20px;
                font-weight:bold;
                margin-bottom:15px;
            }

            .btn{
                display:inline-block;
                margin-top:20px;
                padding:10px 20px;
                background:#198754;
                color:white;
                text-decoration:none;
                border-radius:5px;
            }
        </style>

    </head>
    <body>

        <div class="message">

            <div class="error">
                ⚠ IMEI Already Exists
            </div>

            <p>
                The IMEI:
                <strong><?php echo htmlspecialchars($imei); ?></strong>
                is already registered in the inventory.
            </p>

            <a href="add_imei.php" class="btn">
                ← Back
            </a>

        </div>

    </body>
    </html>

    <?php
    exit();
}

/*
|--------------------------------------------------------------------------
| SAVE IMEI
|--------------------------------------------------------------------------
*/

$sql = mysqli_query(
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

if($sql)
{
    header("Location: view_imei.php");
    exit();
}
else
{
    echo "Error: " . mysqli_error($conn);
}

?>