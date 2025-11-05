<?php
include('db_connect.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM expenses WHERE id='$id'");
$exp = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<title>Edit Expense</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Edit Cost</h2>

<form method="POST">
  <input type="number" name="amount" value="<?= $exp['amount'] ?>" required>
  <input type="text" name="category" value="<?= $exp['category'] ?>">
  <textarea name="note"><?= $exp['note'] ?></textarea>
  <input type="date" name="expense_date" value="<?= $exp['expense_date'] ?>" required>
  <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    $a = $_POST['amount'];
    $c = $_POST['category'];
    $n = $_POST['note'];
    $d = $_POST['expense_date'];

    mysqli_query($conn, "UPDATE expenses SET amount='$a', category='$c', note='$n', expense_date='$d' WHERE id='$id'");
    header("Location: view_expense.php");
}
?>
<a href="view_expense.php">Back</a>
</div>
</body>
</html>
