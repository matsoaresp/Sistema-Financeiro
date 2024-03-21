
<?php

require_once '../DAO/ContaDAO.php';
$dao = new ContaDAO();
if (isset($_GET['cod']) && is_numeric($_GET['cod'])){



    $idConta = $_GET['cod'];

    $dados = $dao->DetalharConta($idConta);

if (count($dados) == 0) {

    header('location: consultar_conta.php ');
    exit;

}
} else if (isset($_POST['btnSalvar'])){

    $idConta = $_POST['cod'];
    $bancoConta = $_POST['banco'];
    $agenciaConta = $_POST['agencia'];
    $numeroConta = $_POST['numero'];
    $saldoConta = $_POST['saldo'];
    $ret = $dao->AlterarConta($bancoConta,$agenciaConta,$numeroConta,$saldoConta,$idConta);
    header('location: consultar_conta.php?ret=' . $ret);
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
            <form method="post" action="alterar_conta.php">
            <input type="hidden" name="cod" value="<?= $dados[0]['id_conta'] ?>">
                <div class="row">
                    <div class="col-md-12">
                    <?php include_once '_msg.php' ?>
                        <h2>Alterar Conta</h2>
                        <h5>Aqui você poderá alterar suas contas</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="form-group" id="divBanco">
                    <label>Nome do banco*</label>
                    <input class="form-control" maxlength="20" placeholder="Digite o nome do banco" id="banco" value="<?= $dados[0]['banco_conta'] ?>" name="banco" />
                </div>
                <div class="form-group" id="divAgencia">
                    <label>Agência*</label>
                    <input class="form-control"  maxlength="4" placeholder="Digite a agência"  id="agencia" value="<?= $dados[0]['agencia_conta'] ?>" name="agencia" />
                </div>
                <div class="form-group" id="divNumero">
                    <label>Número da conta*</label>
                    <input class="form-control" maxlength="9" placeholder="Digite o número da conta" id="numero" value="<?= $dados[0]['numero_conta'] ?>" name="numero" />
                </div>
                <div class="form-group" id="divSaldo">
                    <label>Saldo*</label>
                    <input class="form-control" placeholder="Digite o saldo da conta" id="saldo"  value="<?= $dados[0]['saldo_conta'] ?>" name="saldo"/>
                </div>
                <button type="submit" class="btn btn-success" name = "btnSalvar" onclick="return ValidarConta()">Salvar</button>
                

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    


</body>

</html>