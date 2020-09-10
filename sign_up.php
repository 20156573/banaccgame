<link rel="stylesheet" type="text/css" href="style_signup.css">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        
    </head>
    <body>

      <form action="process_signup.php" method="post">
          <h1>Đăng kí</h1>
          <p>Bạn đã có tài khoản?<a href="login.php">Đăng nhập tại đây.</a></p>
          <label for="name">Họ tên:</label>
          <input type="text" id="name" name="name" placeholder="Nhập họ tên" onkeyup="myfunction()">
          <label id="a_name" class="col-sm-5"></label>

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Nhập email đăng kí" onkeyup="myfunction()">
          <label id="a_email" class="col-sm-5"></label>
          <?php if (isset($_GET['error1'])): ?>
            <label class="col-sm-5 text-danger">Email này đã được sử dụng, vui lòng chọn email khác hoặc quay lại trang đăng nhập</label>
          <?php endif ?>

          <label for="password">Mật khẩu</label>
          <input type="password" id="password" name="password" placeholder="Tạo mật khẩu" onkeyup="myfunction()">
          <label id="a_password" class="col-sm-5"></label>

          <label for="numberPhone">Số Điện Thoại</label>
          <input type="text" id="numberPhone" name="numberPhone" placeholder="Nhập số điện thoại" onkeyup="myfunction()">
          <label id="a_numberPhone" class="col-sm-5"></label>
          <?php if (isset($_GET['error2'])): ?>
            <label class="col-sm-5 text-danger">Số điện thoại này đã được sử dụng, vui lòng chọn số điện thoại khác hoặc quay lại trang đăng nhập</label>
          <?php endif ?>

          <label>Giới tính:</label>
          <input type="radio" id="nu" value="0" name="sex" checked><label for="nu" class="light">Nữ</label>
          <input type="radio" id="nam" value="1" name="sex"><label for="nam" class="light">Nam</label>
          <br>
          <center><input type="submit" class="button" value="Đăng kí" id="btn"></center>
        </form>
    <script type="text/javascript">
        document.getElementById('btn').disabled = true;
       function myfunction()
        {
           var z = 1;
           var dem_sai=0;
           var name = document.getElementById('name').value;
           var regex_name =/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/g;
           var test_name = regex_name.test(name) ;
           if(name.replace(' ', '') != '')
            {
               document.getElementById("a_name").innerHTML = "";
            }
            else
            {
                 document.getElementById("a_name").innerHTML  ="Tên không hợp lệ";
                dem_sai++;
               consol.log(1);
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
    </body>
</html>