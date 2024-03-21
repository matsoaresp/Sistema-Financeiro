<?php
require_once '../DAO/UtilDAO.php';
UtilDao::VerificarLogado();
require_once '../DAO/EmpresaDAO.php';

if (isset($_POST['btnGravar'])){

$nome = trim ($_POST['nome']);
$telefone = trim ($_POST['telefone']);
$endereco = trim ($_POST['endereco']);

$objDao = new EmpresaDAO();

$ret = $objDao->CadastrarEmpresa($nome,$telefone,$endereco);



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

                        
                        <h2>Nova Empresa</h2>
                        <h5>Aqui você poderá cadastrar todas as suas empresas</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="nova_empresa.php">
                <div class="form-group" id="divEmpresa">
                    <label>Nome da empresa*</label >
                    <input class="form-control" maxlength="50" placeholder="Digite o nome da sua empresa... " name="nome" id="empresa"/>
                </div>
                <div class="form-group" id="divTelefone" >
                    <label>Telefone</label>
                    <input class="form-control" type="tel"  placeholder="(99)-99999-9999" maxlength="11"  name="telefone" id="telefone"/>
                </div>
                <div class="form-group" >
                    <label>Endereço</label>
                    <input class="form-control" maxlength="100" placeholder="Digite o endereço da empresa (opcional)" name="endereco" id="endereco"/>
                </div>
                <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarEmpresa()">Gravar</button>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    


</body>

</html>