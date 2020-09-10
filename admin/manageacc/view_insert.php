<?php 
require_once '../check_admin.php';
require_once '../menu.php'; 
require_once '../../connect.php';
$sql = "select * from game";
$array = mysqli_query($connect,$sql);
mysqli_close($connect);
?>

<article class="content container">
    <div class="col-sm-10">
        <div class="you-right mx-5 pb-4">
            <h5 class="pt-4 pb-2 px-4">ADD GAME ACCOUNT</h5>
            <hr>
            <form class="px-4" action="process_insert.php" method="POST" enctype="multipart/form-data">
            	<div class="form-group row">
                    <label for="game" class="col-sm-2 col-form-label">Game Title <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <select name="idGame"  class="form-control col-sm-7">
						<?php foreach ($array as $each): ?>
						<option value="<?php echo $each['idGame'] ?>">
						<?php echo $each['name'] ?>
						</option>
						<?php endforeach ?>
						</select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="userName" class="col-sm-2 col-form-label">User name <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="text" class="form-control col-sm-7" id="userName" name="userName" onkeyup="myfunction()">
                        <label id="a_userName" class="col-sm-5"></label>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="text" class="form-control col-sm-7" id="password" name="password" onkeyup="myfunction()">
                        <label id="a_password" class="col-sm-5"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rank" class="col-sm-2 col-form-label">Rank <i class="fas fa-pen"></i></label>
                    <div class="col-sm-4">
                        <select name="rank" class="form-control col-sm-7">
        					<option>Chí tôn</option>
                            <option>Tinh anh</option>
                            <option>Thách đấu</option>
        					<option>Quán quân</option>
                            <option>Đại cao thủ</option>
        					<option>Cao thủ</option>
        					<option>Kim cương</option>
        					<option>Bạch kim</option>
        					<option>Vàng</option>
        					<option>Bạc</option>
        					<option>Đồng</option>
    					</select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="level" class="col-sm-2 col-form-label">Level <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="number" class="form-control col-sm-7" id="level" name="level" onkeyup="myfunction()">
                        <label id="a_level" class="col-sm-5"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="text" class="form-control col-sm-7" id="description" name="description" onkeyup="myfunction()">
                        <label id="a_description" class="col-sm-5"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Price <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="number" class="form-control col-sm-7" id="price" name="price" onkeyup="myfunction()">
                        <label id="a_price" class="col-sm-5"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="picture" class="col-sm-2 col-form-label">Avatar<i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                       <input type="file" name="picture" accept="image/*">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Images<i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="file" name="image[]" multiple>
                    </div>
                </div>
                <button type="submit" class="btn btn-info" id="btn">Add</button>
            </form>
        </div>
    </div>
</article>
<script type="text/javascript">
    document.getElementById('btn').disabled = true;
        function myfunction()
        {
            var z = 1;
            var dem_sai=0;
            var userName = document.getElementById('userName').value;
            var regex_userName =/^[a-z0-9\_\.]{5,32}\@[0-9a-z]+(\.[0-9a-z]+)+$/i;
            var test_userName = regex_userName.test(userName) ;
            if(test_userName == true)
            {
               document.getElementById("a_userName").innerHTML = "";
            }
            else
            {
                 document.getElementById("a_userName").innerHTML  ="Tên không hợp lệ";
                dem_sai++;
            }

            var password = document.getElementById('password').value;
           	var regex_password =/^[a-z0-9\s]{6,32}$/i;
           	var test_password = regex_password.test(password) ;
           	if(test_password == true)
            {
               document.getElementById("a_password").innerHTML = "";
            }
            else
            {
                 document.getElementById("a_password").innerHTML  ="Nhập mật khẩu có ít nhất 6 kí tự";
                dem_sai++;
            }

            var level = document.getElementById('level').value;
            if(level>=1 && level<=100)
            {
            	a_level.innerHTML="";
            }
            else
            {
            	a_level.innerHTML="Level max = 100, Level min = 1";
            }
            if (dem_sai!=0)
            {
                z = true;
            }
            else
            {
                z = false;
            }
            document.getElementById('btn').disabled = z;
        }
</script>

<?php require_once '../footer.php'; ?>