<?php 
require_once 'check_admin.php';
require_once 'your_menu.php';
?>
<?php 
require_once'../connect.php';
$idAdmin = $_SESSION['idAdmin'];
$sql ="select * from admin where idAdmin='$idAdmin'";
$array = mysqli_query($connect,$sql);
?>

    <div class="col-sm-10">
        <div class="you-right mx-5 pb-4">
            <h5 class="pt-4 pb-2 px-4">CHANGE PASSWORD</h5>
            <hr>
            <?php foreach ($array as $key): ?>
            <form class="px-5" name="passwordForm" action="process_update_password.php" method="post">
                <input type="hidden" name="idAdmin"  value="<?php echo $key['idAdmin'] ?>">
                <div class="row py-3">
                    <input type="password" class="form-control col-sm-7" placeholder="Mật khẩu cũ" name="oldPassword">
                    <label class="col-sm-5 text-danger"><?php if (isset($_GET['error'])) {echo "Mật khẩu của bạn không đúng.";}
                    ?></label>
                </div>

                <div class="row py-3">
                    <input type="password" class="form-control col-sm-7" id="newPassword" placeholder="Mật khẩu mới" onkeyup="myFunction()" name="newPassword">
                    <label id="a-newPassword" class="col-sm-5 text-danger"></label>
                </div>

                <div class="row py-3">
                    <input type="password" class="form-control col-sm-7" id="newRepetitivePassword" placeholder="Nhập lại mật khẩu mới" onkeyup="myFunction()" name="newRepetitivePassword">
                    <label id="a-newRepetitivePassword" class="col-sm-5 text-danger"></label>
                </div>
                <button type="submit" class="btn btn-info" id="btn">Lưu thay đổi</button>
            </form>            
            <?php endforeach ?>
        </div>
    </div>
</div>
<script>
    document.getElementById("btn").disabled  = true;

    function myFunction() {
        var x, text, y, RepetitiveText;

        x = document.getElementById("newPassword").value;
        if (x.length<6 && x.length>0) {
            text = "Mật khẩu quá ngắn.";
        } 
        else {  
            text = "";
        }  
        document.getElementById("a-newPassword").innerHTML = text;

        y = document.getElementById("newRepetitivePassword").value;
        if (x!=y && y!='') {
            RepetitiveText = "Mật khẩu không khớp.";
        }
        else {
            RepetitiveText = "";
        }
        document.getElementById("a-newRepetitivePassword").innerHTML = RepetitiveText;

        var z;
        if (x.length>5 && x==y) {
            z=false;
        }
        else{
            z=true;
        }
        document.getElementById("btn").disabled  = z;
    }
</script>

<?php mysqli_close($connect); ?>
<?php require_once 'footer.php'; ?>