<?php 
require_once '../check_admin.php';
require_once '../menu.php';
require_once '../../connect.php';
$idAcc 	= $_GET['idAcc'];
$page 	= $_GET['page'];
$sql = "select *, game.name from acc
join game on game.idGame = acc.idGame where idAcc = '$idAcc'";
$array = mysqli_query($connect, $sql);
$acc = mysqli_fetch_array($array);
mysqli_close($connect);
$array_image = (explode('|',$acc['image'],-1)); 

$count  = count($array_image);
?>
<article class="content container">
    <div class="col-sm-10">
        <div class="you-right mx-5 pb-4">
            <h5 class="pt-4 pb-2 px-4">UPDATE ACC GAME</h5>
            <hr>
            <form class="px-4" action="process_update.php?count=<?php echo($count) ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="page" value="<?php echo $page?>">
                <input type="hidden" name="idAcc" value="<?php echo $idAcc?>">
            	<div class="form-group row">
                    <label for="game" class="col-sm-2 col-form-label">Game Title <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                    <p>
                    <input type="radio" name="idGame" value="1" <?php if($acc['idGame']==1) echo "checked"; ?>>PUBG Mobile</p>
                    <p>
                    <input type="radio" name="idGame" value="2" <?php if($acc['idGame']==2) echo "checked"; ?>>Liên quân Mobile</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="userName" class="col-sm-2 col-form-label">userName <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="text" class="form-control col-sm-7" id="userName" name="userName" onkeyup="myfunction()" value="<?php echo $acc['username'] ?>">
                        <label id="a_userName" class="col-sm-5"></label>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="text" class="form-control col-sm-7" id="password" name="password" onkeyup="myfunction()" value="<?php echo $acc['password'] ?>">
                        <label id="a_password" class="col-sm-5"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rank" class="col-sm-2 col-form-label">Rank <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-5">
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
                        <input type="number" class="form-control col-sm-7" id="level" name="level" onkeyup="myfunction()" value="<?php echo $acc['level'] ?>">
                        <label id="a_level" class="col-sm-5"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="text" class="form-control col-sm-7" id="description" name="description" onkeyup="myfunction()" value="<?php echo $acc['description'] ?>">
                        <label id="a_description" class="col-sm-5"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Price <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="number" class="form-control col-sm-7" id="price" name="price" onkeyup="myfunction()" value="<?php echo $acc['price'] ?>">
                        <label id="a_price" class="col-sm-5"></label>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Old avatar <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <img src="../../pictureofacc/<?php echo($acc['picture']) ?>" height='200'>
                        <input type="hidden" name="oldPicture" value="<?php echo($acc['picture']) ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Choose new avatar <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                       <input type="file" name="newPicture" accept="image/*">
                    </div>
                </div>
                
                <?php  

                foreach($array_image as $key ): ?>
                        <img class="img-acc" name='oldImage' value="<?php echo "$key"; ?>" src="../../pictureofacc/<?php echo "$key"; ?>"> 
                <?php endforeach;  ?>
                <input type="hidden" name="oldImage" value="<?php echo $acc['image']; ?>">

                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Images<i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="file" name="image[]" multiple>
                        <label for="image">Choose up to 3 images</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-info" id="btn">Update Acc</button>
            </form>
        </div>
    </div>
</article>
<script type="text/javascript">
       function myfunction()
       document.getElementById('btn').disabled = true;
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