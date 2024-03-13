<?php
require_once('database.php');
session_start();

if (isset($_POST['masuk'])) {
    $nis = $_POST['nis'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $inputdata = "INSERT INTO users (nis, username, password) VALUES ('$nis', '$username', '$password')";

    if (inputdata($inputdata)) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location: login.php");
        exit();
    } else {
        header("location: signup.php?msg=gagal");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Signup</title>
    <link rel ="stylesheet" href ="style.css">
</head>
<style>
   
  </style>
<body>
    <div class="box">
        <form autocomplete="off" action="signup.php" method="POST">
            <h2>Sign up</h2>
            <div class="inputBox">
                <input type="text" name="nis" required="required" />
                <span>NIS</span>
                <i></i>
</div>

            <div class="inputBox">
                <input type="text" name="username" required="required" />
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required" />
                <span>Password</span>
                <i></i>
            </div>

        
            <input type="submit" name="masuk" value="Create Account" />
        </form>
    </div>
    
</body>
</html>
