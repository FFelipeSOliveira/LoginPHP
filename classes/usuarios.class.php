<?php
class Usuario{
	function __construct($pdo){
		$this->pdo = $pdo;
	}

	function inserirUsuario(){
		try{
			if (isset($_POST['cpf']) and !empty($_POST['cpf'])){
				$cpf = $_POST['cpf'];
			} else{
				throw new Exception("Campo cpf vazio!", 1);
			}
			if (isset($_POST['nome']) and !empty($_POST['nome'])){
				$nome = $_POST['nome'];
			} else{
				throw new Exception("Campo nome vazio!", 2);
			}
			if (isset($_POST['telefone']) and !empty($_POST['telefone'])){
				$telefone = $_POST['telefone'];
			} else{
				throw new Exception("Campo telefone vazio!", 3);
			}
			if (isset($_POST['senha']) and !empty($_POST['senha'])){
				$senha = $_POST['senha'];
			} else{
				throw new Exception("Campo senha vazio!", 4);
			}

			$vrfCpf = $this->pdo->prepare("SELECT * FROM usuario WHERE cpf = :cpf");
			$vrfCpf->bindValue(':cpf', $cpf);
			$vrfCpf->execute();
			if ($vrfCpf->rowcount() >= 1) {
				echo "<div class='alerta-erro'>
						<span class='btn-fechar' onclick='this.parentElement.style.display='none';'>
						&times;
						</span>
						Este cpf já está cadastrado!
						</div> ";
			} else{
				$cadastrar = $this->pdo->prepare("INSERT INTO usuario (nome, cpf, telefone, senha) VALUES (:nome, :cpf, :telefone, :senha)");
				$cadastrar->bindValue(':nome', $nome);
				$cadastrar->bindValue(':cpf', $cpf);
				$cadastrar->bindValue(':telefone', $telefone);
				$cadastrar->bindValue(':senha', $senha);
				if($cadastrar->execute()){
					echo "<div class='alerta'>
						<span class='btn-fechar' onclick='this.parentElement.style.display='none';'>
						&times;
						</span>
						Sucesso ao inserir usuário!
						</div> ";
				} else{
					echo "<p>Erro ao realizar operação com banco de dados!</p>";
				}
			}	
		} catch(Exception $e){
			echo "<p>Erro: ".$e->getMessage()."</p>";			
		}	
	}

	function listarDadosUsuario($idUsuario){
		$dados = $this->pdo->prepare("SELECT * FROM usuario WHERE id = :id");
		$dados->bindValue(":id", $idUsuario);
		$dados->execute();
		if ($dados->rowcount() > 0) {
			return $dados->fetchAll(PDO::FETCH_OBJ);
		}else{
			return null;
		}
	}
}
?>