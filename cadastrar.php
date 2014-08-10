<?php require_once('header.php'); ?>
<?php 
$link = mysqli_connect('localhost','root','','crud')
or die('Erro ao se conectar ao banco de dados');

if($_POST['submit']){
$usuario = mysqli_real_escape_string($link, trim($_POST['usuario']));
$nome = mysqli_real_escape_string($link, trim($_POST['nome']));
$sobrenome = mysqli_real_escape_string($link, trim($_POST['sobrenome']));
$senha1 = mysqli_real_escape_string($link, trim($_POST['senha1']));
$senha2 = mysqli_real_escape_string($link, trim($_POST['senha2']));

	if(!empty($usuario) && !empty($nome) && !empty($sobrenome) && !empty($senha1) && !empty($senha2)){
		if($senha1 == $senha2){
			$queryusuario = "SELECT * FROM crud WHERE usuario = '$usuario'";
			$testeusuario = mysqli_query($link, $queryusuario);
			if(mysqli_num_rows($testeusuario) == 0){
				$query = "INSERT INTO crud (nome, sobrenome, usuario, senha) VALUES ('$nome','$sobrenome','$usuario',SHA('$senha1'))";
				mysqli_query($link, $query);
				mysqli_close($link);
				exit('<p>Sua nova conta foi criada com sucesso.</p><br/>
					<p>Você está pronto para <a href="logar.php">Logar-se</a>.</p>');
			}else {
				echo 'Desculpe, mas ja existe um usuário com esse nome, tente outro por favor.';
			}
		}else {
			echo 'Desculpe, mas as senhas não conferem, elas devem ser iguais.';
		}
	}else {
		echo 'Desculpe, mas você deixou algum campo vazio.';
	}
}
?>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	<fieldset id="fieldset_cadastro">
		<legend>Cadastrar-se</legend>
			<label>Usuário: 
				<input type="text" id="usuario" name="usuario" value="<?php echo $usuario ?>" />
			</label><br/>
			<label>Nome: 
				<input type="text" id="nome" name="nome" value="<?php echo $nome ?>" />
			</label><br/>
			<label>Sobrenome: 
				<input type="text" id="sobrenome" name="sobrenome" value="<?php echo $sobrenome ?>" />
			</label><br/>
			<label>Senha 
				<input type="password" id="senha1" name="senha1" />
			</label><br/>
			<label>Repetir Senha 
				<input type="password" id="senha2" name="senha2" />
			</label><br/>
	</fieldset>
	<input type="submit" name="submit" value="Entrar" />
</form>

<?php require_once('footer.php'); ?>