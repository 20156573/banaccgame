<?php  

$page 			= $_POST['page'];
$idAcc 			= $_POST['idAcc'];
$idGame 		= $_POST['idGame'];
$username 		= $_POST['userName'];
$password 	 	= $_POST['password'];
$level 	  	 	= $_POST['level'];
$rank 		 	= $_POST['rank'];
$price 			= $_POST['price'];
$description 	= $_POST['description'];

require_once '../../connect.php';

$newPicture = $_FILES['newPicture'];
if ($newPicture['size']==0) {
	$picture = $_POST['oldPicture'];
}
else{
	$array		= explode('/', $newPicture['type']);
	$file_type	= $array[1];
	$picture    = strtotime('now').".$file_type";

	$target_dir 	= "../../pictureofacc/";
	$target_file 	= $target_dir . $picture;
	move_uploaded_file($newPicture["tmp_name"], $target_file);

}

$total_files = count($_FILES['image']['name']);
if(isset($_FILES['image']['name'])) {
	$link="";
	for( $i=0 ; $i < $total_files ; $i++ ) {
	    if(isset($_FILES['image']['name'][$i]) && $_FILES['image']['size'][$i] > 0){
	    	$filename = $_FILES['image']['name'][$i];
	    	move_uploaded_file($_FILES['image']['tmp_name'][$i],'../../pictureofacc/'.$filename);
	    	$link=$filename."|".$link;
	    }
	}
}
if (!isset($_FILES['image'])) {
	$link = $_POST['oldImage'];
}


$sql="update acc
set
idGame = '$idGame',
username = '$username',
password = '$password',
level = '$level',
rank = '$rank',
price = '$price',
description = '$description',
picture = '$picture',
image ='$link'

where idAcc = '$idAcc'"
;

mysqli_query($connect, $sql);
mysqli_close($connect);

header("location:index.php?page=$page");

