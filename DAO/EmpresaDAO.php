<?php
require_once '../DAO/Conexao.php';
require_once '../DAO/UtilDAO.php';


class EmpresaDAO extends Conexao
{

    public function CadastrarEmpresa($nome, $telefone, $endereco)
    {

        if (trim($nome) == "" || (!empty($telefone) && !is_numeric($telefone))) {
            return -5;
        }



        $conexao = parent::retornaConexao();

        $comando_sql = 'insert into tb_empresa
                (nome_empresa,telefone_empresa, endereco_empresa, id_usuario)
                values
                (?, ?, ?, ? );';


        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);


        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $telefone);
        $sql->bindValue(3, $endereco);
        $sql->bindValue(4, UtilDao::CodigoLogado());


        try {

            $sql->execute();

            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function AlterarEmpresa($nome, $telefone, $endereco, $idEmpresa)
    {


        if (trim($nome) == "" || (!empty($telefone) && !is_numeric($telefone))) {
            return -5;
        }



        $conexao = parent::retornaConexao();

        $comando_sql = 'UPDATE tb_empresa
                    SET nome_empresa= ?,
                     telefone_empresa = ?,
                     endereco_empresa = ?
                    WHERE id_empresa = ?
                    AND id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $telefone);
        $sql->bindValue(3, $endereco);
        $sql->bindValue(4, $idEmpresa);
        $sql->bindValue(5, UtilDao::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarEmpresa()
    {

        $conexao = parent::retornaConexao();
        $comando_sql = 'SELECT  id_empresa,
                    nome_empresa,telefone_empresa, endereco_empresa
                    FROM tb_empresa
                    WHERE id_usuario = ? order by nome_empresa ASC';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDao::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharEmpresa($idEmpresa)
    {

        $conexao = parent::retornaConexao();
        $comando_sql = 'SELECT id_empresa, nome_empresa, telefone_empresa,endereco_empresa
                FROM tb_empresa
                  WHERE id_empresa = ?
                AND id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);


        $sql->bindValue(2, UtilDao::CodigoLogado());
        $sql->bindValue(1, $idEmpresa);
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }
    public function ConsultarEmpresas($nome_pesquisar = '')
    {


        $conexao = parent::retornaConexao();
        $comando_sql = 'SELECT id_empresa,
                                    nome_empresa,
                                    telefone_empresa,
                                    endereco_empresa
                                    FROM tb_empresa
                                    WHERE id_usuario                          
                                    = ?';
        // ORDER BY nome_categoria ASC';
        if (trim($nome_pesquisar) != "") {

            $comando_sql .=  ' AND  nome_empresa LIKE ? ';
        }

        $comando_sql .=  ' ORDER BY id_empresa ASC';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDao::CodigoLogado());
        if (trim($nome_pesquisar) != "") {
            $sql->bindValue(2, "%$nome_pesquisar%");
        }
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function ExcluirEmpresas($idEmpresa, $nomeEmpresa, $telefone, $endereco)
    {
        if ($idEmpresa == '' || $nomeEmpresa == '' || $telefone == '' || $endereco == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();

        $comando_sql = 'DELETE FROM tb_empresa
                    WHERE id_empresa = ? 
                    ';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idEmpresa);



        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -4;
        }
    
    }
}
