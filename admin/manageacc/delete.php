<?php 
$idAcc = $_GET['idAcc'];
$page = $_GET['page'];
require_once '../../connect.php';
$sql = "delete from acc
where idAcc = '$idAcc'";
mysqli_query($connect,$sql);
mysqli_close($connect);
header("location: index.php?page=$page");
?>