<?php
require_once '../DAO/Conexao.php';
require_once '../DAO/UtilDAO.php';

class ContaDAO extends Conexao {

public function CadastrarConta ($banco, $agencia , $numero, $saldo){

if (trim($banco) == '' || !is_numeric($agencia)  != '' ||  !is_numeric($numero) != '' ||  !is_numeric($saldo) != ''){

    return -5;

    
}

$conexao = parent::retornaConexao();
$comando_sql = 'insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
(?,?, ?, ?, ?);';


$sql = new PDOStatement();
$sql = $conexao->prepare($comando_sql);

$sql->bindValue(1, $banco);
$sql->bindValue(2, $agencia);
$sql->bindValue(3, $numero);
$sql->bindValue(4, $saldo);
$sql->bindValue(5, UtilDao::CodigoLogado());


try {

    $sql->execute();
    return 1;

}
catch(Exception $ex){
    echo $ex->getMessage();
    return -1;
}


} public function ConsultarConta (){

    $conexao = parent::retornaConexao();
    $comando_sql = 'SELECT  id_conta,
                    banco_conta,agencia_conta, numero_conta, saldo_conta
                    FROM tb_conta
                    WHERE id_usuario = ? order by banco_conta ASC';

    $sql = new PDOStatement();
    $sql = $conexao->prepare($comando_sql);

    $sql->bindValue(1, UtilDao::CodigoLogado());
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->execute();

    return $sql->fetchAll();




}

public function AlterarConta ($banco,$agencia,$numero, $saldo, $idConta){

    if (trim($banco) == '' ||  is_numeric($agencia) == '' || is_numeric($numero) == '' || is_numeric($saldo) == '' || $idConta == '' )
        return -5;

    $conexao= parent::retornaConexao();
    
    $comando_sql = 'UPDATE tb_conta
                        SET banco_conta= ?,
                         agencia_conta = ?,
                         numero_conta = ?,
                         saldo_conta = ?
                        WHERE id_conta = ?
                        AND id_usuario = ?';
    
    $sql = new PDOStatement();
    $sql = $conexao->prepare($comando_sql);
    
    $sql->bindValue(1,$banco);
    $sql->bindValue(2,$agencia);
    $sql->bindValue(3,$numero);
    $sql->bindValue(4,$saldo);
    $sql->bindValue(5,$idConta);
    $sql->bindValue(6, UtilDao::CodigoLogado());
    
    try{
        $sql->execute();
        return 1;
    
    } catch  (Exception $ex){  
        echo $ex->getMessage();
        return -1;
        
    
    }
    
    }

public function DetalharConta ($idConta){

    $conexao = parent::retornaConexao();
$comando_sql = 'SELECT id_conta,banco_conta, agencia_conta, numero_conta,saldo_conta
                FROM tb_conta
                  WHERE id_conta = ?
                AND id_usuario = ?';
$sql = new PDOStatement();
$sql = $conexao->prepare($comando_sql);


$sql->bindValue(2, UtilDao::CodigoLogado());
$sql->bindValue(1, $idConta);
$sql->setFetchMode(PDO::FETCH_ASSOC);

$sql->execute();

 return $sql->fetchAll();



} public function ExcluirConta ($idConta, $nome,$agencia,$numero,$saldo){

if ($idConta == ''|| $nome =='' || $agencia == '' || $numero == '' || $saldo == ''){
    return 0;
}
    $conexao = parent::retornaConexao();

    $comando_sql = 'DELETE FROM tb_conta 
                        WHERE id_conta = ?';

$sql= new PDOStatement();
$sql = $conexao->prepare($comando_sql);
$sql->bindValue(1, $idConta);

try{
    $sql->execute();
    return 1;

} catch (Exception $ex){
    echo $ex->getMessage();
    return -4;
    
}

}
public function ConsultarContas($nome_pesquisar = '')
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'SELECT id_conta,
                                    banco_conta,
                                    agencia_conta,
                                    numero_conta,
                                    saldo_conta
                                    FROM tb_conta
                                    WHERE id_usuario                          
                                    = ?';
        // ORDER BY nome_categoria ASC';
        if(trim($nome_pesquisar) != ""){

            $comando_sql .=  ' AND  banco_conta LIKE ? ';
        }

        $comando_sql .=  ' ORDER BY id_conta ASC';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDao::CodigoLogado());
        if(trim($nome_pesquisar) != ""){
            $sql->bindValue(2, "%$nome_pesquisar%");
        }
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

}