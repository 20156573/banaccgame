<?php  
require_once 'check_customer.php';
require_once 'connect.php';

$idAcc = $_POST['idAcc'];
$idCustomer = $_SESSION['idCustomer'];

$sql =	"insert into bill(idAcc, idCustomer, status, time) values ('$idAcc', '$idCustomer','1', NOW())";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location: you.php');
?>