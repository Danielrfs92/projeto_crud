<?php require_once('header.php'); ?>
<?php 
$link = mysqli_connect('localhost','root','','crud');
$id = mysqli_real_escape_string($link, trim($_POST['id']));
$nome = mysqli_real_escape_string($link, trim($_POST['nome']));
$sobrenome = mysqli_real_escape_string($link, trim($_POST['sobrenome']));
$senha = mysqli_real_escape_string($link, trim($_POST['senha']));

$query = "UPDATE crud set nome = '$nome', sobrenome = '$sobrenome', senha = SHA('$senha') WHERE id = '$id'";

if(mysqli_query($link, $query)){
	mysqli_close($link);
	echo '<p>Editado com sucesso!</p>';
	echo '<p><a href="exibir.php">Voltar</a></p>';
	
}else {
	echo mysqli_error();
	exit();
}

?>

<?php require_once('footer.php'); ?>
