<?php 
//muốn làm việc với session trước tiên phải start
session_start();
session_destroy();
setcookie('idc','',time()-9669);
header('location: index.php');
?>