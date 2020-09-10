<?php  
session_start();
if (!isset($_SESSION['level']) || $_SESSION['level']=='1') {
	header('location:../index.php?error=Phải đăng nhập quyền superadmin đã');
//giống die nhưng khác chỗ là die dùng để in ra còn cái này thì không
	//Lỗi back quay trở lại của 
	exit();
}