<!DOCTYPE html>
<html lang="vi">
<head>
	<title></title>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script
 	src="https://code.jquery.com/jquery-3.4.1.js"
  	integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  	crossorigin="anonymous">
  	</script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="fixed-top">
		<nav class="navbar navbar-expand-md bg-dark navbar-dark border-bottom border-primary">
			<div class="navbar-header">
				<a class="navbar-brand ml-sm-5 font-weight-bold" href="../manageacc/?page=1">ATP Admin</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			</div>	
			<?php  if(isset($_SESSION['level'])){ ?>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav ml-auto mr-sm-5">	
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" 
							href="../you.php?idAdmin=<?php echo ($_SESSION['idAdmin']) ?>">
							<img class="user-image-frame rounded mr-sm-3" src="https://prod-edxapp.edx-cdn.org/static/edx.org/images/profiles/default_50.76570a4d025e.png" width="20%" alt="">
							<?php echo ($_SESSION['name']) ?>
							</a>	
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item text-center" href="../you.php?idAdmin=<?php echo ($_SESSION['idAdmin']) ?>">Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item text-center" href="../logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			<?php } ?>
		</nav>

		<nav class="menu-head navbar navbar-expand-md navbar-light bg-white border-bottom ml-sm-3  mr-sm-3">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown2">			
				<ul class="container nav navbar-nav">	
					<?php if($_SESSION['level']!='1'){ ?>
						<li class="nav-item"><a class="nav-link" href="../manageadmin/">Admin Management</a></li>
         	  		 <?php } ?>
					<li class="nav-item"><a class="nav-link" href="../manageacc/?page=1">Product Management</a></li>
					<li class="nav-item"><a class="nav-link" href="../managebill/">Bill Management</a></li>
					<li class="nav-item"><a class="nav-link" href="../managecustomer/">Customer Management</a></li>
					<li class="nav-item"><a class="nav-link" href="../managegame/">Game Management</a></li>
				</ul>
			</div>
		</nav>
	</div>

<div class="border-right border-bottom border-left ml-sm-3  mr-sm-3">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 left">
