<?php 
require_once 'menu.php';
require_once 'connect.php';
$search = '';
$option = '';


if(isset($_GET['search'])){
	$search = $_GET['search'];
}
	$sql = "select *, acc.idAcc as idAcc, bill.status, game.name
FROM acc JOIN game on acc.idGame=game.idGame LEFT JOIN bill ON bill.idAcc=acc.idAcc
WHERE bill.idBill is null and game.idGame='1' and ((game.name like '%$search%') or (acc.rank like '%$search%'))";

if(isset($_POST['option'])){
	$option = $_POST['option'];
	if ($option == '1') {
			$sql ="select *,acc.idAcc, bill.status from acc LEFT JOIN bill ON bill.idAcc=acc.idAcc
WHERE bill.idBill is null AND idGame='1' order by price DESC";
	}
	if ($option == '2') {
			$sql ="select *,acc.idAcc, bill.status from acc LEFT JOIN bill ON bill.idAcc=acc.idAcc
WHERE bill.idBill is null AND idGame='1' order by price ASC";
	} 
}

if(isset($_POST['submit'])){
	$min = $_POST['min'].'000';
	$max = $_POST['max'].'000';
	$sql ="select *,acc.idAcc, bill.status from acc LEFT JOIN bill ON bill.idAcc=acc.idAcc
WHERE bill.idBill is null AND idGame='1' AND acc.price >= $min and acc.price <= $max order by price ASC";
	
}
	
$array = mysqli_query($connect,$sql);
$allOfGame = mysqli_num_rows($array);

$limit = 8;

$currentPage = 1;

if(isset($_GET['page'])){
$currentPage = $_GET['page'];
}
$offset = ($currentPage - 1) * $limit;

$numberOfPages = ceil($allOfGame/$limit);

$sql = "$sql
limit $limit offset $offset";

$array = mysqli_query($connect,$sql);
$count = mysqli_num_rows($array);

?>
<div class="row first-row ">
	<div class="col-sm-8 search-orderbyprice-game">
		<div class="mt-5">
			<form class="form-inline mt-md-0">
				<input class="form-control mr-sm-2" type="search" name="search" placeholder="Tìm kiếm" value="<?php echo $search ?>">
				<button type="submit" class="btn btn-secondary my-2 my-sm-2">Search</button>
			</form>
		</div>
	</div>
	<div class="col-sm-2">
		<a class="nav-link text-center" href="index.php">
			<img class="img-fluid mx-auto d-block rounded-circle" src="logopubg.png"><h6>PUBG Moblie</h6>
		</a>
	</div>
	<div class="col-sm-2">
		<a class="nav-link text-center" href="lienquanmobile.php">
			<img class="img-fluid mx-auto d-block rounded-circle hoverable img-dif" src="logolienquanmobile.png">Liên Quân Mobile
		</a>	
	</div>
</div>
<hr class="mt-0">
<div class="row second-row">
	<div class="col-sm-3 second-row-left">
		<form method="post">
			<form method="post">
				<p class="font-weight-bold">Sắp xếp theo giá từ</p>
				<button type="submit" name="option" value="1" id="DESC" class="btn btn-outline-info">Cao -> Thấp</button>
				<button type="submit" name="option" value="2" id="ASC" class="btn btn-outline-info">Thấp -> Cao</button>
			</form>
			<div class="mt-4">
				<div class="lowest-price">
					<form method="post">
					<label class="a-newPassword"></label>
						<p>Thấp nhất: <span id="min"></span> K</p>
						<input type="range" class="custom-range" min="0" max="200" id="lowest-price" name="min" >
						<p>Cao nhất: <span id="max"></span> K</p>
						<input type="range" class="custom-range" max="2000" id="highest-price" name="max">
						<button type="submit" name="submit" class="btn btn-outline-info">Lọc</button>
					</form>	

					<script type="text/javascript">
						var sliderLowest = document.getElementById("lowest-price");
						var outputLowest = document.getElementById("min");
						outputLowest.innerHTML = sliderLowest.value; 

						sliderLowest.oninput = function() {
						  	outputLowest.innerHTML = this.value;
						  	document.getElementById("highest-price").min = outputLowest.innerHTML;
						  	
						}
						document.getElementById("lowest-price").value = document.getElementById("min");

						var sliderHighest = document.getElementById("highest-price");
						var outputHighest = document.getElementById("max");
						outputHighest.innerHTML = sliderHighest.value; 

						sliderHighest.oninput = function() {
						  	outputHighest.innerHTML = this.value;
						  	
						}
						document.getElementById("highest-price").value = document.getElementById("max");
					</script>
				</div>
			</div>
		</form>
	</div>
	<div class="col-sm-9 second-row-right">
		<div class="row ml-sm-2">
			<?php if($count==0): ?> 
			<div class="container">
				<p class="text-center"><text class="text-danger">Không có sản phẩm nào thỏa mãn</p>
			</div>
			<?php endif ?>	

			<?php if ($count > '0'): ?>
			<?php foreach ($array as $each): ?>
			<div class="col-sm-6 mb-5">
				<div class="box bg-white">
					<a class="nav-link text-center p-0" href="view_detail.php?idAcc=<?php echo $each['idAcc'] ?>" >
						<img class="img-fluid" src="pictureofacc/<?php echo $each['picture'] ?>">
						<table class="table mb-0">
							<tr>
								<td class="pb-0"><?php echo ($each['price'].'đ') ?></td>
								<td class="pb-0"><?php echo $each['description'].' skins' ?></td>
							</tr>
							<tr>
								<td><?php echo ('Rank ' .$each["rank"]) ?></td>
								<td><?php echo ('Level ' .$each["level"]) ?></td>
							</tr>	
						</table>		
					</a>
					<div class="text-center pb-3">
						<?php if (isset ($_SESSION['idCustomer'])) {?>
						<a class="btn btn-primary btn-lg" href="check_out.php?idAcc=<?php echo $each["idAcc"] ?>" role="button"><i class="fas fa-cart-arrow-down"></i> Mua ngay</a>
						<?php } ?>
		    			<?php if (!isset ($_SESSION['idCustomer'])) {?>

						<button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-cart-arrow-down"></i> Mua ngay</button>
						</button>

						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  						<div class="modal-dialog" role="document">
	    						<div class="modal-content">
	      							<div class="modal-header">
	        							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          								<span aria-hidden="true">&times;</span>
	        							</button>
	      							</div>
		      						<div class="modal-body">
		        						Tiếp tuc đăng nhập để thực hiện giao dịch này
		      						</div>
		      						<div class="modal-footer">
		      							<a class="btn btn-primary container" href="login.php" role="button">Đăng nhập</a>
		      						</div>
		    					</div>
	  						</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php endforeach ?>
			<?php endif ?>	
		</div>
	</div>
</div>
<div class="btn-group" role="group" aria-label="First group">
	<?php for($i=1;$i<=$numberOfPages;$i++){ ?>
		<button type="button" class="btn btn-secondary">
			<a href="?page=<?php echo $i ?>&search=<?php echo $search ?>">
				<?php echo $i ?>
			</a>
		</button>
	<?php } ?>
</div>
<?php 	
mysqli_close($connect); ?>
<?php require_once 'footer.php'; ?>