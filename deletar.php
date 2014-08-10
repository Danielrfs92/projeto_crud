<?php require_once('header.php'); ?>

<?php 
$link = mysqli_connect('localhost','root','','crud');

$id = mysqli_real_escape_string($link, trim($_GET['id']));
$query = "DELETE FROM crud WHERE id = '$id'";
if(mysqli_query($link, $query)){
	echo '<p>Deletado com sucesso!</p>';
	echo '<p><a href="exibir.php">Voltar</a></p>';
}else{
	echo mysqli_error();
}
mysqli_close($link);
?>

<?php require_once('footer.php'); ?>




