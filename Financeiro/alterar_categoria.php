<?php
require_once '../DAO/CategoriaDAO.php';
$dao = new CategoriaDAO();
if(isset($_GET['cod']) && is_numeric($_GET['cod'])){


    $idCategoria = $_GET['cod'];

    $dados = $dao->DetalharCategoria($idCategoria);
    
    if(count($dados) == 0 ){

        header('location: consultar_categoria.php ');
        exit;
    } }
    else if (isset($_POST['btnSalvar'])){

        $idCategoria = $_POST['cod'];
        $nome_categoria = $_POST['nomecategoria'];
        $ret = $dao->AlterarCategoria($nome_categoria,$idCategoria);

        header('location: consultar_categoria.php?ret=' . $ret);
    } 
     

 else {

    header('location: consultar_categoria.php');
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

            <form method="post" action="alterar_categoria.php">
                <input type="hidden" name="cod" value="<?= $dados[0]['id_categoria'] ?>">
                <div class="row">
                    <div class="col-md-12">
                    <?php include_once '_msg.php' ?>
                        <h2>Alterar Categoria</h2>
                        <h5>Aqui você poderá alterar ou excluir suas categorias</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="form-group">
                    <label>Nome da categoria</label>
                    <input class="form-control" maxlength="35" placeholder="Digite o nome da categoria. Exemplo: Conta de luz" id="nomecategoria" value=" <?=$dados[0]['nome_categoria'] ?>" name="nomecategoria"/>
                </div>
                <button type="submit" class="btn btn-success" onclick="return ValidarCategoria()" name="btnSalvar">Salvar</button>
         
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>



</body>

</html>