<?php 
require_once '../check_super_admin.php';
require_once '../menu.php';

require_once '../menu.php';
?>
	
<article class="content container">
    <div class="col-sm-10">
        <div class="you-right mx-5 pb-4">
            <h5 class="pt-4 pb-2 px-4">ADD ADMIN</h5>
            <hr>
            <form class="px-4" action="process_insert.php" method="POST">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="text" class="form-control col-sm-7" id="name" name="name" onkeyup="myfunction()">
                        <label id="a_name" class="col-sm-5"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="Email" class="form-control col-sm-7" id="email" name="email" onkeyup="myfunction()">
                        <label id="a_email" class="col-sm-5"></label>
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
                    <label for="numberPhone" class="col-sm-2 col-form-label">Phone Number <i class="fas fa-pen"></i></label>
                    <div  class="col-sm-10">
                        <input type="text" class="form-control col-sm-7" id="numberPhone" name="numberPhone" onkeyup="myfunction()">
                        <label id="a_numberPhone" class="col-sm-5"></label>
                    </div>
                </div>
               <div class="form-group row">
                    <label for="sex" class="col-sm-2 col-form-label">Gender</label>
                    <div  class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="sex1" value="1" checked>
                            <label class="form-check-label" for="sex1">
                            Female
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="sex0" value="0" >
                            <label class="form-check-label" for="sex0">
                                Male
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="level" class="col-sm-2 col-form-label">Level</label>
                    <div  class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="level" id="level" value="1" checked>
                            <label class="form-check-label" for="level">
                            Admin
                            </label>
                        </div>
                    </div>
                </div>
                 <button type="submit" class="btn btn-info" id="btn">Add Admin</button>
            </form>
        </div>
    </div>
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

            var email = document.getElementById('email').value;
            var regex_email = /^[a-z0-9\_\.]{5,32}\@[0-9a-z]+(\.[0-9a-z]+)+$/i;
            var test_email = regex_email.test(email);
    
            if(test_email==true){
            document.getElementById('a_email').innerHTML = '';
            }

            else{
            document.getElementById('a_email').innerHTML = 'Email không hợp lệ';
            dem_sai++;
             }

             var    password = document.getElementById('password').value;
            var regex_password =/^[a-z0-9\s]{6,32}$/i;
            var test_password = regex_password.test(password);

             if (test_password == true) 
            {
             a_password.innerHTML = "";
            }

             else
            {
            a_password.innerHTML= "Nhập mật khẩu có ít nhất 6 kí tự";
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
</form>
</article>
<?php require_once '../footer.php'; ?>