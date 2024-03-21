<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class CategoriaDAO extends Conexao
{


    public function CadastrarCategoria($nome)
    {


        if (trim($nome) == '') 
            return 0;
        
        // 1 passo: Criar uma variavel que receberá o obj de conexao
        $conexao = parent::retornaConexao();

        // 2 passo Criar uma variavel que receberá o texto do comando SQL que deverá ser executado no BD
        $comando_sql = 'insert into tb_categoria
(nome_categoria, id_usuario)
values (?, ?);';
        // 3 Passo: Criar um obj que será config. e levado no BD para ser executado
        $sql = new PDOStatement();

        // 4 Passo: Colocar dentro do obj $sql a conexão preparada para executar o comando_sql

        $sql = $conexao->prepare($comando_sql);

        // 5 Passo: Verificar se no comando_sql eu tenho ? para ser comfigurado. Se tiver, configurar os bindValues

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, UtilDao::CodigoLogado());

        try {

            // 6 Passo: Executar no BD
            $sql->execute();

            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();

            return -1;
        }
    }


    public function AlterarCategoria($nome, $idcategoria)
    {


        if (trim($nome) == '' || $idcategoria == '') {
            return 0;
        }


        $conexao = parent::retornaConexao();
        $comando_sql = 'update tb_categoria
                            set nome_categoria = ?
                            where id_categoria = ?
                            and id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $idcategoria);
        $sql->bindValue(3, UtilDao::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }
    public function ConsultarCategoria($nome_pesquisar = '')
    {
        

        $conexao = parent::retornaConexao();
        $comando_sql = 'SELECT id_categoria,
                                    nome_categoria
                                    FROM tb_categoria
                                    WHERE id_usuario                          
                                    = ?';
        // ORDER BY nome_categoria ASC';
        if(trim($nome_pesquisar) != ""){

        $comando_sql .=  ' AND  nome_categoria LIKE ? ';
        }

        $comando_sql .=  ' ORDER BY id_categoria ASC';

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

    public function DetalharCategoria($idcategoria)
    {

        $conexao = parent::retornaConexao();
        $comando_sql = 'select id_categoria,
                                nome_categoria
                                from tb_categoria
                                where id_categoria = ?
                                and id_usuario = ? ';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(2, UtilDao::CodigoLogado());
        $sql->bindValue(1, $idcategoria);
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();
        return $sql->fetchAll();
    }

    public function ExcluirCategoria($idCategoria)
    {

        if ($idCategoria == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();

        $comando_sql = 'DELETE FROM tb_categoria 
                            WHERE id_categoria = ? 
                            ';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idCategoria);



        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -4;
        }
    }

    public function ExcluirCategorias($idCategoria, $nomeCategoria)
{
    if ($idCategoria == '' || $nomeCategoria == '') {
        return 0;
    }
    
    
    $conexao = parent::retornaConexao();

        $comando_sql = 'DELETE FROM tb_categoria 
                            WHERE id_categoria = ? 
                            ';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idCategoria);



        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -4;
        }
}

    public function FiltrarCategoria($pesquisar = "")
    {

            $conexao = parent::retornaConexao();
            $comando_sql = 'SELECT id_categoria,
                                        nome_categoria
                                        FROM tb_categoria
                                        WHERE id_usuario = ?
                                        AND nome_categoria LIKE ?
                                         ORDER BY nome_categoria ASC';
            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando_sql);
    
            $sql->bindValue(1, UtilDao::CodigoLogado());
            $sql->bindValue(2, '%'. $pesquisar . '%');
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();
    
}

}