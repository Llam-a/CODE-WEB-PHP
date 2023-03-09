<?php

// Kiểm tra nếu người dùng đã đăng nhập thì chuyển hướng đến Trang chủ
   session_start();
   if(! isset($_SESSION['username'])){
      header("location:login.php");
   }  
 
// Kết nối đến database
   $dbhost = 'localhost';
   $dbuser = 'root'; // tên người dùng của bạn
   $dbpass = ''; // mật khẩu của bạn
   $dbname = 'my_database';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
   if(! $conn ) {
      die('Không thể kết nối: ' . mysqli_error());
   }
     
// Xử lý tìm kiếm ID
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $id = $_GET["id"];
   }
?>

   
   
<html>
   
  <body>
      <h2>Kiểm tra ID</h2> 
   
     <form action="search.php" method="get">
        ID người dùng:<br>
        <input type="text" name="id"><br>
        <input type="sumbit" name="sumbit" value="Tìm kiếm">
     </form>

  
  </body>
</html>
