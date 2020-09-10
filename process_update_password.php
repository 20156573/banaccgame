<?php 
require_once'connect.php';

$idCustomer         = $_POST['idCustomer'];
$newPassword     	= $_POST['newPassword'];
$oldPassword  		= $_POST['oldPassword'];

$sql = "select password from customer where idCustomer = '$idCustomer'";

$array = mysqli_query($connect,$sql);
$count = mysqli_num_rows($array);


foreach ($array as $key);
echo $key['password'];

if ($oldPassword != $key['password']) {
	header("location: change_password.php?error='Sai mật khẩu'");
}
else{
	$sql = "update customer
	set
	password = '$newPassword'
	where
	idCustomer = '$idCustomer'
	";
	mysqli_query($connect, $sql);								
	session_start();
	session_destroy();
	setcookie('idc','',time()-9669);
	header('location: login.php');
}

mysqli_close($connect);


