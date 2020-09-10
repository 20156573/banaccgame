<?php  
require_once '../check_admin.php';
require_once '../menu.php';
require_once '../../connect.php';

$search = '';
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
$sql = "select acc.idAcc, bill.idCustomer, acc.username, acc.password, bill.idBill, bill.status, bill.time, acc.price, game.name as typeOfGame
    FROM bill JOIN acc on acc.idAcc=bill.idAcc JOIN game ON acc.idGame=game.idGame
    where (acc.idAcc like '%$search%') or (bill.idBill like '%$search%') or (bill.idCustomer like '%$search%')
    order by bill.time DESC";

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
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search by ID Bill/Customer/Product" value="<?php echo $search ?>">
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
                        <th>ID Bill</th>
                        <th>ID Customer</th>
                        <th>ID Product</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Date</th>
                        <th>Game Title</th>
                        <th>Total Price</th>
                        <th>Status</th>
                    </tr>      
                </thead>
                <?php foreach ($array as $each): ?> 
                <tbody>    
                    <td><?php echo $each['idBill'] ?></td>
                    <td><?php echo $each['idCustomer']; ?></td>
                    <td><?php echo ($each['typeOfGame'].'_'.$each['idAcc']) ?></td>
                    <td><?php echo $each['username'] ?></td>
                    <td><?php echo $each['password'] ?></td>
                    <td><?php echo $each['time'] ?></td>
                    <td><?php echo $each['typeOfGame']; ?></td>
                    <td><?php echo $each['price'].' VND' ?></td>
                    <td><?php echo "Successful"; ?></td>
                </tbody>
                <?php endforeach; 
                mysqli_close($connect);
                ?>
            </table>
        </div>
        <?php endif ?>
        <div class="btn-group" role="group" aria-label="First group">
        <?php for($i=1;$i<=$numberOfPages;$i++){ ?>
             <button type="button" class="btn btn-secondary">
                <a href="?page=<?php echo $i ?>">
                    <?php echo $i ?>
                </a>
            </button>
        <?php } ?>
        </div>
    </div>
</article>
    