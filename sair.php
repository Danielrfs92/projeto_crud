<?php 
session_start();
if(isset($_SESSION['usuario'])){
	$_SESSION = array();
	session_destroy();
}
if(isset($_COOKIE['usuario'])){
	setcookie('user_id', '', time() - 3600);
	setcookie('usuario', '', time() - 3600 );
}
header('Location: index.php');
?>