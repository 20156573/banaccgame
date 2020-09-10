<?php 
require_once '../check_admin.php';
require_once '../menu.php';
?>
<?php 
require_once '../../connect.php';

$search = '';
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
$sql = "select *, idCustomer, numberPhone  from customer WHERE (customer.idCustomer like '%$search%') or (customer.numberPhone like '%$search%') order by idCustomer DESC";
$array = mysqli_query($connect, $sql);														

$count = mysqli_num_rows($array);

$limit = 6;

$currentPage = 1;

if(isset($_GET['page'])){
$currentPage = $_GET['page'];
}
$offset = ($currentPage - 1) * $limit;


$numberOfPages = ceil($count/$limit);

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
	                <form class="form-search form-inline mt-2 mt-md-0">
	                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search by ID Customer/Phone number" value="<?php echo $search ?>">
	                    <button type="submit" class="btn btn-secondary my-2 my-sm-0">Search</button>
	                </form> 
	            </th>
	        </tr>
	    </table>
	    <?php if($count==0): ?> 
		<div class="container">
			<p class="text-center"><text class="text-danger"><?php echo "$search"; ?></text> is not found</p>
		</div>
		<?php endif ?> 
	    <?php if ($count > '0'): ?>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
	        	<thead class="thead-dark">
	        		<tr>
	        			<th>ID customer</th>
	        			<th>Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Phone number</th>
						<th>Delete</th>
	        		</tr>
	        	</thead>
	        	<?php foreach ($array as $each): ?>
	        	<tbody>
	        		<td><?php echo $each['idCustomer'] ?></td>
	        		<td><?php echo $each['name'] ?></td>
					<td><?php echo $each['email'] ?></td>
					<td>
					<?php 
					if($each['sex']==0){
						echo "Male";
					}
					if($each['sex']==1){
						echo "Female";
					}
					?>
					</td>
					<td><?php echo $each['numberPhone'] ?></td>
					<td>
						<a href="delete.php?idCustomer=<?php echo $each['idCustomer'] ?>">
							Delete
						</a>
					</td>
	       	 	</tbody>
	    		<?php endforeach; 
	    		mysqli_close($connect);
		        ?>
		       </table>
		 </div>
		 <?php endif ?>
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
</article>
<?php require_once '../footer.php'; ?>