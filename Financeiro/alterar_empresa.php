<?php

require_once '../DAO/EmpresaDAO.php';
$dao = new EmpresaDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {



    $idEmpresa = $_GET['cod'];

    $dados = $dao->DetalharEmpresa($idEmpresa);

    if (count($dados) == 0) {

        header('location: consultar_empresa.php ');
        exit;
    }
} else if (isset($_POST['btnSalvar'])) {

    $idEmpresa = $_POST['cod'];
    $nomeEmpresa = $_POST['empresa'];
    $telefoneEmpresa = $_POST['telefone'];
    $enderecoEmpresa = $_POST['endereco'];
    $ret = $dao->AlterarEmpresa($nomeEmpresa, $telefoneEmpresa, $enderecoEmpresa, $idEmpresa);
    header('location: consultar_empresa.php?ret=' . $ret);
    exit;

} else {

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
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php' ?>
                        <h2>Alterar Empresa</h2>
                        <h5>Aqui você poderá cadastrar alterar suas empresas</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="alterar_empresa.php">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_empresa'] ?>">

                    <div class="form-group" id="divEmpresa">
                        <label>Nome da empresa*</label>
                        <input class="form-control" placeholder="Digite o nome da sua empresa..." maxlength="50" id="empresa" value="<?= $dados[0]['nome_empresa'] ?>" name="empresa" />

                    </div>
                    <div class="form-group" id="divTelefone">
                        <label>Telefone</label>
                        <input type="tel" class="form-control" maxlength="11" placeholder="(99)-99999-9999" id="telefone" value="<?= $dados[0]['telefone_empresa'] ?>" name="telefone" />
                    </div>
                    <div class="form-group" id="divEndereco">
                        <label>Endereço</label>
                        <input class="form-control" placeholder="Digite o endereço da empresa (opcional)" maxlength="100" id="endereco" value="<?= $dados[0]['endereco_empresa'] ?>" name="endereco" />
                    </div>
                    <button type="submit" class="btn btn-success" onclick="return ValidarEmpresa() " name="btnSalvar">Salvar</button>
                   

                    
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>



</body>

</html>