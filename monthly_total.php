<?php
include 'db_connect.php';

if (isset($_POST['month'])) {
    $month = $_POST['month'];
    $year = $_POST['year'];

    
    $query = "SELECT SUM(amount) AS total_expense 
              FROM expenses 
              WHERE MONTH(expense_date) = '$month' 
              AND YEAR(expense_date) = '$year'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $total = $row['total_expense'] ?? 0;

} else {
    
    $month = date('m');
    $year = date('Y');

    $query = "SELECT SUM(amount) AS total_expense 
              FROM expenses 
              WHERE MONTH(expense_date) = MONTH(CURRENT_DATE()) 
              AND YEAR(expense_date) = YEAR(CURRENT_DATE())";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $total = $row['total_expense'] ?? 0;
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <title>Monthly Expense</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h1>Monthly Total Expense</h1>

    <form method="POST">
      <label>Select a Month:</label>
      <select name="month" required>
        <?php
        for ($m=1; $m<=12; $m++) {
            $selected = ($m == $month) ? "selected" : "";
            echo "<option value='$m' $selected>".date("F", mktime(0,0,0,$m,1))."</option>";
        }
        ?>
      </select>

      <label>Select a Year:</label>
      <select name="year" required>
        <?php
        for ($i = 2020; $i <= date('Y'); $i++) {
            $selected = ($i == $year) ? "selected" : "";
            echo "<option value='$i' $selected>$i</option>";
        }
        ?>
      </select>

      <button type="submit">Show</button>
    </form>

    <div class="result">
      <h2><?php echo $year; ?> year, <?php echo date("F", mktime(0, 0, 0, $month, 1)); ?> monthly total cost:</h2>
      <p><strong><?php echo $total; ?> Tk</strong></p>
    </div>

    <a href="index.php" class="btn">Back home</a>
  </div>
</body>
</html>
