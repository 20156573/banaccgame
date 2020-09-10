<?php 
require_once '../check_super_admin.php';
$idAdmin = $_GET['idAdmin'];

require_once '../../connect.php';
$sql = "delete from admin
where idAdmin = '$idAdmin'"; 
mysqli_query($connect,$sql);
//die($sql);

mysqli_close($connect);
header('location:index.php');
?>