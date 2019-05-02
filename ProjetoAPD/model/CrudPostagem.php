<?php

require_once("Postagem_forum.php");
require_once("DBConnection.php");
require_once("CrudUsuario.php");


class CrudPostagem
{

    private $conexao;
    public function __construct(){
        $this->conexao = DBConnection::getConexao();
    }

    public function getPostagens(){

        $sql = "SELECT * FROM postagens_forum order by data_postagem desc";
        $resultado = $this->conexao->query($sql);

        $postagens_array = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($postagens_array as $postagem){

            $cod_postagem = $postagem['cod_postagem'];
            $status_postagem = $postagem['status_postagem'];
            $texto_postagem = $postagem['texto_postagem'];
            $titulo_postagem = $postagem['titulo_postagem'];
            $data_postagem = $postagem['data_postagem'];
            $usuario_cod_usuario = $postagem['usuario_cod_usuario'];

            $datahora = date_create($postagem['data_postagem']);
            $datahora = date_format($datahora, 'd/m/y | H:i');

            $obj = new Postagem_forum($usuario_cod_usuario, $status_postagem, $texto_postagem, $titulo_postagem, $datahora, $cod_postagem);
            $postagens[] = $obj;
        }

        return $postagens;
    }

    public function getUsuarioPostagem($cod_postagem){

        $sql = "SELECT nome FROM usuario, postagens_forum where cod_usuario = usuario_cod_usuario and cod_postagem = ".$cod_postagem;
        $resultado = $this->conexao->query($sql);

        $usu = $resultado->fetch(PDO::FETCH_ASSOC);
        return $usu;
    }

    public function getPostagem(int $cod_postagem){

        $sql ='select * from postagem_forum where cod_postagem='.$cod_postagem;
        $resultado = $this->conexao->query($sql);

        $p = $resultado->fetch(PDO::FETCH_ASSOC);

        $c1 = new Postagem_forum($p['titulo_postagem'], $p['texto_postagem'], $p['status_postagem'], $p['cod_postagem'], $p['usuario_cod_usuario']);

        return $c1;
    }

    public function insertPostagem(Postagem_forum $p){

        $sql = "INSERT INTO postagens_forum (usuario_cod_usuario, status_postagem, texto_postagem, titulo_postagem) VALUES ('{$p->getCodUsuario()}','{$p->getStatus()}','{$p->getTexto()}','{$p->getTitulo()}')";
        $this->conexao->exec($sql);
    }

    public function updatePostagem(Postagem_forum $p){

        $sql = "UPDATE postagens_forum SET (titulo_postagem = '".$p->getTitulo()."', texto_postagem = '".$p->getTexto()."', cod_postagem = '".$p->getCodPostagem()."', usuario_cod_usuario = '".$p->getCodUsuario()."') WHERE cod_postagem ='".$p->getCodPostagem();

        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e->getMessage();
        }

    }

    public function deletePostagem($codigo){

        //DELETA AS DENUNCIAS
        $sql = "DELETE FROM den_forum WHERE cod_postagem=".$codigo;
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }
        //DELETA A POSTAGEM
        $sql = "DELETE FROM postagens_forum WHERE cod_postagem=".$codigo;
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }

    }

    public function deletePostagemUsu($cod_usuario){


        $sql = "DELETE FROM den_forum WHERE cod_usuario=".$cod_usuario;
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }

        $sql = "DELETE FROM postagens_forum WHERE usuario_cod_usuario=".$cod_usuario;
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }

    }
}