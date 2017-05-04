<?php

require_once("persistencia/GeoSaudeDAO.php");
$dao = new GeoSaudeDAO();
$geosaude = null;
$estatisticas = null;
//corrigir union all
$downloads = null;
$noticias = null;
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $geosaude = $dao->seleciona(); 
    $estatisticas = $dao->selecionaEstatisticas();
    //corrigir union all
    $noticias = $dao->selecionaEstatisticasNoticias();    
    $downloads = $dao->selecionaEstatisticasDownloads();
    $galeria = $dao->selecionaEstatisticasGaleria();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['action'] == 'alterar'){
        $dao->altera($_POST['nome'], $_POST['coordenador'], $_POST['resumo']);
    }

    header('location: index.php');
}
?>

<?php include "menu.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Página Inicial <small>Informações</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $estatisticas->usuarios ?></div>
                                <div>Usuários</div>
                            </div>
                        </div>
                    </div>
                    <a href="usuarios.php">
                        <div class="panel-footer">
                            <span class="pull-left">Acessar usuários</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-newspaper-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $noticias->noticias ?></div>
                                <div>Notícias</div>
                            </div>
                        </div>
                    </div>
                    <a href="noticias.php">
                        <div class="panel-footer">
                            <span class="pull-left">Acessar notícias</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-download fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $downloads->downloads ?></div>
                                <div>Downloads disponíveis</div>
                            </div>
                        </div>
                    </div>
                    <a href="downloads.php">
                        <div class="panel-footer">
                            <span class="pull-left">Acessar downloads</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-image fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $galeria->imagens ?></div>
                                <div>Galeria</div>
                            </div>
                        </div>
                    </div>
                    <a href="galeria.php">
                        <div class="panel-footer">
                            <span class="pull-left">Acessar galeria</span>
                            <span class="pull-right"><i class="fa fa-image"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <form action="index.php" method="post" class="form" onsubmit="return confirm('Tem certeza que deseja alterar estes dados?')">
                        <div class="form-group">
                            <label>Projeto</label>
                            <input class="form-control" name="nome" value="<?= $geosaude->nome ?>" placeholder="Nome de exibição">
                        </div>
                        <div class="form-group">
                            <label>Coordenador</label>
                            <input class="form-control" name="coordenador" value="<?= $geosaude->coordenador ?>" placeholder="Nome do coordenador">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control" name="resumo" rows="10" placeholder="Descrição ou resumo do programa"><?= $geosaude->resumo ?></textarea>
                        </div>
                        <input type="hidden" name="action" value="alterar">
                        <button class="btn btn-success" type="submit">Atualizar Dados</button>
                    </form>
                </ol>
            </div>
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php include "footer.php"; ?>