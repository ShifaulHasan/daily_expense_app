<?php include("db_connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Please Log in</h2>
        <form method="POST">
  <input type="text" name="username" placeholder="Username" required> <br>
  <input type="password" name="password" placeholder="Password" required> <br>
  <button type="submit" name="login">Login</button>
</form>
<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
    } else {
        echo "<p class='msg' style='color:red;'>Wrong Username or Password!</p>";
    }
}
?>
<p>Need New Account? <a href="register.php">Register</a></p>




    </div>
    
</body>
</html>