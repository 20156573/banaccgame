<?php  

$email = $_POST['email'];
$password = $_POST['password'];

require_once '../connect.php';
$sql = "select * from admin
where email = '$email' and password = '$password'";
$array = mysqli_query($connect, $sql);

$count = mysqli_num_rows($array);
if($count==1){
	session_start();
	$each = mysqli_fetch_array($array);
	$_SESSION['name'] = $each['name'];
	$_SESSION['idAdmin'] = $each['idAdmin'];
	$_SESSION['level'] = $each['level'];
	if(isset($_POST['rememberLogin'])){
		setcookie('idc',$each['idAdmin'],time()+86400*60);
	}
	header('location: managebill/');
}
else{
	header('location: index.php?error=error');
}