<?php 
require_once 'check_customer.php';
require_once 'your_menu.php'; 
require_once'connect.php';

$idCustomer = $_GET['idCustomer'];

$sql = "select acc.username, acc.password, acc.idAcc, bill.idBill, bill.status, bill.time, acc.price, game.name as typeOfGame
FROM bill JOIN acc on acc.idAcc=bill.idAcc JOIN game ON acc.idGame=game.idGame
WHERE bill.idCustomer='$idCustomer'";
$array = mysqli_query($connect, $sql);

$count = mysqli_num_rows($array);
    $limit = 4;

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
    <div class="col-sm-10">
        <div class="you-right pb-4 mx-5">
            <h5 class="pt-4 pb-2 px-4">LỊCH SỬ GIAO DỊCH CỦA BẠN</h5>
            <hr>
            <?php if ($count > 0): ?>
            <div class="table-responsive px-4">
                <table class="table table-bordered table-hover">
                    <thead class="">
                        <tr class="table-info">
                            <th>Mã giao dịch</th>
                            <th>Ngày mua</th>
                            <th>Loại sản phẩm</th>
                            <th>Mã sản phẩm</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                        </tr>                        
                    </thead>
                    <?php foreach ($array as $each): ?>
                    <tbody>
                        <td><?php echo $each['idBill'] ?></td>
                        <td><?php echo $each['time'] ?></td>
                        <td><?php echo ('Acc game '.$each['typeOfGame']); ?></td>
                        <td><?php echo ($each['typeOfGame'].'_'.$each['idAcc']) ?></td>
                        <td><?php echo $each['username'] ?></td>
                        <td><?php echo $each['password'] ?></td>
                        <td><?php echo $each['price'].' VND' ?></td>
                        <td><?php echo "Giao dịch thành công"; ?></td>
                    </tbody>
                    <?php endforeach ?>
                </table>
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
            <?php endif ?>
            <?php if ($count == 0): ?>
            <h6 class="px-4 text-info">Bạn chưa có đơn hàng nào</h6>
            <?php endif ?>
            
        </div>
    </div>
</div>

<?php mysqli_close($connect); ?>
<?php require_once 'footer.php'; ?>