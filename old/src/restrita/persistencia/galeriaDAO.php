<?php
require_once("DAO.php");

class GaleriaDAO extends DAO {

	function seleciona($id){
		$stmt = $this->pdo->query("SELECT * FROM imagem WHERE _id = :id LIMIT 1");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$row = $stmt->fetch();
		return $row;
	}

	function selecionaTodos(){
		$stmt = $this->pdo->query("SELECT * FROM imagem");
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		return $stmt;
	}

	function insere($filename, $diretorio) {
		$stmt = $this->pdo->prepare('INSERT INTO imagem (filename, diretorio) VALUES (:filename, :diretorio)');
		$stmt->bindParam(':filename', $filename);
		$stmt->bindParam(':diretorio', $diretorio);
		$stmt->execute();
	}

	function deleta($id) {
		$stmt = $this->pdo->prepare('DELETE FROM imagem WHERE _id = :id');
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

}