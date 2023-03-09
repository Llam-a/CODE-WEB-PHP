<?php

   // Kết nối đến database
   $dbhost = 'localhost';
   $dbuser = 'root'; // tên người dùng của bạn
   $dbpass = ''; // mật khẩu của bạn
   $dbname = 'my_database';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
   if(! $conn ) {
      die('Không thể kết nối: ' . mysqli_error());
   }
   
   // Kiểm tra nếu người dùng đã đăng nhập thì chuyển hướng đến Trang chủ
   
   if(isset($_POST['submit'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $sql = "SELECT * FROM users WHERE username='$username' and password='$password'";
      $result = mysqli_query($conn,$sql);
      
      if(mysqli_num_rows($result) == 1){
         $_SESSION['username'] = $username;
         header("location:search.php");
      }else{
         echo "Tên đăng nhập hoặc mật khẩu không chính xác. Vui lòng thử lại.";
      }
   }
?>

<html>
   <body>
      
      <h2>Đăng Nhập</h2> 
      
      <form action="login.php" method="POST">
         Tên đăng nhập:<br>
         <input type="text" name="username"><br>
         Mật khẩu:<br>
         <input type="password" name="password"><br>
         <input type="submit" name="submit" value="Đăng nhập">
      </form>
      
   </body>
</html>
