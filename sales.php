<?php

include 'db.php';

$phones = mysqli_query(
$conn,
"SELECT * FROM phones"
);

$customers = mysqli_query(
$conn,
"SELECT * FROM customers"
);

include 'includes/header.php';

?>

<h1>💰 Make Sale</h1>

<br>

<div class="card">

<form action="process_sale.php" method="POST">

<p><strong>Customer</strong></p>

<select name="customer_id" required>

<?php

while($customer=mysqli_fetch_assoc($customers)){

?>

<option value="<?php echo $customer['id']; ?>">

<?php echo $customer['customer_name']; ?>

</option>

<?php } ?>

</select>

<br><br>

<p><strong>Phone</strong></p>

<select
name="phone_id"
id="phone_id"
required
onchange="loadIMEIs()">

<option value="">
Select Phone
</option>

<?php

while($phone=mysqli_fetch_assoc($phones)){

?>

<option value="<?php echo $phone['id']; ?>">

<?php echo $phone['brand']; ?>
<?php echo " "; ?>
<?php echo $phone['model']; ?>

</option>

<?php } ?>

</select>

<br><br>

<p><strong>IMEI</strong></p>

<select
name="imei_id"
id="imei_id"
required>

<option value="">
Select Phone First
</option>

</select>

<br><br>

<p><strong>Quantity</strong></p>

<input
type="number"
name="quantity"
value="1"
min="1"
required>

<br><br>

<button type="submit">

💰 Complete Sale

</button>

</form>

</div>

<script>

function loadIMEIs(){

    var phoneId =
    document.getElementById(
    "phone_id"
    ).value;

    var xhr =
    new XMLHttpRequest();

    xhr.onreadystatechange =
    function(){

        if(
        this.readyState == 4
        &&
        this.status == 200
        ){

            document.getElementById(
            "imei_id"
            ).innerHTML =
            this.responseText;

        }

    };

    xhr.open(

    "GET",

    "get_imeis.php?phone_id="
    +
    phoneId,

    true

    );

    xhr.send();

}

</script>

<?php include 'includes/footer.php'; ?>