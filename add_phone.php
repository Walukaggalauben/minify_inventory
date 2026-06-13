<?php

include 'includes/header.php';

?>

<h1>➕ Add New Phone</h1>

<br>

<div class="card">

<form action="save_phone.php" method="POST">

<p><strong>Brand</strong></p>
<input type="text" name="brand" required>

<br><br>

<p><strong>Model</strong></p>
<input type="text" name="model" required>

<br><br>

<p><strong>Color</strong></p>
<input type="text" name="color">

<br><br>

<p><strong>Storage</strong></p>
<input type="text" name="storage">

<br><br>

<p><strong>RAM</strong></p>
<input type="text" name="ram">

<br><br>

<p><strong>Buying Price (UGX)</strong></p>
<input type="number" name="buying_price" required>

<br><br>

<p><strong>Selling Price (UGX)</strong></p>
<input type="number" name="selling_price" required>

<br><br>

<p><strong>Quantity</strong></p>
<input type="number" name="quantity" required>

<br><br>

<p><strong>IMEIs (One Per Line)</strong></p>

<textarea
name="imeis"
rows="8"
placeholder="356789123456789
356789123456780
356789123456781"></textarea>

<br><br>

<button type="submit">
💾 Save Phone
</button>

</form>

</div>

<?php include 'includes/footer.php'; ?>