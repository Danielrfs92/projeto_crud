<?php session_start();?>
<?php require_once('header.php'); ?>
<?php 
if(isset($_SESSION['usuario'])){
	echo '<p>Bem Vindo ' . $_SESSION['usuario'] . ' (<a href="sair.php">Sair</a>)</p>';
	require_once('menu.php');
	echo '<p>Você está na tela principal do projeto</p>';
}else {
?>
<hr/>
<div class="conteudo" >
	<p>Você está na tela principal do projeto</p>
	<p>Você pode <a href="logar.php">Logar-se</a> ou <a href="cadastrar.php">Cadastrar-se</a></p>
</div>
<?php 
} 
?>
<?php require_once('footer.php'); ?>