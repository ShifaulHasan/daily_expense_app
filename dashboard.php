<?php 
include("db_connect.php");
if(!isset($_SESSION["user_id"])){
    header("Location: login.php");
    exit;
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome! to your Dashboard</h1>
        <a class="btn" href="add_expense.php">Add your Expense</a> <br>
        <a class="btn" href="view_expense.php">see your Expense</a> <br>
        <a class="btn" href="logout.php">Logout</a>
        
    </div>
</body>
</html>