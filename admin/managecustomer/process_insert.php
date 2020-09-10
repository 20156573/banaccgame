<?php 

$name       = $_POST['name'];
$email     = $_POST['email'];
$password  = $_POST['password'];
$sex = $_POST['sex'];
$numberPhone       = $_POST['numberPhone'];

require_once '../../connect.php';
$sql = "insert into customer(name,email,password,sex,numberPhone)
values ('$name','$email','$password','$sex','$numberPhone')";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:index.php');