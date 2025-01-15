<?php
    require_once "config/mysql.php" 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/sign_up.css"
</head>
<body>
    <div class="signup-container">
        <h2>Create Account</h2>
        <form method="POST" action="record.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button class="button" type="submit" value="Sign_up" name="ok">Register</button>
        </form>
        <div class="header_login">
            <p>Already a member ?  <a href="index.php">Login here</a> </p>
        </div>
    </div>
<script src='assets/index.js'></script>
</body>
</html>