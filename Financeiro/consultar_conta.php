<?php


require_once '../DAO/UtilDAO.php';
UtilDao::VerificarLogado();
require_once '../DAO/ContaDAO.php';

$dados = new ContaDAO;
if (isset($_POST['btnPesquisar'])) {
    $pesquisa = trim($_POST['pesquisar']);
    $conta = $dados->ConsultarConta($pesquisa);
} else  {
    $conta = $dados->ConsultarContas();
} if (isset($_POST['btnExcluir'])){
$idCont = $_POST['idCont'];
$banco = $_POST['banco'];
$agencia = $_POST['agencia'];
$numero = $_POST['numero'];
$saldo = $_POST['saldo'];
$dados = new ContaDAO();
$ret = $dados->ExcluirConta($idCont,$banco,$agencia,$numero,$saldo);
header('location: consultar_conta.php');
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
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php' ?>
                        <h2>Consultar Contas</h2>
                        <h5>Consulte todas suas contas aqui </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Pesquise pela conta desejada
                            </div>
                            <div class="panel-body">
                                <form method="post" action="consultar_conta.php">
                                    <div class="form-group" id="divNome">
                                        <label>Pesquisar pelo nome</label>

                                        <input class="form-control" placeholder="Digite o nome da categoria" id="pesquisar" name="pesquisar" value="<?= isset($pesquisa) ? $pesquisa : '' ?>">
                                    </div>
                                    <center>
                                        
                                        <button class="btn btn-info btn-sm"  name="btnPesquisar">Pesquisar</button>
                                    </center>
                                    <br>
                                </form>
                                
                                    
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Banco</th>
                                                            <th>Agência</th>
                                                            <th>Número da conta</th>
                                                            <th>Saldo</th>
                                                            <th>Ação</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php for ($i = 0; $i < count($conta); $i++) {   ?>
                                                            <tr class="odd gradeX">
                                                                <td> <?= $conta[$i]['banco_conta'] ?></td>
                                                                <td> <?= $conta[$i]['agencia_conta'] ?></td>
                                                                <td> <?= $conta[$i]['numero_conta'] ?></td>
                                                                <td>R$<?= $conta[$i]['saldo_conta'] ?></td>
                                                                <td>
                                                                    <a href="alterar_conta.php?cod=<?= $conta[$i]['id_conta'] ?>" class="btn btn-warning btn-sm">Alterar</a>
                                                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalExcluir<?= $i ?>">Excluir</a>
                                                                    <form method="post" action="consultar_conta.php">
                                                                        <input type="hidden" name="idCont" value= "<?= $conta[$i] ['id_conta'] ?>">
                                                                        <input type="hidden" name="banco" value= "<?= $conta[$i] ['banco_conta'] ?>">
                                                                        <input type="hidden" name="agencia" value= "<?= $conta[$i] ['agencia_conta'] ?>">
                                                                        <input type="hidden" name="numero" value= "<?= $conta[$i] ['numero_conta'] ?>">
                                                                        <input type="hidden" name="saldo" value= "<?= $conta[$i] ['saldo_conta'] ?>">
                                                                        <div class="modal fade" id="modalExcluir<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                        <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <center>
                                                                                            <b>Deseja excluir a conta:</b></b><br><br>
                                                                                        </center>
                                                                                        <b>Nome do banco:</b> <?= $conta[$i]['banco_conta'] ?><br>
                                                                                        <b>Agencia:</b> <?= $conta[$i]['agencia_conta'] ?><br>
                                                                                        <b>Numero:</b> <?= $conta[$i]['numero_conta'] ?><br>
                                                                                        <b>Saldo:</b> <?= $conta[$i]['saldo_conta'] ?><br>
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