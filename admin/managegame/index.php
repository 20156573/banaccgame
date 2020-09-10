<?php 
require_once '../check_admin.php';
require_once '../menu.php';

require_once '../../connect.php';
$sql = "select * from game";
$array = mysqli_query($connect,$sql);
?>

<article class="content">
	<div class="container"> 
		<table class="firsttable table table-light">
			<tr>
				<th>
					<a class="btn btn-info btn-sm" href="view_insert.php" role="button">Add</a>
				</th>
			</tr>
		</table>
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead class="thead-dark">
					<tr>
						<th>Game Title</th>
						<th>The sum total of product</th>
						<th>Sold</th>
						<th>Update</th>
					</tr>
				</thead>
			<?php foreach ($array as $each): ?>
				<tbody>
					<td>
						<?php echo $each['name'] ?>
					</td>
					<td>
						<?php echo $each['name'] ?>
					</td>
					<td>
						<?php echo $each['name'] ?>
					</td>
					<td>
						<a href="view_update.php?idGame=<?php echo $each['idGame'] ?>">
							Update
						</a>
					</td>
				</tbody>
			<?php endforeach;
			mysqli_close($connect); 
			?>
			</table>
		</div>
	</div>
<?php require_once '../footer.php'; ?>