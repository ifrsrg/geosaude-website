<?php
require_once("persistencia/galeriaDAO.php");
$dao = new GaleriaDAO();
$galeria = null;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $galeria = $dao->selecionaTodos(); 
} 
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'inserir') {
        $imagem = isset($_FILES["imagem"]) ? $_FILES["imagem"] : FALSE;
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
        $imagem_nome = uniqid(time()) . "." . $ext[1];
        $imagem_dir = "arquivos"; // coloque aqui apenas o nome do diretório
        $imagem_dir = $imagem_dir . "/" . $imagem_nome;
        move_uploaded_file ($imagem['tmp_name'], $imagem_dir);
        
        $dao->insere($imagem_nome, $imagem_dir);
    }

    else if ($_POST['action'] == 'deletar') {
        $dao->deleta($_POST['_id']);
    }

    header('location: galeria.php');
}
?>

<?php include "menu.php"; ?>
<style type="text/css">
    /* Esconde o input */
    input[type='file'] {
        display: none
    }

    /* Aparência que terá o seletor de imagem */
    label {
        cursor: pointer;
        margin: 10px;
        padding: 6px 20px
    }
</style>    
<div id="page-wrapper">

    <div class="container-fluid">
         <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Galeria
                    <form method="post" action="galeria.php" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="inserir">
                        <label for='seletor-imagem'><i class="fa fa-plus-square"></i></label>
                        <input type="file" name="imagem" id="seletor-imagem" onchange="this.form.submit()">
                    </form>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class='list-group gallery'>
        <?php while ($imagem = $galeria->fetch()): ?>

                <div class="col-lg-4 col-md-5 col-xs-7 thumb">
                    <a class="thumbnail box" rel="ligthbox" href="#" >
                        <img class="img-responsive img-box" alt="" src="<?=$imagem->diretorio?>" />
                        <div class='text-right'>
                            <form method="post" onsubmit="return confirm('Deseja realmente excluir <?=$imagem->filename?>?')">
                                <input type="hidden" name="action" value="deletar">
                                <input type="hidden" name="_id" value="<?=$imagem->_id?>">
                                <button class="btn btn-link"><small class='text-muted'><i class="fa fa-remove"></i></small></button>
                            </form>
                        </div> <!-- text-right / end -->
                    </a>
                </div>

            <?php endwhile ?>

        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
</div>
    <!-- /.container -->

<!-- modal images -->

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>


<!-- /modal -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- modal script -->
	<script type="text/javascript">
		$(function() {
		$('.box').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			//$('.altpreview').attr('value', $(this).find('img').attr('alt'));
			$('#imagemodal').modal('show');   
		});		
});
	</script>

<?php include "footer.php"; ?>  