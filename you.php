<?php 
require_once 'check_customer.php';
require_once 'your_menu.php'; 
require_once'connect.php';
$idCustomer = $_SESSION['idCustomer'];
$sql ="select * from customer where idCustomer='$idCustomer'";
$array = mysqli_query($connect,$sql);
?>
    <div class="col-sm-10">
        <div class="you-right mx-5 pb-4">
            <h5 class="pt-4 pb-2 px-4">THÔNG TIN CÁ NHÂN</h5>
            <hr>
            <?php foreach ($array as $key): ?>
            <form class="px-4" action="process_update_name_sex_phonenumber.php" method="post">
                <p><input type="hidden" name="idCustomer"  value="<?php echo $key['idCustomer'] ?>"></p>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div  class="col-sm-5">
                        <input type="text" readonly class="form-control" id="email" name="email" value="<?php echo $key['email'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Họ và tên <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-5">
                        <input type="text" class="form-control-plaintext" id="name" name="name" value="<?php echo $key['name'] ?>" onkeyup="myFunction()">
                    </div>
                    <label id="a_name" class="col-sm-5 text-danger"></label>
                </div>
                <div class="form-group row">
                    <label for="numberPhone" class="col-sm-2 col-form-label">Số điện thoại <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-5">
                        <input type="text" class="form-control-plaintext" id="numberPhone" name="numberPhone" value="<?php echo $key['numberPhone'] ?>" onkeyup="myFunction()">
                    </div>
                    <label id="a_numberPhone" class="col-sm-5 text-danger"></label>
                    <?php if (isset($_GET['error'])): ?>
                    <label class="col-sm-5 text-danger">Số điện thoại này đã được sử dụng, vui lòng chọn số điện thoại khác</label>
                    <?php endif ?>
                </div>
                <div class="form-group row">
                    <label for="sex" class="col-sm-2 col-form-label">Giới tính</label>
                    <div  class="col-sm-5">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="sex1" value="1" <?php if($key['sex'] ==1 ) echo 'checked'; ?>>
                            <label class="form-check-label" for="sex1">
                            Nữ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="sex0" value="0" <?php if($key['sex'] ==0) echo 'checked'; ?>>
                            <label class="form-check-label" for="sex0">
                                Nam
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info" id="btn">Lưu thay đổi</button>
            </form>
            <?php endforeach ?>
        </div>
    </div>
</div>
<script type="text/javascript">
        document.getElementById('btn').disabled = true;
        function myFunction()
        {
           var z = 1;
           var dem_sai=0;
           var name = document.getElementById('name').value;
           var regex_name =/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/g;
           var test_name = regex_name.test(name) ;
           if(test_name == true)
            {
               document.getElementById("a_name").innerHTML = "";
            }
            else
            {
                document.getElementById("a_name").innerHTML  ="Tên không hợp lệ";
                dem_sai++;
            }


            var numberPhone = document.getElementById('numberPhone').value;
            var regex_numberPhone = /(0+[3|5|7|8|9])+([0-9]{8})\b/g;
            var test_numberPhone = regex_numberPhone.test(numberPhone);

            if(test_numberPhone == true)
            {
            a_numberPhone.innerHTML = "";
             }
            else
            {
            a_numberPhone.innerHTML ="Số điện thoại không hợp lệ";
            dem_sai++;
            }

            if (dem_sai!=0)
             {
                 z = true;
             }
             else
            {
                z= false;
            }
            document.getElementById('btn').disabled = z;
       }
     
   </script>

<?php mysqli_close($connect); ?>
<?php require_once 'footer.php'; ?>