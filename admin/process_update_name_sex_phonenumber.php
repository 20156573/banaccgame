<?php 

$idAdmin            = $_POST['idAdmin'];
$name      			= $_POST['name'];
$sex 				= $_POST['sex'];
$numberPhone       	= $_POST['numberPhone'];

require_once '../connect.php';

$sql = "SELECT numberPhone FROM admin WHERE numberPhone='$numberPhone'";
    if (mysqli_num_rows(mysqli_query($connect, $sql)) > 0){
        header('location: you.php?error');
        exit;
    }


session_start();

$_SESSION['name'] = $_POST['name'];
require_once '../connect.php';
$sql = "update admin
set
name = '$name',
sex = '$sex',
numberPhone = '$numberPhone'
where
idAdmin = '$idAdmin'
";
// die($sql);
mysqli_query($connect,$sql);
//die($sql);

mysqli_close($connect);
header('location:you.php');