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
	<div class="">
		<nav class="navbar navbar-expand-md bg-white navbar-light border-0">
			<div class="navbar-header">
				<a class="navbar-brand ml-sm-5 py-sm-3 font-weight-bold" href="index.php">ATP Gamming</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			</div>	
			<?php  
 			session_start();
			if(isset($_SESSION['idCustomer'])){ ?>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav ml-auto mr-sm-5">	
					<li class="nav-item dropdown border rounded-lg">
						<a class="nav-link text-dark dropdown-toggle btn-login-sign_up" data-toggle="dropdown" 
						href="you.php?idAdmin=<?php echo ($_SESSION['idCustomer']) ?>">
						<img class="user-image-frame rounded mr-sm-3" src="https://prod-edxapp.edx-cdn.org/static/edx.org/images/profiles/default_50.76570a4d025e.png" width="20%" alt="">
						<?php echo ($_SESSION['name']) ?>
						</a>	
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="you.php?idCustomer=<?php echo ($_SESSION['idCustomer']) ?>">Thông tin cá nhân</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="logout.php">Đăng xuất</a>
						</div>
					</li>
				</ul>
			</div>
			<?php } ?>
			<?php
			if(!isset($_SESSION['idCustomer'])){?>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                	<a class="btn btn-login-sign_up border btn ml-auto mr-sm-5" href="login.php" role="button">Đăng nhập</a>
				</div>		
            <?php } ?>
		</nav>

		<nav class="menu-head navbar navbar-expand-md navbar-dark bg-dark border-0 mx-sm-00">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse " id="navbarNavDropdown2">			
				<ul class="container nav navbar-nav py-0 my-0 d-flex justify-content-center">	
					<li class="nav-item border-right border-white px-sm-5">
						<a class="nav-link text-white p-0" href="index.php">Pubg Mobile</a>
					</li>
					<li class="nav-item border-right border-white px-sm-5">
						<a class="nav-link text-white p-0" href="lienquanmobile.php">Liên Quân Mobile</a>
					</li>
					<li class="nav-item px-sm-5">
						<a class="nav-link text-white p-0" href="guidance.php">Hướng dẫn</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>

	<div class="body-body border-0 mt-sm-0 mx-sm-0">
		<div class="container-fluid">
			<div class="row mx-sm-2">
				<div class="col-sm-12 content container">


