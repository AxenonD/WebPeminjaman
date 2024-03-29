<?php
require_once('database.php');
session_start();

if (isset($_POST['masuk'])) {
    $login_result = cek_login($_POST['username'], $_POST['password']);

    if ($login_result) {
        $_SESSION['username'] = $login_result['username'];
        $_SESSION['status'] = "login";


        $_SESSION['role'] = $login_result['role'];

        $user_data = get_user_data($_SESSION['username']);

        if ($user_data) {
            $_SESSION['user_data'] = $user_data;
        } else {
            echo "Error: User data retrieval failed.";
            exit();
        }

        if ($_SESSION['role'] == "admin") {
            header("location: admin.php");
        } else {
            header("location: index.php");
        }
    } else {
        header("location: login.php?msg=gagal");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel ="stylesheet" href ="style.css">
    <title>Login</title>
  </head>
  <body>
    <div class="box">
      <form autocomplete="off" action="" method="POST">
        <h2>Login</h2>
        <div class="inputBox">
          <input type="text" name="username" required="required" />
          <span>Username</span>
        </div>
        <div class="inputBox">
          <input type="password" name="password" required="required" />
          <span>Password</span>
        </div>

        <div class="links">
          <a href="signup.php">buat akun? Sign up.</a>
        </div>
        <input type="submit" name="masuk" value="Login" />
      </form>
    </div>
  </body>
</html>
