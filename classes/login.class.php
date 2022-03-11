<?php
class Login{
	function __construct($pdo){
		$this->pdo = $pdo;
	}

	function verificaLogin(){
		try{
			if (isset($_POST['cpf']) and !empty($_POST['cpf'])) {
				$cpf = $_POST['cpf'];
			} else{
				throw new Exception("O campo cpf é obrigatório!", 1);
			}
			if (isset($_POST['senha']) and !empty($_POST['senha'])) {
				$senha = $_POST['senha'];
			} else{
				throw new Exception("O campo senha é obrigatório!", 1);
			}
			$verifica = $this->pdo->prepare("SELECT * FROM usuario WHERE cpf = :cpf AND senha = :senha");
			$verifica->bindValue(':cpf', $cpf);
			$verifica->bindValue(':senha', $senha);
			$verifica->execute();
			if ($verifica->rowcount() == 1){
				$usuario = $verifica->fetch(PDO::FETCH_OBJ);
				
				session_start();
				$idUsuario = $usuario->id;
				$_SESSION['usuario'] = $idUsuario;
				$_SESSION['logado'] = 'Logado';
				header('location:index.php');
			} else{
				throw new Exception( "<div class='alerta-erro'>
						<span class='btn-fechar' onclick='this.parentElement.style.display='none';'>
						&times;
						</span>
						Usuário e/ou senha incorreto!
						</div> ");
			}
		}catch(Exception $e){
			echo $e->getMessage();
		}
		
	}
}
?>