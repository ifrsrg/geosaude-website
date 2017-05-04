<?php 

require_once("persistencia/noticiaDAO.php");
$dao = new NoticiaDAO();
$noticias = null;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $noticias = $dao->selecionaTodos(); 
} 
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['action'] == 'alterar'){
        $dao->alteraTipo($_POST['tipo'], $_POST['_id']);
    }

    if ($_POST['action'] == 'deletar') {
        $dao->deleta($_POST['_id']);
    }

    header('location: noticias.php');
}
?>

<?php include "menu.php"; ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row">
            <?php while ($noticia = $noticias->fetch()): ?>
                <div class="col-lg-3">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <a href="geosaude/noticia.php?id=<?= $noticia->_id ?>" style="text-decoration: none;"><h3 class="panel-title"><i class="fa fa-plus"></i> <?= $noticia->titulo ?></a>
                            <form method="post" onsubmit="return confirm('Tem certeza que deseja excluir permanentemente <?= $noticia->titulo ?> de <?= $noticia->autor ?>?')" class="text-right">
                                <input type="hidden" name="action" value="deletar">
                                <input type="hidden" name="_id" value="<?= $noticia->_id ?>">
                                <button class="btn btn-link"><i class="fa fa-trash"></i> Remover</button>
                            </form>
                            </h3>
                            <div class="panel-footer" style="color: #323232">
                               <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart">
                                    <?= $noticia->descricao ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "footer.php"; ?>