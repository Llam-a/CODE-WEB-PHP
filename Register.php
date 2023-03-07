<?php
   $dbhost = 'localhost';
   $dbuser = 'root'; // tên người dùng của bạn
   $dbpass = ''; // mật khẩu của bạn
   $dbname = 'userdb';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
   if(! $conn ) {
      die('Không thể kết nối: ' . mysqli_error());
   }
   
   if(isset($_POST['submit'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $id = $_POST['id'];
      $email = $_POST['email'];
      
      $sql = "INSERT INTO users (username,password,id,email) VALUES ('$username', '$password', '$id', '$email')";
      
      $result = mysqli_query($conn,$sql);
      if($result){
         echo "Tài khoản đã được tạo thành công.";
      }else{
         echo "Lỗi: " . mysqli_error($conn);
      }
   }
?>

<html>
   <body>
      
      <h2>Đăng Kí</h2> 
      
      <form method="post" action="">
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

