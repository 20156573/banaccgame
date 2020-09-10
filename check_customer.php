<?php  
session_start();
if (!isset($_SESSION['idCustomer'])) {
	header('location:index.php?error=Phải đăng nhập đã');
	exit();
}