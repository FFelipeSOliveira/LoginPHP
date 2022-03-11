<?php 
include 'classes/conexao.class.php';
include 'classes/usuarios.class.php'; 
$conexao = new Conexao();
$pdo = $conexao->conectar();
session_start();
$idUsuario = $_SESSION['usuario'];
if (!isset($_SESSION['logado'])) {
	header('location:login.php');
}
$acao = (isset($_REQUEST['acao'])?$_REQUEST['acao']:null);
if ($acao == 'sair') {
	session_destroy();
	header('location:login.php');
}

$usuario = new Usuario($pdo);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilo.index.css">
	<link rel="shortcut icon" href="img/fav.ico">
	<title>Inicial</title>
</head>
<body>
	<?php
	if ($usuario->listarDadosUsuario($idUsuario) != null){
		foreach ($usuario->listarDadosUsuario($idUsuario) as $dados) {
	?>
	<div class="menu">
		<a href="?acao=sair">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			SAIR
		</a>
		<?php echo "<h2>Bem vindo, $dados->nome.</h2>";?>
	</div>
	<div class="card-central">
		<h3>Informações do usuário</h3>
		<h5>Nome: <?php echo $dados->nome;?></h5>
		<h5>Telefone: <?php echo $dados->telefone;?></h5>
		<h5>CPF: <?php echo $dados->cpf;?></h5>
	</div>
	<?php
		}
	}else{
		echo "Dados não encontrados :(";
	}
	?>
</body>
</html>