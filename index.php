<?php 

	require_once 'app/login/sesion.php';

	if($name === null || $code === null){
		require_once 'login.html';
	}else{
		require_once 'home.php';
	}

?> 