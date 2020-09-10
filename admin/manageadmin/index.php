<?php 
require_once '../check_super_admin.php';
require_once '../menu.php';
require_once'../../connect.php';
$sql ="select * from admin";
$array = mysqli_query($connect,$sql);
?>
<article class="content container">
	<div class="container">
		<table class="table table-light">
			<tr>
				<th>
					<a class="btn btn-info btn-sm" href="view_insert.php" role="button">Add</a>
				</th>
			</tr>
		</table>
	</div>		
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead class="thead-dark">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Gender</th>
					<th>Phone number</th>
					<th>Level</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
			</thead>
			<?php foreach ($array as $key): ?>
				<tbody>
					<td><?php echo $key['name'] ?></td>
					<td><?php echo $key['email'] ?></td>
					<td>
					<?php 
					if($key['sex']==0){
						echo'Male';
					}
					else{
						echo'Female';
					}
					?>
					</td>
					<td><?php echo $key['numberPhone'] ?></td>
					<td>
					<?php 
					if($key['level']==0){
						echo"Super Admin";
					}
					else{
						echo"Admin";
					}
					?>
					</td>
					<?php if($key['level']==1){ ?>
					<td><a href="view_update.php?idAdmin=<?php echo $key['idAdmin']?>">Update</a></td>
					<td><a href="Delete.php?idAdmin=<?php echo $key['idAdmin']?>">Delete</a></td>	
					<?php } ?>
					<?php if($key['level']==0){ ?>
					<td></td>
					<td></td>	
					<?php } ?>
				</tbody>
			<?php endforeach ?>
		</table>
	</div>
</article>
<?php mysqli_close($connect); ?>
<?php require_once '../footer.php'; ?>