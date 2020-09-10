<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$sex = $_POST['sex'];
$numberPhone =$_POST['numberPhone'];

require_once 'connect.php';
$sql = "SELECT email FROM customer WHERE email='$email'";
    if (mysqli_num_rows(mysqli_query($connect, $sql)) > 0){
        header('location: sign_up.php?error1');
        exit;
    }
 $sql = "SELECT numberPhone FROM customer WHERE numberPhone='$numberPhone'";
    if (mysqli_num_rows(mysqli_query($connect, $sql)) > 0){
        header('location: sign_up.php?error2');
        exit;
    }
$sql = "insert into customer(name,email,password,numberPhone,sex) values ('$name','$email','$password','$numberPhone','$sex')";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:login.php');