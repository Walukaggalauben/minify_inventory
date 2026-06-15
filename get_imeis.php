<?php

include 'db.php';

/*
|--------------------------------------------------------------------------
| CHECK PHONE ID
|--------------------------------------------------------------------------
*/

if(!isset($_GET['phone_id']) || empty($_GET['phone_id']))
{
    echo "<option value=''>Select Phone First</option>";
    exit();
}

$phone_id = mysqli_real_escape_string(
    $conn,
    $_GET['phone_id']
);

/*
|--------------------------------------------------------------------------
| LOAD ONLY AVAILABLE IMEIs
|--------------------------------------------------------------------------
*/

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

/*
|--------------------------------------------------------------------------
| DISPLAY RESULTS
|--------------------------------------------------------------------------
*/

if(mysqli_num_rows($result) == 0)
{
    echo "<option value=''>No IMEIs Available</option>";
}
else
{
    echo "<option value=''>Select IMEI</option>";

    while($row = mysqli_fetch_assoc($result))
    {
        echo "<option value='".$row['id']."'>";
        echo htmlspecialchars($row['imei']);
        echo "</option>";
    }
}

?>
