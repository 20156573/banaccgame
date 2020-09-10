<?php 

$idCustomer         = $_POST['idCustomer'];
$name      			= $_POST['name'];
$email     			= $_POST['email'];
$password  			= $_POST['password'];
$sex 				= $_POST['sex'];
$numberPhone       	= $_POST['numberPhone'];

require_once '../../connect.php';
$sql = "update customer
set
name = '$name',
email = '$email',
password = '$password',
sex = '$sex',
numberPhone = '$numberPhone'
where
idCustomer = '$idCustomer'
";
mysqli_query($connect,$sql);
//die($sql);

mysqli_close($connect);
header('location:index.php');