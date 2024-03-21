<?php


require_once '../DAO/UtilDAO.php';
UtilDao::VerificarLogado();
require_once '../DAO/EmpresaDAO.php';
$empresas = array();
$dados = new EmpresaDAO();

if (isset($_POST['btnPesquisar'])) {
    $pesquisa = trim($_POST['pesquisar']);
    $empresas = $dados->ConsultarEmpresas($pesquisa);
} else {
    $empresas = $dados->ConsultarEmpresas();
}
if (isset($_POST['btnExcluir'])) {
    $idEmp = $_POST['idEmp'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $dados = new EmpresaDAO();
    $ret = $dados->ExcluirEmpresas($idEmp, $nome, $telefone, $endereco);
    header('location: consultar_empresa.php');
exit;
}








?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once '_head.php';
?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>


        <div id="page-wrapper">
            <div id="page-inner">
                <form method="post" action="consultar_empresa.php">

                    <div class="row">
                        <div class="col-md-12">
                            <?php include_once '_msg.php' ?>
                            <h2>Consultar Empresas</h2>
                            <h5>Consulte todas suas empresas aqui </h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />


                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Pesquise pela empresa desejada
                                </div>
                                <div class="panel-body">

                                    <div class="form-group" id="divNome">
                                        <label>Pesquisar pelo nome</label>

                                        <input class="form-control" placeholder="Digite o nome da categoria" name="pesquisar" value="<?= isset($pesquisa) ? $pesquisa : '' ?>">
                                    </div>
                                    <center>
                                        <button class="btn btn-info btn-sm" name="btnPesquisar">Pesquisar</button>
                                    </center>
                                    <br>
                
                <div class="table-responsive">

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Nome da empresa</th>
                                <th>Telefone</th>
                                <th>Endereço</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php for ($i = 0; $i < count($empresas); $i++) {   ?>
                                <tr class="odd gradeX">
                                    <td><?= $empresas[$i]['nome_empresa'] ?></td>
                                    <td><?= $empresas[$i]['telefone_empresa'] ?></td>
                                    <td><?= $empresas[$i]['endereco_empresa'] ?></td>
                                    <td>
                                        <a href="alterar_empresa.php?cod=<?= $empresas[$i]['id_empresa'] ?>" class="btn btn-warning btn-sm">Alterar</a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalExcluir<?= $i ?>">Excluir</a>
                                        
                                            <input type="hidden" name="idEmp" value="<?= $empresas[$i]['id_empresa'] ?>">
                                            <input type="hidden" name="nome" value="<?= $empresas[$i]['nome_empresa'] ?>">
                                            <input type="hidden" name="telefone" value="<?= $empresas[$i]['telefone_empresa'] ?>">
                                            <input type="hidden" name="endereco" value="<?= $empresas[$i]['endereco_empresa'] ?>">
                                            <div class="modal fade" id="modalExcluir<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <center>
                                                                <b>Deseja excluir a empresa:</b></b><br><br>
                                                            </center>
                                                            <b>Nome da empresa:</b> <?= $empresas[$i]['nome_empresa'] ?><br>
                                                            <b>Telefone da empresa:</b> <?= $empresas[$i]['telefone_empresa'] ?><br>
                                                            <b>Endereço da empresa:</b> <?= $empresas[$i]['endereco_empresa'] ?><br>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-success" name="btnExcluir" class="btn btn-primary">Sim</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
    </div>
    
    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>



</body>

</html>