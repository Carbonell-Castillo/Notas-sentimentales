<?php 
    require_once 'sesion.php';

    if($name === null || $code === null){
		header('Location: index.php');
	}
