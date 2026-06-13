<?php

include 'check_login.php';

include 'db.php';

$result = mysqli_query(
$conn,
"SELECT * FROM expenses
ORDER BY id DESC"
);

include 'includes/header.php';

?>

<h1>💸 Expenses</h1>

<br>

<div class="card">

<table>

<tr>

<th>ID</th>
<th>Expense</th>
<th>Amount</th>
<th>Date</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['expense_name']; ?></td>

<td>
UGX <?php echo number_format($row['amount']); ?>
</td>

<td><?php echo $row['expense_date']; ?></td>

</tr>

<?php } ?>

</table>

</div>

<?php include 'includes/footer.php'; ?>