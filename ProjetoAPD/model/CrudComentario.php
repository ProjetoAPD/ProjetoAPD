<?php

require_once("Comentario.php");
require_once("DBConnection.php");


class CrudComentario
{
    private $conexao;
    public function __construct(){
        $this->conexao = DBConnection::getConexao();
    }

    public function getComentarios(int $cod_postagem){

        $sql = "SELECT * FROM comentario where postagem_cod_postagem = '{$cod_postagem}' order by dt_comentario";
        $resultado = $this->conexao->query($sql);

        $comentarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $comentarios;
    }

    public function getUsuarioComentario($cod_comentario){

        $sql = "SELECT nome FROM usuario, comentario where cod_usuario = usuario_cod_usuario and cod_comentario = ".$cod_comentario;
        $resultado = $this->conexao->query($sql);

        $usu = $resultado->fetch(PDO::FETCH_ASSOC);
        return $usu;
    }

    public function getComentario(int $cod_comentario){

        $sql ='select * from comentario where cod_comentario='.$cod_comentario;
        $resultado = $this->conexao->query($sql);

        $c = $resultado->fetch(PDO::FETCH_ASSOC);

        $c1 = new Comentario($c['texto_comentario'], $c['dt_comentario'], $c['postagem_cod_postagem'], $c['usuario_cod_usuario'], $c['cod_comentario']);

        return $c1;
    }

    public function insertComentario(Comentario $c){

        $sql = "INSERT INTO comentario (texto_comentario, postagem_cod_postagem, usuario_cod_usuario) VALUES ('{$c->getTextoComentario()}','{$c->getPostagemCodPostagem()}','{$c->getUsuarioCodUsuario()}')";
        $this->conexao->exec($sql);
    }

    public function deleteComentario(int $codigo){

        $sql = "DELETE FROM comentario WHERE cod_comentario=".$codigo;

        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }

    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // CORRIGIR SAPORRA
    public function deleteComentariosPostagem(int $codigo){

        $sql = "DELETE FROM comentario WHERE cod_comentario = comentario_cod_comentario".$codigo;

        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function deleteComentarioUsu(int $codigoUsuario){

        $sql = "DELETE FROM comentario WHERE usuario_cod_usuario=".$codigoUsuario;

        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }

    }
}
