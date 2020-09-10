<?php 

$username 			= $_POST['userName'];
$password 			= $_POST['password'];
$idGame 			= $_POST['idGame'];
$level 				= $_POST['level'];
$rank 				= $_POST['rank'];
$description 		= $_POST['description'];
$price 				= $_POST['price'];	

$picture 			= $_FILES['picture'];
$array    			= explode('/', $picture['type']);
$file_type 			= $array[1];
$pictureName   		= strtotime("now").".$file_type";
$target_dir 		= "../../pictureofacc/";
$target_file 		= $target_dir . $pictureName;
move_uploaded_file($picture["tmp_name"], $target_file);

$link="";
if(isset($_FILES['image']['name'])) {
	$total_files = count($_FILES['image']['name']);
	for( $i=0 ; $i < $total_files ; $i++ ) {
	    if(isset($_FILES['image']['name'][$i]) && $_FILES['image']['size'][$i] > 0){
	    	$filename = $_FILES['image']['name'][$i];
	    	move_uploaded_file($_FILES['image']['tmp_name'][$i],'../../pictureofacc/'.$filename);
	    	$link=$filename."|".$link;
	    }
	}
}

require_once '../../connect.php';


$sql = "insert into acc(idGame, username, password, level, rank, description, picture, price, image)
values ( '$idGame','$username', '$password','$level','$rank','$description','$pictureName','$price', '$link')"; 
mysqli_query($connect,$sql);
header('location:index.php?page=1');
mysqli_close($connect);
