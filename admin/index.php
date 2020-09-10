<!DOCTYPE html>
<html lang="vi">
<head>
    <title></title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php  
session_start();
if (isset($_SESSION['level'])) {
header("location: managebill/");
exit();
}

if (isset($_COOKIE['idc'])) {
	$idc = $_COOKIE['idc'];
	require_once '../connect.php';
	$sql = "select * from admin where idAdmin = '$idc'";
    $array = mysqli_query($connect, $sql);

	$count = mysqli_num_rows($array);
	if($count==1){
	session_start();
	$each = mysqli_fetch_array($array);
	$_SESSION['name'] = $each['name'];
	$_SESSION['idAdmin'] = $each['idAdmin'];
	$_SESSION['level'] = $each['level'];
	header("location: managebill/");
	}
}
?>
<nav>
    <nav class="navbar navbar-expand-md bg-white navbar-light border-bottom border-info">
        <div class="navbar-header">
            <a class="navbar-brand ml-sm-5 py-sm-3 font-weight-bold" href="index.php">ATP Admin</a>
        </div>                                                                                          
    </nav>
</nav>
<div class="row mt-5">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form class="container" action="process_login.php" method="post">
            
            <a class="nav-link px-0" href="index.php"><h1 class="display-5 text-primary">Log in</h1></a>
            <hr>
            <div class="form-group mt-4">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" size="100px" class="form-control" name='email' id="email" aria-describedby="emailHelp" placeholder="Nhập email" required="required">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name='password' id="password" placeholder="Nhập mật khẩu" required="required">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember login?</label>
            </div>
            <?php  if(isset($_GET['error'])){ ?>
            <span class="text-danger"><p><?php echo "The password that you've entered is incorrect. Please check it again." ?></p></span>
            <?php } ?>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    <div class="col-sm-4"></div>
</div>

<?php if(isset($_SESSION['level'])){ ?>
	<?php header("location: managebill/") ?>
<?php } ?>
</body>
</html>