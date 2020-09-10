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
if (isset($_SESSION['idCustomer'])) {
header('location: index.php');
exit();
}    
if (isset($_COOKIE['idc'])) {
	$idc = $_COOKIE['idc'];
	require_once 'connect.php';
	$sql = "select * from customer where idCustomer = '$idc'";
    $array = mysqli_query($connect, $sql);

	$count = mysqli_num_rows($array);
	if($count==1){
	$each = mysqli_fetch_array($array);
    $_SESSION['email'] = $each['email'];
    $_SESSION['name'] = $each['name'];
    $_SESSION['idCustomer'] = $each['idCustomer'];
	header('location: index.php/');
	}
}
?>
<nav>
    <nav class="navbar navbar-expand-md bg-white navbar-light border-bottom border-info">
        <div class="navbar-header">
            <a class="navbar-brand ml-sm-5 py-sm-3 font-weight-bold" href="index.php">ATP Gamming</a>
        </div>                                                                                          
    </nav>
</nav>
<div class="row mt-5">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form class="container" action='process_login.php' method='POST'>
            
            <a class="nav-link px-0" href="login.php"><h1 class="display-5 text-primary">Đăng nhập</h1></a>
            <span>Bạn đã chưa có tài khoản? <a class="link text-info" href="sign_up.php">Đăng ký tại đây</a></span>
            <hr>
            <div class="form-group mt-4">
                <label for="exampleInputEmail1">Email đăng nhập</label>
                <input type="email" size="100px" class="form-control" name='email' id="email" aria-describedby="emailHelp" placeholder="Nhập email" required="required">
                <small id="emailHelp" class="form-text text-muted">Địa chỉ email được đăng ký trên ATP shop.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mật khẩu</label>
                <input type="password" class="form-control" name='password' id="password" placeholder="Nhập mật khẩu" required="required">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Ghi nhớ đăng nhập?</label>
            </div>
            <?php  if(isset($_GET['error'])){ ?>
            <span class="text-danger"><?php echo "Mật khẩu của bạn không đúng, vui lòng kiểm tra lại" ?></span>
            <?php } ?>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    <div class="col-sm-4"></div>
</div>
</body>
</html>