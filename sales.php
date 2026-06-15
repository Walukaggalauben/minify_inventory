<?php

include 'db.php';

$phones = mysqli_query(
$conn,
"SELECT * FROM phones ORDER BY brand, model"
);

$customers = mysqli_query(
$conn,
"SELECT * FROM customers ORDER BY customer_name"
);

include 'includes/header.php';

?>

<h1>💰 Make Sale</h1>

<br>

<div class="card">

<form action="process_sale.php" method="POST">

<p><strong>Customer</strong></p>

<select name="customer_id" required>

<option value="">
Select Customer
</option>

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

mysqli_data_seek($phones,0);

while($phone=mysqli_fetch_assoc($phones)){

?>

<option
value="<?php echo $phone['id']; ?>"
data-price="<?php echo $phone['selling_price']; ?>">

<?php echo $phone['brand']; ?>

<?php echo " "; ?>

<?php echo $phone['model']; ?>

(UGX <?php echo number_format($phone['selling_price']); ?>)

</option>

<?php } ?>

</select>

<br><br>

<p><strong>Actual Sale Price (UGX)</strong></p>

<input
type="number"
name="actual_price"
id="actual_price"
required>

<small>
You may sell above or below the system price.
</small>

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

<input
type="hidden"
name="quantity"
value="1">

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

    var selectedOption =
    document.getElementById(
    "phone_id"
    ).selectedOptions[0];

    if(selectedOption)
    {
        var price =
        selectedOption.getAttribute(
        "data-price"
        );

        document.getElementById(
        "actual_price"
        ).value = price;
    }

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
