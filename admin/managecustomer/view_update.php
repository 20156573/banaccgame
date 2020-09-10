<?php 
require_once '../check_admin.php';
require_once '../menu.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
require_once '../../connect.php';
$idCustomer = $_GET['idCustomer'];
$sql = "select * from customer where idCustomer = '$idCustomer'";
$array = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($array);
mysqli_close($connect);
?>
<form action="process_update.php" method="post">
	<input type="hidden" name="idCustomer" value="<?php echo $each['idCustomer'] ?>">
	Name
	<p>	
		<input type="text" name="name" value="<?php echo $each['name'] ?>">
	</p>
	Email
	<p>
		<input type="email" name="email" value="<?php echo $each['email'] ?>">
	</p>
	Password
	<p>	
		<input type="password" name="password" value="<?php echo $each['password'] ?>">
	</p>
	Gender
	<p>
		<input type="radio" name="sex" value="1" <?php if($each['sex']==1) echo "checked"; ?>>Female
		<input type="radio" name="sex" value="0" <?php if($each['sex']==0) echo "checked"; ?>>Male
	</p>
	Phone number
	<p>
	<input type="text" name="numberPhone"  value="<?php echo $each['numberPhone'] ?>">
	</p>
	<p>
		<button>Update</button> 
	</p>
</form>
</body>
</html>