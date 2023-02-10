<?php

	session_start();

	require_once '../db.php';

	$user = trim($_POST['user']);
	$password = trim($_POST['password']);

	$searchUser->execute([
		'userr' => $user,
		'passwordd' => $password
	]);

	if($searchUser->rowCount()>0){

	
	foreach($searchUser as $row):

		if($user === $row['email'] && $password === $row['contraseña'] || $user === $row['usuario'] && $password === $row['contraseña']){

			$_SESSION['code'] = $row['id'];
            $_SESSION['name']=$row['nombre'];
			 $_SESSION['avatar']=$row['avatar'];
			echo 'mal';
			header('Location: ../../index.php');

		}else{
			header('Location: ../../login.html');
		}

	endforeach;
}else{
	echo '1ui';
	header('Location: ../../login.html');
}