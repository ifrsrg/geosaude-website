<?php
require_once("DAO.php");

class NoticiaDAO extends DAO {

	function seleciona($id){
		$stmt = $this->pdo->query("SELECT * FROM noticia WHERE _id = :id LIMIT 1");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		return $stmt;
	}

	function selecionaNovas($limite){
		$stmt = $this->pdo->query("SELECT * FROM noticia ORDER BY datahora DESC LIMIT :limite");
		$stmt->bindParam(':limite', $limite);
		$stmt->execute();
		//SELECT * FROM noticia LEFT JOIN imagem ON noticia._id = imagem.noticia_id
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		return $stmt;
	}

	function selecionaTodos(){
		$stmt = $this->pdo->query("SELECT * FROM noticia ORDER BY datahora DESC");
		//SELECT * FROM noticia LEFT JOIN imagem ON noticia._id = imagem.noticia_id
		$stmt->setFetchMode(PDO::FETCH_OBJ);
		return $stmt;
	}

	function insere($titulo, $descricao, $corpo, $autor, $imagem, $usuario_id) {
		$stmt = $this->pdo->prepare('INSERT INTO noticia (titulo, descricao, corpo, imagem, autor, usuario_id, datahora) VALUES (:titulo, :descricao, :corpo, :imagem, :autor, :usuario_id, datetime())');
		$stmt->bindParam(':titulo', $titulo);
		$stmt->bindParam(':descricao', $descricao);
		$stmt->bindParam(':corpo', $corpo);
		$stmt->bindParam(':autor', $autor);
		$stmt->bindParam(':imagem', $imagem);
		$stmt->bindParam(':usuario_id', $usuario_id);
		$stmt->execute();
	}

	function altera($titulo, $descricao, $corpo, $autor, $usuario_id, $id) {
		$stmt = $this->pdo->prepare('UPDATE noticia SET titulo = :titulo, descricao = :descricao, corpo = :corpo, autor = :autor, usuario_id = md5(:usuario_id) WHERE _id = :id');
		$stmt->bindParam(':titulo', $titulo);
		$stmt->bindParam(':descricao', $descricao);
		$stmt->bindParam(':corpo', $corpo);
		$stmt->bindParam(':autor', $autor);
		$stmt->bindParam(':usuario_id', $usuario_id);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

	function deleta($id) {
		$stmt = $this->pdo->prepare('DELETE FROM noticia WHERE _id = :id');
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

}