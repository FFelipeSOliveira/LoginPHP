<?php
	class Conexao{	
		function conectar(){
			try{
				$pdo = new PDO("mysql: host=localhost; dbname=usuarios", 'root', '');
				$pdo->exec("set names utf-8");
				return $pdo;
			} catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}
?>