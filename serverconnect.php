<?php 
$maychu = "localhost";
$tendangnhap = "root";
$matkhau = "";
$tendb = "doanphp";
$con = mysqli_connect($maychu, $tendangnhap, $matkhau, $tendb);
// Mã này giúp cho trang khỏi bị các ký tự Unicode kì lạ
mysqli_set_charset($con, 'UTF8');
?>