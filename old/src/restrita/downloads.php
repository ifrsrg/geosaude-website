<?php 

require_once("persistencia/downloadDAO.php");
$dao = new DownloadDAO();
$downloads = null;

function upload(){
    $arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;
    preg_match("/\.(gif|bmp|png|jpg|jpeg|doc|docx|pdf|txt|ppt|pptx|odf){1}$/i", $arquivo["name"], $ext);
    $arquivo_nome = uniqid(time()) . "." . $ext[1];
    $arquivo_dir = "downloads"; // coloque aqui apenas o nome do diretório
    $arquivo_dir = $arquivo_dir . "/" . $arquivo_nome;
    move_uploaded_file ($arquivo['tmp_name'], $arquivo_dir);
    return $arquivo_dir;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $downloads = $dao->selecionaTodos(); 
} 
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'inserir') {
        $dao->insere($_POST['nome'], $_POST['descricao'], upload());
    }

    if ($_POST['action'] == 'alterar'){
        $dao->altera($_POST['nome'], $_POST['descricao'], $_POST['_id']);
    }

    if ($_POST['action'] == 'deletar') {
        $dao->deleta($_POST['_id']);
    }

    header('location: downloads.php');
}
?>

<?php include "menu.php"; ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Downloads
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalInserir">Adicionar</button>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Downloads -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-users"></i> Downloads cadastrados</h3>
                    </div>
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-line-chart">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Link/Provedor</th>
                                            <th>Descrição</th>
                                            <th>Alterar</th>
                                            <th>Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($download = $downloads->fetch()): ?>
                                            <tr>
                                                <form action="downloads.php" method="post" onsubmit="return confirm('Deseja realmente alterar <?= $download->nome ?>?')"">
                                                <input type="hidden" name="_id" value="<?= $download->_id ?>">
                                                <input type="hidden" name="action" value="alterar">
                                                <td><input type="text" name="nome" value="<?= $download->nome ?>" required></td>
                                                <td>
                                                    <a href="http://localhost/geosaude/restrita/<?= $download->link ?>" target=""><?= $download->nome ?></a>
                                                    <!--<input type="file" name="arquivo">-->
                                                </td>
                                                <td>
                                                    <textarea name="descricao"><?= $download->descricao ?></textarea>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-link"><span class="fa fa-edit"></span></button>
                                                </td>
                                                </form>
                                                <td>
                                                    <form action="downloads.php" method="post" onsubmit="return confirm('Deseja realmente excluir <?= $download->nome ?>?')">
                                                        <input type="hidden" name="action" value="deletar">
                                                        <input type="hidden" name="_id" value="<?= $download->_id ?>">
                                                        <button class="btn btn-link"><i class="fa fa-remove"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<!-- Modal -->
<div id="modalInserir" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cadastrar novo usuário</h4>
    </div>
    <form action="downloads.php" method="post" class="form" enctype="multipart/form-data">
      <div class="modal-body">
        <input type="hidden" name="action" value="inserir">
        <div class="form-group">
            <label>Nome</label>
            <input class="form-control" type="text" name="nome" required>
        </div>
        <div class="form-group">
            <label>Link/Provedor</label>
            <input class="form-control" type="file" name="arquivo" required>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea required name="descricao" rows="3" class="form-control"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
</div>

</div>
</div>
<?php include "footer.php"; ?>