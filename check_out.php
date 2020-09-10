<?php  
require_once 'check_customer.php';
require_once 'connect.php';
require_once 'your_menu.php';

$idAcc = $_GET['idAcc'];

$sqlCheckStatus = "select status from bill where idAcc='$idAcc'";
$arrayCheckStatus = mysqli_query($connect, $sqlCheckStatus);
$count = mysqli_num_rows($arrayCheckStatus);
if($count!=0){
	header('location:index.php');
	exit();
}

$sql = "select * from acc where idAcc='$idAcc'";
$array = mysqli_query($connect, $sql);

?>
<div class="col-sm-10">
    <div class="you-right pb-4 mx-5">
        <h5 class="pt-4 pb-2 px-4">CHECK OUT</h5>
        <hr>
        <div class="table-responsive px-4">
			<?php foreach ($array as $each): ?>
			<form action="process_bill.php" method="POST">
				<input type="hidden" name="idAcc" type="text" value="<?php echo $each['idAcc'] ?>">
			<table class="table table-bordered table-hover">
				<thead>
					<tr class="table-info">
						<th>Tên sản phẩm</th>
						<th>Loại game</th>
						<th>Mã sản phẩm</th>
						<th>Số lượng</th>
						<th>Giá</th>
					</tr>
				</thead>
				<tbody>
					<td><?php echo 'Tài khoản game' ?></td>
					<td><?php if ($each['idGame']==1) {
						echo "PUBG Mobile";
					}
					elseif ($each['idGame']==2) {
					 	echo "Liên quân Mobile";
					} 
					?>
					</td>
					<td><?php echo '#'.$each['idAcc'] ?></td>
					<td><?php echo "1"; ?></td>
					<td><?php echo $each['price'].' VND'; ?></td>
				</tbody>
			</table>
			<?php endforeach ?>
			<?php mysqli_close($connect); ?>
			<button class="btn btn-outline-info">Thanh toán</button>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>