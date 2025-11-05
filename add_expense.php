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
<title>Add Expense</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Add new Expense</h2>

<form method="POST">
  <input type="number" name="amount" placeholder="add Amount" step="0.01" required>
  <input type="text" name="category" placeholder="Category" required>
  <textarea name="note" placeholder="optional(note)"></textarea>
  <input type="date" name="expense_date" required>
  <button type="submit" name="submit">Save</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $note = $_POST['note'];
    $date = $_POST['expense_date'];

    $q = "INSERT INTO expenses (user_id, amount, category, note, expense_date) 
          VALUES ('$user_id','$amount','$category','$note','$date')";
    if (mysqli_query($conn, $q)) {
        echo "<p class='msg' style='color:green;'>Expense Added!</p>";
    } else {
        echo "<p class='msg' style='color:red;'>error: " . mysqli_error($conn) . "</p>";
    }
}
?>
<a href="dashboard.php">Back</a>
</div>
</body>
</html>
