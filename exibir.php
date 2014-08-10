<?php session_start();?>
<?php require_once('header.php'); ?>
<?php
$link = mysqli_connect('localhost','root','','crud');
if(isset($_SESSION['usuario'])){
	echo '<p>Bem Vindo ' . $_SESSION['usuario'] . ' (<a href="sair.php">Sair</a>)</p>';
	require_once('menu.php');
	
	$query = "SELECT * FROM crud order by nome";
	$res = mysqli_query($link, $query);
	
	while($row = mysqli_fetch_array($res)){
		echo '<table border="1">';
		echo '<tr>';
		echo '<td>Nome: ' . $row['nome'] . '</td> ';
		echo '<td>Sobrenome: ' . $row['sobrenome'] . ' </td> ';
		echo '<td>Usuário: ' . $row['usuario'] . ' </td> ';
		echo "<td><a href='editar.php?&id=".$row['id']."'>Editar</a></td>";
		echo "<td><a href='deletar.php?&id=".$row['id']."'>Remover</a></td>";
		echo '</tr>';
		echo '</table><br/>';
	}
	mysqli_close($link);
}else {
	header('Location: index.php');
}
?>
<?php require_once('footer.php'); ?>