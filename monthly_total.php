<?php
include 'db.php';

if (isset($_POST['month'])) {
    $month = $_POST['month'];
    $year = $_POST['year'];

    $query = "SELECT SUM(amount) AS total_expense 
              FROM expenses 
              WHERE MONTH(date) = '$month' AND YEAR(date) = '$year'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $total = $row['total_expense'] ?? 0;
} else {
    $month = date('m');
    $year = date('Y');
    $query = "SELECT SUM(amount) AS total_expense 
              FROM expenses 
              WHERE MONTH(date) = MONTH(CURRENT_DATE()) 
              AND YEAR(date) = YEAR(CURRENT_DATE())";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $total = $row['total_expense'] ?? 0;
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <title>Monthly espense</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h1>Monthly Total Expense</h1>

    <form method="POST">
      <label>Select a Month:</label>
      <select name="month" required>
        <option value="1">January</option>
    <option value="2">February</option>
        <option value="3">march</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">july</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select>

      <label>Select a year:</label>
      <select name="year" required>
        <?php
        for ($i = 2020; $i <= date('Y'); $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>

      <button type="submit">show</button>
    </form>

    <div class="result">
      <h2><?php echo $year; ?> year
      <?php echo date("F", mktime(0, 0, 0, $month, 1)); ?>monthly total cost:</h2>
      <p><strong><?php echo $total; ?> Tk</strong></p>
    </div>

    <a href="index.php" class="btn">Back home</a>
  </div>
</body>
</html>
