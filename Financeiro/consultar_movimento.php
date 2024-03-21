<?php
require_once '../DAO/CategoriaDAO.php';
require_once '../DAO/ContaDAO.php';
require_once '../DAO/EmpresaDAO.php';
require_once '../DAO/UtilDAO.php';
UtilDao::VerificarLogado();

require_once '../DAO/MovimentoDAO.php';

$tipo = '';
$dao = new RealizarMovimento();
if (isset($_POST['btnPesquisar'])) {
    $tipo = $_POST['tipo'];
    $dt_inicial = $_POST['datainicial'];
    $dt_final = $_POST['datafinal'];


    $mov = $dao->FiltrarMovimento($tipo, $dt_inicial, $dt_final);
} else  if (isset($_POST['btnExcluir'])) {
    $idMov = $_POST['idMov'];
    $idConta = $_POST['idConta'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $ret = $dao->ExcluirMovimento($idMov, $idConta, $valor, $tipo);

    $tipo = '0';
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
                        <h2>Consultar Movimento</h2>
                        <h5>Consulte todos os movimentos em um determinado período</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="consultar_movimento.php">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tipo do movimento</label>
                            <select class="form-control" name="tipo">
                                <option value="0" <?= $tipo == '0' ? 'selected' : '' ?>>TODOS</option>
                                <option value="1" <?= $tipo == '1' ? 'selected' : '' ?>>Entrada</option>
                                <option value="2" <?= $tipo == '2' ? 'selected' : '' ?>>Saída</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="divDatainicial">
                            <label>Data inicial *</label>
                            <input type="date" class="form-control" placeholder="Coloque a data do movimento" id="datainicial" value="<?= isset($dt_inicial) ? $dt_inicial : '' ?>" name="datainicial" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="divDatafinal">
                            <label>Data final*</label>
                            <input type="date" class="form-control" placeholder="Coloque a data do movimento" id="datafinal" value="<?= isset($dt_final) ? $dt_final : '' ?>" name="datafinal" />
                        </div>
                    </div>
                    <center>
                        <button class="btn btn-info" onclick="return ValidarConsultaPeriodo()" name="btnPesquisar">Pesquisar</button>
                    </center>
                </form>
                <hr>
                <?php if (isset($mov)) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">

                                    Resultado encontrado

                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Tipo</th>
                                                    <th>Categoria</th>
                                                    <th>Empresa</th>
                                                    <th>Conta</th>
                                                    <th>Valor</th>
                                                    <th>Observação</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $total = 0;
                                                for ($i = 0; $i < count($mov); $i++) {
                                                    if ($mov[$i]['tipo_movimento']) {
                                                        $total = $total + $mov[$i]['valor_movimento'];
                                                    } else {
                                                        $total = $total - $mov[$i]['valor_movimento'];
                                                    }
                                                ?>
                                                    <tr class="odd gradeX">
                                                        <td><?= $mov[$i]['data_movimento'] ?></td>
                                                        <td><?= $mov[$i]['tipo_movimento']  == 1 ? 'Entrada' : 'Saída' ?></td>
                                                        <td><?= $mov[$i]['nome_categoria'] ?></td>
                                                        <td><?= $mov[$i]['nome_empresa'] ?></td>
                                                        <td><?= $mov[$i]['banco_conta'] ?> / Ag. <?= $mov[$i]['agencia_conta'] ?> - Num, <?= $mov[$i]['numero_conta'] ?></td>
                                                        <td>R$<?= number_format($mov[$i]['valor_movimento'], 2, ',', '.') ?></td>
                                                        <td><?= $mov[$i]['obs_movimento'] ?></td>
                                                        <td>
                                                           
                                                        
                                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalExcluir<?= $i ?> ">Excluir</a>
                                                           
                                                        <form method="post" action="consultar_movimento.php">
                                                                <input type="hidden" name="idMov" value="<?= $mov[$i]['id_movimento'] ?>">
                                                                <input type="hidden" name="idConta" value="<?= $mov[$i]['id_conta'] ?>">
                                                                <input type="hidden" name="tipo" value="<?= $mov[$i]['tipo_movimento'] ?>">
                                                                <input type="hidden" name="valor" value="<?= $mov[$i]['valor_movimento'] ?>">

                                                                <div class="modal fade" id="modalExcluir<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <b>
                                                                                    <center>Deseja excluir o movimento<br><br></center>
                                                                                </b>
                                                                                <b> Data do movimento:</b><?= $mov[$i]['data_movimento'] ?><br>
                                                                                <b> Tipo do movimento: </b><?= $mov[$i]['tipo_movimento'] ==  1  ? 'Entrada' : 'Saída' ?><br>
                                                                                <b> Categoria:</b><?= $mov[$i]['nome_categoria'] ?><br>
                                                                                <b> Nome empresa:</b> <?= $mov[$i]['nome_empresa'] ?><br>
                                                                                <b> Conta: </b><?= $mov[$i]['banco_conta'] ?> / Ag. <?= $mov[$i]['agencia_conta'] ?> - Num, <?= $mov[$i]['numero_conta'] ?><br>
                                                                                <b>Valor:</b>R$<?= number_format($mov[$i]['valor_movimento'], 2, ',', '.') ?>
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
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <center>
                                            <label style="color: <?= $total < 0 ?  'red' : 'green' ?>;">TOTAL: R$<?= number_format($total, 2, ',', '.'); ?></label>
                                        </center>
                                    </div>

                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>



</body>

</html>