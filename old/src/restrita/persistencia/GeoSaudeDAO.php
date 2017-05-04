<?php
require_once("DAO.php");

class GeoSaudeDAO extends DAO {

	function seleciona(){
		$stmt = $this->pdo->query("SELECT * FROM geosaude WHERE _id = 1 LIMIT 1");
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$row = $stmt->fetch();
		return $row;
	}

	function altera($nome, $coordenador, $resumo) {
		$stmt = $this->pdo->prepare('UPDATE geosaude  SET nome = ?, coordenador = ?, resumo = ? WHERE _id = 1');
		$stmt->execute(array($nome, $coordenador, $resumo));
	}

	function selecionaEstatisticas(){
		$stmt = $this->pdo->query("SELECT count(*) AS usuarios from usuario UNION ALL SELECT count(*) AS noticias FROM noticia UNION ALL SELECT count(*) AS downloads FROM download");
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$row = $stmt->fetch();
		return $row;
	}

	function selecionaEstatisticasNoticias(){
		$stmt = $this->pdo->query("SELECT count(*) AS noticias FROM noticia");
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$row = $stmt->fetch();
		return $row;
	}

	function selecionaEstatisticasDownloads(){
		$stmt = $this->pdo->query("SELECT count(*) AS downloads FROM download");
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$row = $stmt->fetch();
		return $row;
	}
	
	function selecionaEstatisticasGaleria(){
		$stmt = $this->pdo->query("SELECT count(*) AS imagens FROM imagem");
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		$row = $stmt->fetch();
		return $row;
	}


}
