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

        $comentarios_array = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $comentarios = [];

        foreach ($comentarios_array as $comentario){
            $cod_comentario = $comentario['cod_comentario'];
            $dt_comentario = $comentario['dt_comentario'];
            $texto_comentario = $comentario['texto_comentario'];
            $postagem_cod_postagem = $comentario['postagem_cod_postagem'];
            $usuario_cod_usuario = $comentario['usuario_cod_usuario'];

            $datahora = date_create($dt_comentario);
            $datahora = date_format($datahora, 'd/m/y | H:i');

            $obj = new Comentario($texto_comentario, $postagem_cod_postagem, $usuario_cod_usuario, $datahora, $cod_comentario);
            $comentarios[] = $obj;
        }
        return $comentarios;
    }


    public function getUsuarioComentario(int $cod_comentario){

        $sql = "SELECT nome FROM usuario, comentario where cod_usuario = usuario_cod_usuario and cod_comentario = ".$cod_comentario;
        $resultado = $this->conexao->query($sql);

        $usu = $resultado->fetch(PDO::FETCH_ASSOC);
        return $usu;
    }

    public function getComentario(int $cod_comentario){

        $sql ='select * from comentario where cod_comentario='.$cod_comentario;
        $resultado = $this->conexao->query($sql);

        $c = $resultado->fetch(PDO::FETCH_ASSOC);

        $datahora = date_create($c['dt_comentario']);
        $datahora = date_format($datahora, 'd/m/y | H:i');

        $c1 = new Comentario($c['texto_comentario'], $datahora, $c['postagem_cod_postagem'], $c['usuario_cod_usuario'], $c['cod_comentario']);

        return $c1;
    }

    public function insertComentario(Comentario $c){

        $sql = "INSERT INTO comentario (texto_comentario, postagem_cod_postagem, usuario_cod_usuario) VALUES ('{$c->getTextoComentario()}','{$c->getPostagemCodPostagem()}','{$c->getUsuarioCodUsuario()}')";
        $this->conexao->exec($sql);
    }

    public function deleteComentario(int $codigo){

        //DELETA AS DENUNCIAS DO COMENTARIO
        $sql = "DELETE FROM den_coment WHERE den_coment.cod_comentario=".$codigo;
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }

        //DELETA O COMENTARIO
        $sql = "DELETE FROM comentario WHERE cod_comentario=".$codigo;
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }

    }

    public function deleteComentariosPostagem(int $codigo){

        $sql = "DELETE FROM den_coment WHERE den_coment.cod_comentario IN (SELECT cod_comentario FROM postagens_forum, comentario WHERE postagem_cod_postagem = cod_postagem AND cod_postagem = ".$codigo.")";
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }

        $sql = "DELETE FROM comentario WHERE postagem_cod_postagem = ".$codigo;
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }
    }

    public function deleteComentarioUsu(int $codigoUsuario){

        $sql = "DELETE FROM den_coment WHERE den_coment.cod_usuario=".$codigoUsuario;
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }


        $sql = "DELETE FROM comentario WHERE usuario_cod_usuario=".$codigoUsuario;
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }

    }
}
