<?php 
require_once'../connect.php';

$idAdmin	        = $_POST['idAdmin'];
$newPassword     	= $_POST['newPassword'];
$oldPassword  		= $_POST['oldPassword'];

$sql = "select password from admin where idAdmin = '$idAdmin'";

$array = mysqli_query($connect,$sql);
$count = mysqli_num_rows($array);


foreach ($array as $key);
echo $key['password'];

if ($oldPassword != $key['password']) {
	header("location: change_password.php?error='Sai mật khẩu'");
}
else{
	$sql = "update admin
	set
	password = '$newPassword'
	where
	idAdmin = '$idAdmin'
	";
	mysqli_query($connect, $sql);								
	session_start();
	session_destroy();
	setcookie('idc','',time()-9669);
	header('location: index.php');
}

die($sql);
mysqli_close($connect);


