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

	<link rel="stylesheet" type="text/css" href="you_style.css">
</head>
<body>
	<div class="fixed-top">
		<nav class="navbar navbar-expand-md bg-white navbar-light">
			<div class="navbar-header">
				<a class="navbar-brand ml-sm-5 font-weight-bold" href="managebill/"><h3>ATP Admin</h3></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			</div>
			<?php  
            if(isset($_SESSION['idAdmin'])){ ?>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto mr-sm-5"> 
                    <li class="nav-item dropdown border rounded-lg">
                        <a class="nav-link text-dark dropdown-toggle btn-login-sign_up" data-toggle="dropdown" 
                        href="you.php?idAdmin=<?php echo ($_SESSION['idCustomer']) ?>">
                        <img class="user-image-frame rounded mr-sm-3" src="https://prod-edxapp.edx-cdn.org/static/edx.org/images/profiles/default_50.76570a4d025e.png" width="20%" alt="">
                        <?php echo ($_SESSION['name']) ?>
                        </a>    
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="you.php?idCustomer=<?php echo ($_SESSION['idCustomer']) ?>">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
            <?php } ?>
        </nav>
        <nav class="menu-head navbar navbar-expand-md navbar-dark bg-dark border-0 mx-sm-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse " id="navbarNavDropdown2">         
                <ul class="container nav navbar-nav py-0 my-0 d-flex justify-content-center"><?php if($_SESSION['level']!='1'){ ?>
					<li class="nav-item border-right border-white px-sm-3"><a class="nav-link" href="manageadmin/">Admin Management</a></li>
         	  	<?php } ?>
                    <li class="nav-item border-right border-white px-sm-3">
                        <a class="nav-link" href="manageacc/?page=1">Product Management</a>
                    </li>
                    <li class="nav-item border-right border-white px-sm-3">
                        <a class="nav-link" href="managebill/">Bill Management</a>
                    </li>
                    <li class="nav-item border-right border-white px-sm-3">
                        <a class="nav-link" href="managecustomer/">Customer Management</a>
                    </li>
                    <li class="nav-item border-white px-sm-3">
                        <a class="nav-link" href="managegame/">Game Management</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="body-body border-0 mt-sm-5 mx-sm-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 content container">
                    <div class="row my-4 ml-5">
                        <div class="col-sm-2 you-left border-0 p-0">
                            <div class="you-left-menu py-2">
                                <nav class="navbar">              
                                    <a class="nav-link navbar-toggle text-dark px-0 pb-0" data-toggle="collapse" data-target="#myNavbar" href="#"><h6><i class="fas fa-user-edit"></i> Profile <i class="fas fa-angle-down"></i></h6></a>
                                </nav>
                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav navbar-nav ml-4">
                                    <div class="you-left-menu py-2">
                                        <li><a class="nav-link text-dark  pl-3 pb-0" href="you.php"><h6><i class="fas fa-angle-right"></i> Your profile</h6></a></li>
                                    </div>
                                    <div class="you-left-menu py-2">
                                        <li><a class="nav-link text-dark pl-3 pb-0" href="change_password.php"><h6><i class="fas fa-angle-right"></i> Change password</h6></a></li> 
                                    </div>
                                </ul>
                            </div>
                        </div>
