<?php
require_once("DAO.php");
/*
SELECT *,
       CASE WHEN field IS NOT NULL
       THEN 'Yes'
       ELSE 'No'
       END AS fieldPresent
FROM myTable
*/
class UsuarioDAO extends DAO {

	function seleciona($id){
		$stmt = $this->pdo->query("SELECT * FROM usuario WHERE _id = :id LIMIT 1");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$row = $stmt->fetch();
		return $row;
	}

	function selecionaTodos(){
		$stmt = $this->pdo->query("SELECT usuario._id, usuario.nome, usuario.descricao, usuario.curriculo, usuario.login, usuario.tipo, count(noticia.titulo) AS publicacoes FROM usuario LEFT JOIN noticia ON usuario._id = noticia.usuario_id GROUP BY usuario.nome; ORDER BY usuario.nome");
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		return $stmt;
	}

	function autentica($login, $senha){
		$stmt = $this->pdo->query("SELECT * FROM usuario WHERE login = :login AND senha = :senha LIMIT 1");
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':senha', md5($senha));
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$row = $stmt->fetch();
		return $row;
	}

	function insere($nome, $descricao, $curriculo, $login, $senha, $tipo) {
		$stmt = $this->pdo->prepare('INSERT INTO usuario (nome, descricao, curriculo, login, senha, tipo) VALUES (:nome, :descricao, :curriculo, :login, :senha, :tipo)');
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':descricao', $descricao);
		$stmt->bindParam(':curriculo', $curriculo);
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':senha', md5($senha));
		$stmt->bindParam(':tipo', $tipo);
		$stmt->execute();
	}

	function altera($nome, $descricao, $curriculo, $login, $senha, $id) {
		$stmt = $this->pdo->prepare('UPDATE usuario SET nome = :nome, descricao = :descricao, curriculo = :curriculo, login = :login, senha = :senha WHERE _id = :id');
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':descricao', $descricao);
		$stmt->bindParam(':curriculo', $curriculo);
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':senha', md5($senha));
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

	function alteraTipo($tipo, $id) {
		$stmt = $this->pdo->prepare('UPDATE usuario SET tipo = :tipo WHERE _id = :id');
		$stmt->bindParam(':tipo', $tipo);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

	function deleta($id) {
		$stmt = $this->pdo->prepare('DELETE FROM usuario WHERE _id = :id');
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

}