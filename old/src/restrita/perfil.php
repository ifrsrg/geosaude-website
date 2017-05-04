<?php

require_once("persistencia/usuarioDAO.php");
$dao = new UsuarioDAO();
$perfil = null;
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $perfil = $dao->seleciona($_SESSION['usuario_id']); 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['action'] == 'alterar'){
        $dao->altera($_POST['nome'], $_POST['descricao'], $_POST['curriculo'], $_POST['login'], $_POST['senha'], $_POST['tipo'], $_SESSION['usuario_id']);
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

        
        <!-- Page Body -->
        <div class="row">
            <!-- Ddos -->
            <div class="col-lg-6">
                <ol class="breadcrumb">
                    <form method="post" class="form" onsubmit="return confirm('Tem certeza que deseja alterar estes dados?')">
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" type="text" name="nome" value="<?= $perfil->nome ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Currículo Lattes</label>
                            <input class="form-control" type="text" name="curriculo" placeholder="Link lattes" value="<?= $perfil->curriculo ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea required name="descricao" rows="3" class="form-control"> <?= $perfil->descricao ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label>Login</label>
                            <input class="form-control" type="text" name="login" value="<?= $perfil->login ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nova senha</label>
                            <input class="form-control" type="password" name="senha" required>
                        </div>
                        <div class="form-group">
                            <label>Confirme a Senha</label>
                            <input class="form-control" type="password" name="confirmasenha" required>
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