<?php 
require_once '../check_admin.php';
require_once '../menu.php';
require_once '../../connect.php';

$idGame = $_GET['idGame'];
$sql = "select * from game where idGame = '$idGame'";
$array = mysqli_query($connect, $sql);
//die($sql);
$each = mysqli_fetch_array($array);
?>

<article class="content container">
    <div class="col-sm-10">
        <div class="you-right mx-5 pb-4">
            <h5 class="pt-4 pb-2 px-4">UPDATE GAME</h5>
            <hr>
            <form class="px-4" action="process_insert.php" method="POST">
            	<input type="hidden" name="idGame" value="<?php echo $idGame ?>">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name Game <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                    <input type="text" class="form-control col-sm-7" id="name" name="name" onkeyup="myfunction()" value="<?php echo $each['name']?>">
                    <label id="a_name" class="col-sm-5"></label>
                    </div>
                </div>
                 <button type="submit" class="btn btn-info" id="btn">Add game</button>
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
<?php require_once '../footer.php'; ?>	