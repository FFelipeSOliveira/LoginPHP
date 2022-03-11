<?php
include 'classes/conexao.class.php';
include 'classes/usuarios.class.php';

$conexao = new Conexao();
$pdo = $conexao->conectar();

$usuarios = new Usuario($pdo);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilo.forms.css">
	<link rel="shortcut icon" href="img/fav.ico">
	<title>Cadastro</title>
</head>
<body>
	<div class="login-container cad-container">
		<h2>Cadastro</h2>
		<?php 
			if (isset($_POST['cadUsuario'])){
				$usuarios->inserirUsuario();
			}
		?>
		<form action="" method="post">
			<div class="ent-dados">
				<input type="text" name="cpf" id="cpf" required>
				<label>CPF</label>
			</div>
			<div class="ent-dados">
				<input type="text" name="nome" id="nome" required>
				<label>Nome</label>
			</div>
			<div class="ent-dados">
				<input type="text" name="telefone" id="telefone" required>
				<label>Telefone</label>
			</div>
			<div class="ent-dados">
				<input type="password" name="senha" id="senha" required>
				<label>Senha</label>
			</div>
			<button type="submit" name="cadUsuario">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				CADASTRAR
			</button>
			<h4 class="registro">Já tem uma conta? <a href="login.php">LOGIN</a></h4>
		</form>
	</div>
</body>
<!-- Máscaras inputs -->
<script type="text/javascript" src="js/jquery.3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script type="text/javascript" src="js/mascarafunc.js"></script>
<script type="text/javascript">
	mascara()
</script>
</html>