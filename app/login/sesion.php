<?php 

	session_start();

	$code = null;
	$name=null;
	$avatar=null;
	if(isset($_SESSION['code']) and isset($_SESSION['name'])and isset($_SESSION['avatar'])){
		$code = $_SESSION['code'];
		$name = $_SESSION['name'];
		$avatar = $_SESSION['avatar'];
	} 
?>

