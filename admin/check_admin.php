<?php  
session_start();
if (!isset($_SESSION['level'])) {
	header('location:../index.php?error=Phải đăng nhập đã');
//giống die nhưng khác chỗ là die dùng để in ra còn cái này thì không
	exit();
}