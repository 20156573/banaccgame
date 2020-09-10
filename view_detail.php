<?php 
require_once 'menu.php'; 
require_once 'connect.php';
$idAcc = $_GET['idAcc'];

$sqlCheckStatus = "select status from bill where idAcc='$idAcc'";
$arrayCheckStatus = mysqli_query($connect, $sqlCheckStatus);
$count = mysqli_num_rows($arrayCheckStatus);
if($count!=0){
	header('location:index.php');
	exit();
}


$sql = "select * from acc where idAcc='$idAcc' ";
$array = mysqli_query($connect, $sql);
?>
<div class="second-row border-right border-bottom border-left ml-sm-3  mr-sm-3">
	<article class="firstcontent text-dark">
		<section>
			<div class="container jumbotron jumbotron-fluid">
				<div class="container text-center">
					<h1 class="display-6 text-center">TÀI KHOẢN GAME PUBG MOBILE #<?php echo $idAcc ?></h1>
					<?php foreach ($array as $each): ?>
					<table class="table-bordered table mt-5">
						<tr>
							<td><p class="lead"><?php echo ($each['price'].'đ') ?></p></td>
							<td><p class="lead"><?php echo $each['description'].' skins' ?></p></td>
							<td rowspan="2">
								<?php if (isset ($_SESSION['idCustomer'])) {?>
									<a class="btn btn-primary btn-lg" href="check_out.php?idAcc=<?php echo $each["idAcc"] ?>" role="button"><i class="fas fa-cart-arrow-down"></i> Mua ngay</a>
								<?php } ?>
	    						<?php if (!isset ($_SESSION['idCustomer'])) {?>
	    						<button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-cart-arrow-down"></i> Mua ngay</button>
	    						<!-- modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  									<div class="modal-dialog" role="document">
    									<div class="modal-content">
      										<div class="modal-header">
    											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      												<span aria-hidden="true">&times;</span>
    											</button>
  											</div>
	      									<div class="modal-body">
	        									Bạn cần đăng nhập để thực hiện giao dịch này	
	      									</div>
      									<div class="modal-footer">
      										<a class="btn btn-success container" href="login.php" role="button">Đăng nhập</a>
      									</div>
    									</div>
  									</div>
								</div>
								<?php } ?>
	  						</td>
						</tr>
						<tr>
							<td><p class="lead"><?php echo ('Rank ' .$each["rank"]) ?></p></td>
							<td><p class="lead"><?php echo ('Level ' .$each["level"]) ?></p></td>
						</tr>	
					</table>
				</div>
			</div>
		</section>
	</article>
	<div class="container-fluid">
		<div class="px-1">
			<img class="img-fluid pb-3" src="pictureofacc/<?php echo $each['picture'] ?>"></img>
			<?php $array_image = (explode('|',$each['image'],-1)); ?>
			
			<?php
				$count  = count($array_image);
			 	for ($i = 0; $i < $count; $i++){ ?>
				<img class="img-fluid pb-3" src="pictureofacc/<?php echo $array_image[$i] ?>">
			<?php } ?>
		</div>
	</div>
</div>		

<?php endforeach ?>
</div>
<?php mysqli_close($connect); ?>
<?php require_once 'footer.php'; ?>