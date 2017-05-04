<?php
include_once("persistencia/DAO.php");
   // no terminal export banco="geosaude.db"
   // echo getenv("banco");

   /*
   http://www.tutorialspoint.com/sqlite/sqlite_injection.htm
   chamada da conexao:
   */
   // $db = new SQLite3('geosaude.db');
   // if(!$db){
   //    echo "Erro: Nao foi possível criar ou estabelecer a conexao o banco de dados.<br/>";
   // }else{
   //    echo "Conexao com banco de dados estabelecida.<br/>";
   // }

   $scripts = array();

   if ($_GET['acao'] == 'drop') {
      $scripts[] = "DROP TABLE IF EXISTS usuario;";
      $scripts[] = "DROP TABLE IF EXISTS imagem;";
      $scripts[] = "DROP TABLE IF EXISTS geosaude;";
      $scripts[] = "DROP TABLE IF EXISTS noticia;";
      $scripts[] = "DROP TABLE IF EXISTS download;";
      $scripts[] = "DROP TABLE IF EXISTS opcao;";
   }

   if ($_GET['acao'] == 'create') {
$scripts[] = <<<EOF
   CREATE TABLE usuario (
      _id INTEGER PRIMARY KEY AUTOINCREMENT,
      nome TEXT,
      descricao TEXT,
      curriculo CHAR(128),
      login CHAR(128) UNIQUE NOT NULL,
      senha CHAR(128) NOT NULL,
      tipo INT NOT NULL
   );
EOF;

$scripts[] = <<<EOF
   
   CREATE TABLE imagem(
      _id INTEGER PRIMARY KEY AUTOINCREMENT,
      filename TEXT,
      diretorio TEXT
   );
EOF;

$scripts[] = <<<EOF
   
   CREATE TABLE geosaude(
      _id INTEGER PRIMARY KEY AUTOINCREMENT,
      nome CHAR(50),
      resumo TEXT,
      descricao CHAR(500),
      coordenador CHAR(200)
   );
EOF;

$scripts[] = <<<EOF
   CREATE TABLE noticia(
      _id INTEGER PRIMARY KEY AUTOINCREMENT,
      titulo CHAR(100) NOT NULL,
      descricao CHAR(500),
      corpo TEXT NOT NULL,
      autor CHAR(100),
      datahora TIMESTAMP WITHOUT TIMEZONE NOT NULL,
      imagem TEXT,
      usuario_id INT NOT NULL,
      FOREIGN KEY(usuario_id) REFERENCES usuario(id)
   );
EOF;

$scripts[] = <<<EOF
   CREATE TABLE download(
     _id INTEGER PRIMARY KEY AUTOINCREMENT,
      nome CHAR(120) NOT NULL,
      descricao TEXT,
      link TEXT NOT NULL
   );
EOF;

$scripts[] = <<<EOF
   CREATE TABLE opcao(
      _id INTEGER PRIMARY KEY AUTOINCREMENT,
      provedor CHAR(100) NOT NULL,
      link text NOT NULL
   );
EOF;

$scripts[] = "INSERT INTO geosaude (nome, coordenador) VALUES ('GeoSaúde - IFRS', 'Carol');";
$scripts[] = "INSERT INTO usuario (nome, descricao, curriculo, login, senha, tipo) VALUES ('Administrador', 'Administrador do sistema', 'não possui', 'admin', '".md5('admin')."', 1);";

   }

var_dump($scripts);
echo "<br/><br/>Finalizado.";

$dao = new DAO();

foreach ($scripts as $script) {
   // $db->exec($script);
   $dao->exec($script);
}

?>
