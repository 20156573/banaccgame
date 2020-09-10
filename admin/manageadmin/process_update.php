 <?php 

$idAdmin 	 = $_POST['idAdmin'];
$name 		 = $_POST['name'];
$email 		 = $_POST['email'];
$password 	 = $_POST['password'];
$sex 	  	 = $_POST['sex'];
$level 		 = $_POST['level'];
$numberPhone = $_POST['numberPhone'];

require_once '../../connect.php';
$sql="update admin
set
name = '$name',
email = '$email',
password = '$password',
sex = '$sex',
level = '$level',
numberPhone = '$numberPhone'
where idAdmin = $idAdmin"
;
mysqli_query($connect, $sql);
//die($sql);
mysqli_close($connect);
header('location:index.php');
