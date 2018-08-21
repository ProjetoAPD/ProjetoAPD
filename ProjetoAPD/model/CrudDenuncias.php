<?php

require_once ("DBConnection.php");
require_once ("Denuncia_chat.php");
require_once ("Denuncia_forum.php");
require_once ("Denuncia_comentario.php");


class CrudDenuncias
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = DBConnection::getConexao();
    }


    // INSERT DENUNCIAS ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function insertDenunciaForum(Denuncia_forum $den){

        $sql = "INSERT INTO den_forum (text_den_f, cod_postagem, cod_usuario, data_hora) VALUES ('" . $den->getTextDenF() . "','" . $den->getCodPostagem() . "','" . $den->getCodUsuario() . "','" . $den->getDataHora() . "')";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertDenunciaChat(Denuncia_chat $den){

        $sql = "INSERT INTO den_chat (text_den_chat, conversa_cod_mensagem, cod_usuario, dt_den_chat) VALUES ('" . $den->getTextDenChat() . "','" . $den->getConversaCodMensagem() . "','" . $den->getCodUsuario() . "','" . $den->getDtDenChat() . "')";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertDenunciaComentario(Denuncia_comentario $den){

        $sql = "INSERT INTO den_coment (text_den_c, cod_comentario, cod_usuario, data_hora) VALUES ('" . $den->getTextDenC() . "','" . $den->getCodComentario() . "','" . $den->getCodUsuario() . "','" . $den->getDataHora() . "')";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



    // GET DENUNCIAS -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function getDenunciasForum(){

        $sql = "SELECT * FROM den_forum";
        $resultado = $this->conexao->query($sql);

        $denunciasForum = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $denunciasForum;
    }

    public function getDenunciasChat(){

        $sql = "SELECT * FROM den_chat";
        $resultado = $this->conexao->query($sql);

        $denunciasChat = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $denunciasChat;
    }

    public function getDenunciasComentario(){

        $sql = "SELECT * FROM den_coment";
        $resultado = $this->conexao->query($sql);

        $denunciasComent = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $denunciasComent;
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


    
    // GET USUARIOS DENUNCIAS -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function getUsuarioDenunciaForum($cod_denuncia){

        $sql = "SELECT nome FROM usuario, den_forum where cod_usuario = usuario_cod_usuario and cod_den_forum = ".$cod_denuncia;
        $resultado = $this->conexao->query($sql);

        $usuDenForum = $resultado->fetch(PDO::FETCH_ASSOC);
        return $usuDenForum;
    }

    public function getUsuarioDenunciaChat($cod_denuncia){

        $sql = "SELECT nome FROM usuario, den_chat where cod_usuario = usuario_cod_usuario and cod_den_chat = ".$cod_denuncia;
        $resultado = $this->conexao->query($sql);

        $usuDenChat = $resultado->fetch(PDO::FETCH_ASSOC);
        return $usuDenChat;
    }

    public function getUsuarioDenunciaComentario($cod_denuncia){

        $sql = "SELECT nome FROM usuario, den_coment where cod_usuario = usuario_cod_usuario and cod_den_coment = ".$cod_denuncia;
        $resultado = $this->conexao->query($sql);

        $usuDenComent = $resultado->fetch(PDO::FETCH_ASSOC);
        return $usuDenComent;
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



}