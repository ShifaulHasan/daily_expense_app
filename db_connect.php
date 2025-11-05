<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "daily_expense_db";

$conn = mysqli_connect($server, $user, $pass, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
session_start();
?>
