<?php
session_start();
// Kiểm tra nếu user đã đăng nhập thì redirect đến trang search
if (isset($_SESSION['username'])) {
  header('Location: search.php');
}

// Kiểm tra form đăng nhập được submit
if (isset($_POST['login'])) {
  require('config.php');
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // Kiểm tra thông tin đăng nhập có chính xác hay không
  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username;
    header('Location: search.php');
  } else {
    $error_msg = 'Tên đăng nhập hoặc mật khẩu không đúng!';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Đăng nhập</title>
</head>
<body>
  <h1>Đăng nhập</h1>
  <?php if (isset($error_msg)) echo "<p>$error_msg</p>"; ?>
  <form method="POST" action="">
    <label>Tên đăng nhập:</label>
    <input type="text" name="username" required>
    <br>
    <label>Mật khẩu:</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" name="login" value="Đăng nhập">
  </form>
</body>
</html>
