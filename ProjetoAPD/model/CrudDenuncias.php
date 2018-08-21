<?php

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


}