<?php 

require_once("persistencia/noticiaDAO.php");
$dao = new NoticiaDAO();
$noticia = null;
$action = null;

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['noticia'])){
        $noticia = $dao->seleciona($_GET['noticia']); 
        $action = 'alterar';
    }else{
        $action = 'inserir';
    }
} 

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'inserir') {
        
        //upload 
        $arquivo = isset($_FILES["imagem"]) ? $_FILES["imagem"] : FALSE;
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);
        $imagem_nome = uniqid(time()) . "." . $ext[1];
        $imagem_dir = "arquivos"; // coloque aqui apenas o nome do diretório
        $imagem_dir = $imagem_dir . "/" . $imagem_nome;
        move_uploaded_file ($arquivo['tmp_name'], $imagem_dir);
        
        //inserir no banco
        $dao->insere($_POST['titulo'], $_POST['descricao'], $_POST['corpo'], $_POST['autor'], $imagem_dir, $_SESSION['usuario_id']);
    }

    if ($_POST['action'] == 'alterar'){
        $dao->altera($_POST['titulo'], $_POST['descricao'], $_POST['corpo'], $_POST['autor'], $_SESSION['usuario_id'], $_POST['_id']);
    }

    header('location: publicar.php');
}
?>

<?php include "menu.php"; ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>Defina título, autor e outras propriedades nas </small>
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalDef">Definições</button>
                </h1>
                <!-- Modal -->
                <div id="modalDef" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Propriedades</h4>
                    </div>
                    <form action="publicar.php" method="post" class="form" enctype = "multipart/form-data">
                        <div class="form" style="margin: 1%;">
                            <input type="hidden" name="action" value="inserir">
                            <div class="form-group">
                                <label>Titulo: </label>
                                <input class="form-control" type="text" name="titulo" required>
                            </div>
                            <div class="form-group">
                                <label>Capa: </label>
                                <input type="file" name="imagem" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Autor: </label>
                                <input class="form-control" type="text" name="autor" value="<?= $_SESSION['usuario'] ?>" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Resumo: </label>
                                <textarea name="descricao" rows="3" class="form-control" style="resize: none" required></textarea>
                            </div>
                            <button type="button" class="btn btn-default">Fechar</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<!-- Usuários -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-green" onload="hello()">
            <div class="panel-body">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-line-chart">
                        <div id="preloader" class="text-muted"><h3>Carregando editor...</h3></div>
                        <div id="conteudo">
                            <textarea id="textareaEditor" name="corpo"></textarea>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Publicar</button>    
                            </div>
                            
                        </div>
                        </form>
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
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script type="text/javascript">
    //Editor Tiny
    tinymce.init({
      selector: 'textarea#textareaEditor',
      language: 'pt_BR',
      language_url: 'http://localhost/restrita/langs/pt_BR.js',
      height: 300,
      menubar: false,
      plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table contextmenu paste code',
      'save autosave'
      ],
      toolbar: ' insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link  | preview',
  });
</script>


</div>
</div>


<?php include "footer.php"; ?>
