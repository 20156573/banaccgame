<?php 

$idGame = $_POST['idGame'];
$name = $_POST['name'];
require_once '../../connect.php';
$sql = "update game
set
name = '$name'
where idGame = $idGame"
;
mysqli_query($connect, $sql);
//die($sql);
mysqli_close($connect);
header('location:index.php');
?>