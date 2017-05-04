<?php

class DAO {

	protected $pdo;

	function __construct(){
		try{ 
			// $dbpath = getenv('dbpath'); // export dbpath=/home/developer/geosaude.db
			define('DB_PATH', $_SERVER['DOCUMENT_ROOT'] . '/geosaude.db');
			//echo DB_PATH;
			//echo "<br>";
			//echo __FILE__;
			$this->pdo = new PDO("sqlite:".DB_PATH);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch (PDOException $e){
			echo "Erro ao conectar: ".$e->getMessage();
		}
	}

	function exec($sql) {
		$this->pdo->exec($sql);
	}

}
