<?php
include('db_connect.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<title>Expense List</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="table-container">
<h2>Expense List</h2>
<table>
<tr><th>date</th><th>amount</th><th>category</th><th>note</th><th>Action</th></tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM expenses WHERE user_id='$user_id' ORDER BY expense_date DESC");
$total = 0;

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['expense_date']}</td>
    <td>৳{$row['amount']}</td>
    <td>{$row['category']}</td>
    <td>{$row['note']}</td>
    <td>
      <a class='btn' href='edit_expense.php?id={$row['id']}'>Edit</a> <br>
      <a class='btn' href='delete_expense.php?id={$row['id']}'>Delete</a> <br>
    </td>
    </tr>";
    $total += $row['amount'];
}
?>
</table>
<h3>Total Cost: ৳<?= number_format($total, 2) ?></h3>
<a href="dashboard.php">⬅ Back</a>
</div>
</body>
</html>
