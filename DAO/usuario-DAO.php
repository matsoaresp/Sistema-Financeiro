<?php
require_once '../DAO/Conexao.php';
require_once '../DAO/UtilDAO.php';

class UsuarioDAO extends Conexao{

public function GravarMeusDados (){

$conexao = parent::retornaConexao();
$comando_sql = 'select nome_usuario,
                    email_usuario
                    from tb_usuario
                    where id_usuario = ?';

$sql =  new PDOStatement ();
$sql = $conexao->prepare($comando_sql);
$sql->bindValue(1,UtilDao::CodigoLogado());
//Remove os indexes dentro do array, permanecendo somente com as colunas BD
$sql->setFetchMode(PDO::FETCH_ASSOC);
$sql->execute();

return $sql->fetchAll();


}
public function CarregarMeusDados($nome,$email) {

    if (trim($nome) == '' || trim($email) == ''){
        return 0;
    } if ($this->VerificarEmailDuplicadoAlteracao($email) != 0){
        return -6;

    }


   $conexao = parent::retornaConexao();
   $comando_sql = 'update tb_usuario
                    set nome_usuario = ?,
                        email_usuario = ?
                        where id_usuario = ?';

$sql = new PDOStatement();
$sql =$conexao->prepare($comando_sql);

$sql->bindValue(1,$nome);
$sql->bindValue(2,$email);
$sql->bindValue(3, UtilDao::CodigoLogado());

try{
$sql->execute();
return 1;

}catch(Exception $ex){
    echo $ex->getMessage();
    return -1
;


}


}

public function ValidarLogin ($email,$senha){

if (trim($email) == '' || trim($senha) == ''){
    return 0;
}

$conexao = parent::retornaConexao();
$comando_sql = 'SELECT id_usuario, nome_usuario from tb_usuario 
                where email_usuario = ? and senha_usuario = ?';

$sql = new PDOStatement();
$sql = $conexao->prepare($comando_sql);

$sql->bindValue(1, $email);
$sql->bindValue(2, $senha);

$sql->setFetchMode(PDO::FETCH_ASSOC);

$sql->execute();

$user = $sql->fetchAll();

if(count($user) == 0){
return -7;

} else

$cod = $user[0]['id_usuario'];
$nome = $user[0]['nome_usuario'];
UtilDao::CriarSessao($cod,$nome);
header('location: inicial.php');

}

public function CadastrarCategoria($nome,$email,$senha,$rsenha) {
    
if (trim ($nome) == '' || trim ($email) == '' || trim ($senha) == '' || trim ($rsenha) == ''){
    return 0; 
}

if (strlen($senha) < 6){
    return -2;
}

if (trim ($senha) != trim ($rsenha)){

    return -3;
} if ($this->VerificarEmailDuplicadoCadastro($email) != 0){
    return -6;
}

$conexao = parent::retornaConexao();
$comando_sql = 'INSERT INTO tb_usuario
                (nome_usuario, email_usuario, senha_usuario, data_cadastro)
                VALUES(?,?,?,?)';

$sql = new PDOStatement();
$sql = $conexao->prepare($comando_sql);

$sql->bindValue(1, $nome);
$sql->bindValue(2, $email);
$sql->bindValue(3, $senha);
$sql->bindValue(4, date('y-m-d'));

try {

$sql->execute();
return 1;

}catch (Exception $ex ){

echo $ex->getMessage();
return -1;

}

}

public function VerificarEmailDuplicadoCadastro($email){

if (trim($email) == ''){
    return 0;
}


$conexao = parent::retornaConexao();
$comando_sql = 'SELECT count(email_usuario) as contar 
                        from tb_usuario where email_usuario = ?';


$sql = new PDOStatement();
$sql = $conexao->prepare($comando_sql);

$sql->bindValue(1, $email);

$sql->setFetchMode(PDO::FETCH_ASSOC);

$sql->execute();

$contar = $sql->fetchAll();

return $contar[0]['contar'];
}

public function VerificarEmailDuplicadoAlteracao($email){

    if (trim($email) == ''){
        return 0;
    }
    
    
    $conexao = parent::retornaConexao();
    $comando_sql = 'SELECT count(email_usuario) as contar 
                            from tb_usuario where email_usuario = ? and id_usuario != ? ';
    
    
    $sql = new PDOStatement();
    $sql = $conexao->prepare($comando_sql);
    
    $sql->bindValue(1, $email);
    $sql->bindValue(2, UtilDao::CodigoLogado());
    
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    
    $sql->execute();
    
    $contar = $sql->fetchAll();
    
    return $contar[0]['contar'];
    }
}