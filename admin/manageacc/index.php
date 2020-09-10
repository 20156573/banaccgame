<?php 
require_once '../check_admin.php';
require_once '../menu.php';
require_once '../../connect.php';
$search = '';
if(isset($_GET['search'])){
	$search = $_GET['search'];
}

$sql = "select *, game.name as game 
from acc
inner join game on acc.idGame = game.idGame
where (game.name like '%$search%') or (acc.username like '%$search%') or (acc.rank like '%$search%')
order by idAcc DESC";

$array = mysqli_query($connect,$sql);
$allOfGame = mysqli_num_rows($array);

$limit = 6;

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
<article class="content">
	<div class="container"> 
		<table class="firsttable table table-light">
			<tr>
				<th>
					<a class="btn btn-info btn-sm" href="view_insert.php" role="button">Add</a>
					<?php if($count==0): ?>
					<?php if (isset($_GET['search'])): ?>
					<p class="text-center"><text class="text-danger"><?php echo "$search"; ?></text> is not found</p>
					<?php endif ?>
					<?php endif ?>
				</th>
				<th>
					<form class="form-search form-inline mt-2 mt-md-0">
						<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search by username/type title/rank" value="<?php echo $search ?>">
						<button type="submit" class="btn btn-secondary my-2 my-sm-0">Search</button>
					</form>	
				</th>
			</tr>
		</table>
		<?php if ($count > '0'): ?>	
		<div class="table">
			<table class="table table-bordered table-hover">
				<thead class="thead-dark">
					<tr>
						<th>Update</th>
						<th>ID Account</th>
						<th>Game Title</th>
						<th>Username</th>
						<th>Password</th>
						<th>Level</th>
						<th>Rank</th>
						<th>Description</th>
						<th>Avatar/images</th>
						<th>Price</th>
						<th>Status</th>
						<th>Delete</th>
					</tr>
				</thead>
				<?php foreach ($array as $each): ?>
					<?php $array_image = (explode('|',$each['image'],-1)); ?>

					<tbody>
						<td>
							<a href="view_update.php?idAcc=<?php echo $each['idAcc'] ?>&page=<?php echo $_GET['page'] ?>">
								Update
							</a>
						</td>
						<td><?php echo $each['idAcc'] ?></td>
						<td><?php echo $each['game'] ?></td>
						<td><?php echo $each['username'] ?></td>
						<td><?php echo $each['password'] ?></td>
						<td><?php echo $each['level'] ?></td>
						<td><?php echo $each['rank'] ?></td>
						<td><?php echo $each['description'] ?></td>
						<td><img class="img-acc" src="../../pictureofacc/<?php echo $each['picture'] ?>">
						<?php
						foreach($array_image as $key ): ?>
						<img class="img-acc" src="../../pictureofacc/<?php echo "$key"; ?>">
						<?php endforeach; ?>
					
						<td><?php echo $each['price'] ?></td>
						<td>
						<?php 
						$idAcc = $each['idAcc'];
						$sqlCheckStatus = "select status from bill where idAcc='$idAcc'";
						$arrayCheckStatus = mysqli_query($connect, $sqlCheckStatus);
						$count = mysqli_num_rows($arrayCheckStatus);
						if($count!=0){
							print_r('Sold');
						}
						else{
 							print_r('');
 						} ?>
						</td>
						<td>
							<a href="delete.php?idAcc=<?php echo $each['idAcc'] ?>&page=<?php echo $_GET['page'] ?>">
								Delete
							</a>
						</td>
					</tbody>
				<?php 
				endforeach; 
				mysqli_close($connect); 
				?>
			</table>
		</div>	
		<?php endif ?>	
		<div class="btn-group" role="group" aria-label="First group">
		<?php for($i=1;$i<=$numberOfPages;$i++){ ?>
			<button type="button" class="btn btn-secondary">
				<a href="?page=<?php echo $i ?>&search=<?php echo $search ?>">
					<?php echo $i ?>
				</a>
			</button>
		<?php } ?>
		</div>
  	</div>
</article>
<?php require_once '../footer.php'; ?>