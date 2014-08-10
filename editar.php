<?php
$link = mysqli_connect('localhost','root','','crud');

$id = mysqli_real_escape_string($link, trim($_GET['id']));
$query = "SELECT * FROM crud WHERE id = '$id'";
$res = mysqli_query($link, $query);
$row = mysqli_fetch_array($res);
?>
<form method="post" action="update.php" />
<fieldset>
	<legend>Editar</legend>
		<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
		<label>Nome:
			<input type="text" name="nome" value=" <?php echo $row['nome']; ?>" />
		</label><br/>
		<label>Sobrenome:
			<input type="text" name="sobrenome" value="<?php echo $row['sobrenome']; ?>" />
		</label><br/>
		<label>Senha:
			<input type="password" name="senha"/>
		</label><br/>
	</legend>
</fieldset>
<input type="submit" name="submit" value="Editar" />
</form>