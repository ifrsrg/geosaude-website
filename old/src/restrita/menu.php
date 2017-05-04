<?php 
session_start();

if ($_SESSION['logged_in']) {
    $usuario = $_SESSION['usuario'];
}else{
    header('location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Geosaude Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style type="text/css">
            #preloader {
                text-decoration:blink;
                position: absolute;
            }
            #conteudo {
            }
        </style>
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/geosaude/restrita/">Geosaude - Area Restrita</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $_SESSION['usuario'] ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="perfil.php"><i class="fa fa-fw fa-gear"></i> Perfil</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="publicar.php"><i class="fa fa-fw fa-pencil"></i> Publicar</a>
                        </li>
                        <li>
                            <a href="usuarios.php"><i class="fa fa-fw fa-users"></i> Usuários</a>
                        </li>
                        <li>
                            <a href="noticias.php"><i class="fa fa-fw fa-newspaper-o"></i> Notícias</a>
                        </li>
                        <li>
                            <a href="downloads.php"><i class="fa fa-fw fa-download"></i> Downloads</a>
                        </li>
                        <li>
                            <a href="galeria.php"><i class="fa fa-fw fa-image"></i> Galeria</a>
                        </li>
                        <li>
                            <a href="equipe.php"><i class="fa fa-fw fa-users"></i> Equipe</a>
                        </li>

                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-cog"></i> Configurações <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="#">Funções - Em construção</a>
                                </li>

                                <li>
                                    <a href="#">Mapas - Em construção</a>
                                </li>
                                <li>
                                    <a href="info.php">Sobre o sistema</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>


<!--

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalDef">Definições</button>
                
                
                <div id="modalDef" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">PERFIL</h4>
                    </div>
                    <form method="post" class="form" enctype = "multipart/form-data">
                        <div class="form">
                            <input type="hidden" name="action" value="alterar">
                            <div class="form-group">
                                <label>Nome: </label>
                                <input class="form-control" type="text" name="titulo" required>
                            </div>
                            <div class="form-group">
                                <label>Autor: </label>
                                <input class="form-control" type="text" name="autor" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Resumo: </label>
                                <textarea name="descricao" rows="3" class="form-control" style="resize: none" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Salvar</button>
                        </form>
                    </div>
                </div>
-->