<?php 
session_start();
session_destroy();
setcookie('idc','',time()-9669);
header('location: index.php');
?>