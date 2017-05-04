<?php 

require_once("persistencia/usuarioDAO.php");
$dao = new UsuarioDAO();
$usuarios = null;

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $usuarios = $dao->selecionaTodos(); 
} 
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'inserir') {
        $dao->insere($_POST['nome'], $_POST['descricao'], $_POST['curriculo'], $_POST['login'], $_POST['login'], $_POST['tipo']);
    }

    if ($_POST['action'] == 'alterar'){
        $dao->alteraTipo($_POST['tipo'], $_POST['_id']);
    }

    if ($_POST['action'] == 'deletar') {
        $dao->deleta($_POST['_id']);
    }

    header('location: usuarios.php');
}
?>

<?php include "menu.php"; ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Usuários
                    <?php if ($_SESSION['admin']): ?>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalInserir">Adicionar</button>
                    <?php endif ?>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Usuários -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-users"></i> Usuários cadastrados</h3>
                    </div>
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-line-chart">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Currículo</th>
                                            <th>Publicações</th>
                                            <?php if ($_SESSION['admin']): ?>
                                                <th>Alterar</th>
                                                <th>Excluir</th>
                                            <?php endif ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($usuario = $usuarios->fetch()): ?>
                                            <tr>
                                                <td><?= $usuario->nome ?></td>
                                                <td><a href="<?= $usuario->curriculo ?>" target="_blank">Acessar lattes</a></td>
                                                <td><?= $usuario->publicacoes ?></td>
                                                <?php if ($_SESSION['admin']): ?>
                                                    <td>
                                                        <form action="usuarios.php" method="post" onsubmit="return confirm('Deseja realmente alterar as perimissões do usuário <?= $usuario->nome ?>?')">
                                                            <input type="hidden" name="_id" value="<?= $usuario->_id ?>">
                                                            <input type="hidden" name="action" value="alterar">
                                                            <select name="tipo" onchange="this.form.submit();">
                                                                <option <?= $usuario->tipo=='2'? 'selected="selected"':'';?> value="2">Bolsista</option>
                                                                <option <?= $usuario->tipo=='1'? 'selected="selected"':'';?> value="1" >Administrador</option>
                                                            </select>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="usuarios.php" method="post" onsubmit="return confirm('Deseja realmente excluir <?= $usuario->nome ?>?')">
                                                            <input type="hidden" name="action" value="deletar">
                                                            <input type="hidden" name="_id" value="<?= $usuario->_id ?>">
                                                            <button class="btn btn-link"><i class="fa fa-remove"></i></button>
                                                        </form>
                                                    </td>
                                                <?php endif ?>
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
    <form action="usuarios.php" method="post" class="form">
      <div class="modal-body">
        <input type="hidden" name="action" value="inserir">
        <div class="form-group">
            <label>Nome</label>
            <input class="form-control" type="text" name="nome" required>
        </div>
        <div class="form-group">
            <label>Currículo Lattes</label>
            <input class="form-control" type="text" name="curriculo" placeholder="Link lattes" required>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea required name="descricao" rows="3" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Login</label>
            <input class="form-control" type="text" name="login" required>
            <p class="help-block">Por padrão, a senha é igual ao login até que o usuário a altere.</p>
        </div>
        <div class="form-group">
            <label>Tipo</label>
            <select name="tipo" class="form-control">
                <option value="2">Bolsista</option>
                <option value="1">Administrador</option>
            </select>
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