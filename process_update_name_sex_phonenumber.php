<?php 

$idCustomer         = $_POST['idCustomer'];
$name      			= $_POST['name'];
$sex 				= $_POST['sex'];
$numberPhone       	= $_POST['numberPhone'];

require_once 'connect.php';

$sql = "SELECT numberPhone FROM customer WHERE numberPhone='$numberPhone'";
    if (mysqli_num_rows(mysqli_query($connect, $sql)) > 0){
        header('location: you.php?error');
        exit;
    }

session_start();

$_SESSION['name'] = $_POST['name'];
require_once 'connect.php';
$sql = "update customer
set
name = '$name',
sex = '$sex',
numberPhone = '$numberPhone'
where
idCustomer = '$idCustomer'
";
mysqli_query($connect,$sql);
//die($sql);

mysqli_close($connect);
header('location:you.php');