<?php 

$idCustomer       = $_GET['idCustomer'];

require_once '../../connect.php';
$sql = "delete from customer
where idCustomer = '$idCustomer'";
mysqli_query($connect,$sql);
//die($sql);

mysqli_close($connect);
header('location:index.php');