<?php
session_start();
// Kiểm tra nếu user đã đăng nhập thì redirect đến trang search
if (isset($_SESSION['username'])) {
  header('Location: search.php');
}

// Kiểm tra form đăng ký được submit
if (isset($_POST['register'])) {
  require('config.php');
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  // Thêm user vào bảng users
  $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
  mysqli_query($conn, $query);

  // Lưu thông tin user và redirect đến trang search
  $_SESSION['username'] = $username;
  header('Location: search.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Đăng ký</title>
</head>
<body>
  <h1>Đăng ký</h1>
  <form method="POST" action="">
    <label>Tên đăng nhập:</label>
    <input type="text" name="username" required>
    <br>
    <label>Mật khẩu:</label>
    <input type="password" name="password" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <input type="submit" name="register" value="Đăng ký">
  </form>
</body>
</html>
