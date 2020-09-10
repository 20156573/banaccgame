<?php 
require_once '../check_admin.php';
require_once '../menu.php';
?>
<?php
require_once '../menu.php';
?>
	<br>
	<br>
	<br>
	<br>
<form align='center' action = "process_insert.php" method="post">
	Name
	<p><input type="text" name="name"></p>
	E-mail
	<p><input type="email" name="email"></p>
	Password
	<p><input type = "password" name = "password"></p>
	Gender
	<p>
		<input type = "radio" name = "sex" value = "1" checked> Femail
		<input type = "radio" name = "sex" value = "0"> Male
	</p>
	Phone number (không bắt buộc)
	<p>
		<input type = "text" name="numberPhone">
	</p>
	<p>
		<button> Let's go </button>
	</p>
</form>
<?php require_once '../footer.php'; ?>