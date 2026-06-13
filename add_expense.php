<?php

include 'check_login.php';

include 'includes/header.php';

?>

<h1>💸 Add Expense</h1>

<br>

<div class="card">

<form action="save_expense.php" method="POST">

<p><strong>Expense Name</strong></p>

<input
type="text"
name="expense_name"
placeholder="Rent, Electricity, Internet..."
required>

<br><br>

<p><strong>Amount (UGX)</strong></p>

<input
type="number"
name="amount"
required>

<br><br>

<button type="submit">

💾 Save Expense

</button>

</form>

</div>

<?php include 'includes/footer.php'; ?>