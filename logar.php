<?php require_once('header.php'); ?>
<?php 
session_start();


	if(isset($_POST['submit'])){ //Se o formulario for submetido
		$link = mysqli_connect('localhost','root','','crud');
		$usuario = mysqli_real_escape_string($link, trim($_POST['usuario']));
		$senha = mysqli_real_escape_string($link, trim($_POST['senha']));
		if(!empty($usuario) && !empty($senha)){
			//Procura no banco usuario e senha digitados
			$query = "SELECT id, usuario FROM crud WHERE usuario = '$usuario' AND senha = SHA('$senha')";
			$pesquisa = mysqli_query($link, $query);
			//Se verdadeiro é pq existe um registro
			if(mysqli_num_rows($pesquisa) == 1){
				$row = mysqli_fetch_array($pesquisa);
				//Setar sessoes
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['usuario'] = $row['usuario'];
				//Setar cookies com duração de 30 dias
				setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30);
				setcookie('usuario', $row['usuario'], time() + 60 * 60 * 24 * 30);
				echo 'Bem Vindo ' . $_SESSION['usuario'];
				header('Location: index.php');
			}else {
				echo 'Usuário ou Senha invalido';
			}
		}else{
			echo 'Desculpe, mas você deve preencher os campos para entrar';
		}
	}








?>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	<fieldset id="fieldset_login">
		<legend>Entrar</legend>
			<label>Usuário: 
				<input type="text" id="usuario" name="usuario" value="<?php echo $usuario ?>"/>
			</label><br/>
			<label>Senha 
				<input type="password" id="senha" name="senha" />
			</label>
	</fieldset>
	<input type="submit" name="submit" value="Entrar" />
</form>
<p>Não tem cadastro? <a href="cadastrar.php" >Registre-se</a></p>

<?php  require_once('footer.php'); ?>