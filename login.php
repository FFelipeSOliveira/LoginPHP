<?php 
include 'classes/conexao.class.php';
include 'classes/login.class.php';
$conexao = new Conexao();
$pdo = $conexao->conectar();

$login = new Login($pdo);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilo.forms.css">
	<link rel="shortcut icon" href="img/fav.ico">
	<title>Login</title>
</head>
<body>
	<div class="login-container">
		<h2>Login</h2>
		<?php 
		if (isset($_POST['logar'])) {
			$login->verificaLogin();
		}
		?>
		<form action="" method="post">
			<div class="ent-dados">
				<input type="text" name="cpf" id="cpf" required>
				<label>CPF</label>
			</div>
			<div class="ent-dados">
				<input type="password" name="senha" required>
				<label>Senha</label>
			</div>
			<button type="submit" name="logar">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				ENTRAR
			</button>
			<h4 class="registro">Não tem uma conta? <a href="registro.php">REGISTRE-SE</a></h4>
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