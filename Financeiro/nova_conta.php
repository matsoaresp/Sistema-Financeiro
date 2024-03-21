<?php
require_once '../DAO/UtilDAO.php';
UtilDao::VerificarLogado();
require_once '../DAO/ContaDAO.php';

if (isset($_POST['btnGravar'])){

$banco = $_POST['banco'];
$agencia = $_POST['agencia'];
$numero = $_POST['numero'];
$saldo = $_POST['saldo'];

$objDAO = new ContaDAO();

$ret = $objDAO->CadastrarConta($banco,$agencia,$numero,$saldo);


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
                        <h2>Nova Conta</h2>
                        <h5>Aqui você poderá cadastrar todas as suas contas</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="nova_conta.php">
                <div class="form-group" id="divBanco">
                    <label>Nome do banco*</label>
                    <input class="form-control" maxlength="20" placeholder="Digite o nome do banco..." id="banco" name="banco"/>
                </div>
                <div class="form-group" id="divAgencia">
                    <label>Agência*</label>
                    <input class="form-control" maxlength="4" placeholder="Digite a agência" id="agencia" name="agencia" />
                </div>
                <div class="form-group" id="divNumero">
                    <label>Número da conta*</label>
                    <input class="form-control" maxlength="9" placeholder="Digite o número da conta" id="numero"  name="numero"/>
                </div>
                <div class="form-group" id="divSaldo">
                    <label>Saldo*</label>
                    <input class="form-control" placeholder="Digite o saldo da conta" id="saldo" name="saldo"/>
                </div>
                <button type="submit" class="btn btn-success" onclick="return ValidarConta()" name="btnGravar">Gravar</button>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    


</body>

</html>