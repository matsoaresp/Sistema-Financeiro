<?php


require_once '../DAO/UtilDAO.php';
UtilDao::VerificarLogado();
require_once '../DAO/CategoriaDAO.php';
$categorias = array();
$dados = new CategoriaDAO();



if (isset($_POST['btnPesquisar'])) {
    $pesquisa = trim($_POST['pesquisar']);
    $categorias = $dados->FiltrarCategoria($pesquisa);
} else {
    $categorias = $dados->ConsultarCategoria(); 
}
    
  if (isset($_POST['btnExcluir'])) {
    $idCat = $_POST['idCat'];
    $nome = $_POST['nome'];
    $dados = new CategoriaDAO();
    $ret = $dados->ExcluirCategorias($idCat, $nome);
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
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php' ?>
                        <h2>Consultar Categoria</h2>
                        <h5>Consulte todas suas categorias aqui </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Pesquise pela categoria desejada

                            </div>
                            <div class="panel-body">
                                <form method="post" action="consultar_categoria.php">
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
                                                            <th>Nome da categoria</th>
                                                            <th>Ação</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php for ($i = 0; $i <count($categorias); $i++) {   ?>
                                                            <tr class="odd gradeX">
                                                                <td><?= $categorias[$i]['nome_categoria'] ?></td>
                                                                <td>
                                                                    <a href="alterar_categoria.php?cod=<?= $categorias[$i]['id_categoria'] ?>" class="btn btn-warning btn-sm">Alterar</a>
                                                                    
                                                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalExcluir<?= $i ?>">Excluir</a>

                                                                    <form method="post" action="consultar_categoria.php">
                                                                        <input type="hidden" name="idCat" value="<?= $categorias[$i]['id_categoria'] ?>">
                                                                        <input type="hidden" name="nome" value="<?= $categorias[$i]['nome_categoria'] ?>">
                                                                        <div class="modal fade" id="modalExcluir<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                        <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <center>
                                                                                            <b>Deseja excluir a categoria:</b></b><br><br>
                                                                                        </center>
                                                                                        <b>Nome da categoria:</b> <?= $categorias[$i]['nome_categoria'] ?><br>

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
                    </form>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>



</body>

</html>