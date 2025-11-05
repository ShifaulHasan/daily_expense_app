<?php
include('db_connect.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM expenses WHERE id='$id'");
header("Location: view_expense.php");
?>
