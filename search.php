<?php

   // Kết nối đến database
   $dbhost = 'localhost';
   $dbuser = 'root'; // tên người dùng của bạn
   $dbpass = ''; // mật khẩu của bạn
   $dbname = 'userdb';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
   if(! $conn ) {
      die('Không thể kết nối: ' . mysqli_error());
   }
   
   // Kiểm tra nếu người dùng đã đăng nhập thì chuyển hướng đến Trang chủ
   session_start();
   if(! isset($_SESSION['username'])){
      header("location:login.php");
     
