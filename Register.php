<?php
   $dbhost = 'localhost';
   $dbuser = 'root'; // tên người dùng của bạn
   $dbpass = ''; // mật khẩu của bạn
   $dbname = 'my_database';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
   if(! $conn ) {
      die('Không thể kết nối: ' . mysqli_error());
   }
   
   if(isset($_POST['submit'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $id = $_POST['id'];
      $email = $_POST['email'];
      
      // Kiểm tra username đã tồn tại chưa
  $sql = "SELECT * FROM User WHERE username='$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "Tên đăng nhập đã tồn tại.";
  } else {
    // Thêm người dùng vào cơ sở dữ liệu
    $sql = "INSERT INTO User (username, password, fullname, email)
            VALUES ('$username', '$password', '$fullname', '$email')";

    if ($conn->query($sql) === TRUE) {
      echo "Đăng kí thành công.";
    } else {
      echo "Lỗi: " . mysqli_error($conn);
    }
  }
?>

<html>
   <body>
      
      <h2>Đăng Kí</h2> 
      
      <form action="register.php" method="POST">
         Tên đăng nhập:<br>
         <input type="text" name="username"><br>
         Mật khẩu:<br>
         <input type="password" name="password"><br>
         ID:<br>
         <input type="text" name="id"><br>
         Email:<br>
         <input type="email" name="email"><br>
         <input type="submit" name="submit" value="Đăng kí">
      </form>
      
   </body>
</html>

