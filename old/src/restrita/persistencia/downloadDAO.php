<?php
require_once("DAO.php");

class DownloadDAO extends DAO {

	function seleciona($id){
		$stmt = $this->pdo->query("SELECT * FROM download WHERE _id = :id LIMIT 1");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$row = $stmt->fetch();
		return $row;
	}

	function selecionaTodos(){
		$stmt = $this->pdo->query("SELECT * FROM download");
		//SELECT * FROM download LEFT JOIN opcao ON download.id = opcao.download_id
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		return $stmt;
	}

	function insere($nome, $descricao, $link) {
		$stmt = $this->pdo->prepare('INSERT INTO download (nome, descricao, link) VALUES (:nome, :descricao, :link)');
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':descricao', $descricao);
		$stmt->bindParam(':link', $link);
		$stmt->execute();
	}

	function altera($nome, $descricao, $id) {
		$stmt = $this->pdo->prepare('UPDATE download SET nome = :nome, descricao = :descricao WHERE _id = :id');
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':descricao', $descricao);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

	function alteraTipo($tipo, $id) {
		$stmt = $this->pdo->prepare('UPDATE download SET tipo = :tipo WHERE _id = :id');
		$stmt->bindParam(':tipo', $tipo);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

	function deleta($id) {
		$stmt = $this->pdo->prepare('DELETE FROM download WHERE _id = :id');
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

}