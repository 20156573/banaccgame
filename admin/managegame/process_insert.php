<?php 

$name = $_POST['name'];
require_once '../../connect.php';
$sql = "insert into game(name) values ('$name')";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:index.php');
?>