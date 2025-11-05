<?php include("db_connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Create a Account</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required> <br> 
              <input type="password" name="password" placeholder="Password" required> <br>
               <button type="submit" name="register">Register</button>
        </form>
        <?php 
        if(isset($_POST["register"])){
            $username=$_POST["username"];
            $password=password_hash($_POST["password"],PASSWORD_BCRYPT);
             $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
        echo "<p class='msg' style='color:red;'>এই নামটি ইতিমধ্যেই আছে!</p>";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "<p class='msg' style='color:green;'>Registration Complete</p>";
        }
    }
}
?>
     <p>Do you have already an account? <a href="login.php">Login</a></p>   
    </div>
    
</body>
</html>

