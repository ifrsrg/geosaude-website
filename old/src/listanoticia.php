<?php

require_once("restrita/persistencia/noticiaDAO.php");
$dao = new NoticiaDAO();
$noticias = null;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //$noticiasNovas = $dao->selecionaNovas(3);
    $noticias = $dao->selecionaTodos(); 
} 

?>

<?php while($noticia = $noticias->fetch()): ?>
<div class="col-md-3">
  <img class="center-block" class="img-rounded" src="<?= $noticia->imagem ?>" alt="Imagem de projeto" width="200" height="140">
  <h2 class="text-center"><?= $noticia->titulo ?></h2>
  <p class="text-center" maxlength="220"><?= $noticia->resumo ?></p>
  <p class="text-center"><a class="btn btn-default" href="#" role="button">Leia mais</a></p>
</div>
<?php endwhile ?>