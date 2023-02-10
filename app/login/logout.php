<?php

	session_start();

	unset($_SESSION['code']);
	unset($_SESSION['name']);
	unset($_SESSION['avatar']);
	header('Location: ../../index.php');

?>
