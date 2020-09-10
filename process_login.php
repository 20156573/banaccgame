<?php  

$email          = addslashes($_POST['email']);
$password       = addslashes($_POST['password']);

require_once 'connect.php';

$sql = "select * from customer
where email = '$email' and password = '$password'";
$array = mysqli_query($connect, $sql);

$count = mysqli_num_rows($array);
if($count==1){
	session_start();
	$each = mysqli_fetch_array($array);
	$_SESSION['email'] = $each['email'];
	$_SESSION['name'] = $each['name'];
	$_SESSION['idCustomer'] = $each['idCustomer'];

	if(isset($_POST['rememberLogin'])){
		setcookie('idc',$each['idCustomer'],time()+86400*60);
	}
	header('location: index.php');
}
else{
	header('location: login.php?error=Mật khẩu của bạn đã sai, vui lòng đăng nhập lại');
}