<?php 

$name 		 = $_POST['name'];
$email 		 = $_POST['email'];
$password 	 = $_POST['password'];
$sex 	  	 = $_POST['sex'];
$level 		 = $_POST['level'];
$numberPhone = $_POST['numberPhone'];

require_once '../../connect.php';
// Kiểm tra email này đã có người dùng chưa
$sql = "SELECT email FROM admin WHERE email='$email'";
if (mysqli_num_rows(mysqli_query($connect, $sql)) > 0){
    echo "Có vẻ như email này đã được sử dụng bởi một admin khác. Hãy thử lại với một địa chỉ email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
// Kiểm tra số điện thoại này đã có người dùng chưa
$sql = "SELECT email FROM admin WHERE numberPhone='$numberPhone'";
if (mysqli_num_rows(mysqli_query($connect, $sql)) > 0){
    echo "Có vẻ như số điện thoại này đã được sử dụng bởi một admin khác. Hãy thử lại với một số điệnt thoại khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

$sql="insert into admin(name, email, password, sex, numberphone, level)
values ('$name', '$email', '$password', '$sex', '$numberPhone', '$level')";
mysqli_query($connect,$sql);
//die($sql);
mysqli_close($connect);
header('location:index.php');
