<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <div class="logo-icon">
                <i class="fas fa-laptop-code"></i>
            </div>
            <!-- <h1>Login</h1> -->
        </div>

        <form class="login-form" action="proses_login.php" method="POST">
            <div class="input-group">
                <label for="email">Username</label>
                <input type="text" name="username" placeholder="Enter your Username" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="forgot-password">
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="login-button">Sign In</button>

            <!-- <div class="signup-link">
                Belum memiliki akun? <a href="#">Sign up</a>
            </div> -->
        </form>
    </div>
</body>
</html>