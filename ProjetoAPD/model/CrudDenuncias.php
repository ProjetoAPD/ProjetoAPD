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

        $sql = "INSERT INTO den_forum (tex_den_f, cod_postagem, cod_usuario) VALUES ('" . $den->getTextDenF() . "','" . $den->getCodPostagem() . "','" . $den->getCodUsuario() . "')";

        try {
            $this->conexao->exec($sql);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function insertDenunciaChat(Denuncia_chat $den){

        $sql = "INSERT INTO den_chat (mensagem_den_chat, conversa_cod_mensagem, cod_usuario) VALUES ('" . $den->getMensagemDenChat() . "','" . $den->getConversaCodMensagem() . "','" . $den->getCodUsuario() . "')";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function insertDenunciaComentario(Denuncia_comentario $den){

        $sql = "INSERT INTO den_coment (tex_den_c, cod_comentario, cod_usuario) VALUES ('" . $den->getTextDenC() . "','" . $den->getCodComentario() . "','" . $den->getCodUsuario() . "')";

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
        $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultado as $obj) {
            $cod_postagem = $obj['cod_postagem'];
            $cod_usuario = $obj['cod_usuario'];
            $data_hora = $obj['data_hora'];
            $tex_den_f = $obj['tex_den_f'];
            $cod_den_forum = $obj['cod_den_forum'];

            $datahora = date_create($data_hora);
            $datahora = date_format($datahora, 'd/m/y | H:i');

            $denuncia = new Denuncia_forum($tex_den_f, $cod_postagem, $cod_usuario, $datahora, $cod_den_forum);
            $denunciasForum[] = $denuncia;
        }
        return $denunciasForum;
    }

    public function getDenunciasChat(){

        $sql = "SELECT * FROM den_chat";
        $resultado = $this->conexao->query($sql);
        $result = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $denuncia){
            $cod_usuario = $denuncia['cod_usuario'];
            $mensagem_den_chat = $denuncia['mensagem_den_chat'];
            $dt_den_chat = $denuncia['dt_den_chat'];
            $conversa_cod_mensagem = $denuncia['conversa_cod_mensagem'];
            $cod_den_chat = $denuncia['cod_den_chat'];

            $datahora = date_create($dt_den_chat);
            $datahora = date_format($datahora, 'd/m/y | H:i');

            $objDenuncia = new Denuncia_chat($mensagem_den_chat, $conversa_cod_mensagem, $cod_usuario, $datahora, $cod_den_chat);
            $denunciasChat[] = $objDenuncia;
        }
        return $denunciasChat;
    }

    public function getDenunciasComentario(){

        $sql = "SELECT * FROM den_coment";
        $resultado = $this->conexao->query($sql);

        $result = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $denuncia){
            $cod_comentario = $denuncia['cod_comentario'];
            $cod_usuario = $denuncia['cod_usuario'];
            $data_hora = $denuncia['data_hora'];
            $tex_den_c = $denuncia['tex_den_c'];
            $cod_den_coment = $denuncia['cod_den_coment'];

            $datahora = date_create($data_hora);
            $datahora = date_format($datahora, 'd/m/y | H:i');

            $objDenuncia = new Denuncia_comentario($tex_den_c, $cod_comentario, $cod_usuario, $datahora, $cod_den_coment);
            $denunciasComent[] = $objDenuncia;
        }
        return $denunciasComent;
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


    
    // GET USUARIOS DENUNCIAS -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function getUsuarioDenunciaForum($cod_denuncia){

        $sql = "SELECT nome FROM usuario, den_forum where usuario.cod_usuario = den_forum.cod_usuario and cod_den_forum =".$cod_denuncia;
        $resultado = $this->conexao->query($sql);

        $usuDenForum = $resultado->fetch(PDO::FETCH_ASSOC);
        return $usuDenForum['nome'];
    }

    public function getUsuarioDenunciaChat($cod_denuncia){

        $sql = "SELECT nome FROM usuario, den_chat where usuario.cod_usuario = den_chat.cod_usuario and cod_den_chat =".$cod_denuncia;
        $resultado = $this->conexao->query($sql);

        $usuDenChat = $resultado->fetch(PDO::FETCH_ASSOC);
        return $usuDenChat['nome'];
    }

    public function getUsuarioDenunciaComentario($cod_denuncia){

        $sql = "SELECT nome FROM usuario, den_coment where usuario.cod_usuario = den_coment.cod_usuario and cod_den_coment =".$cod_denuncia;
        $resultado = $this->conexao->query($sql);

        $usuDenComent = $resultado->fetch(PDO::FETCH_ASSOC);
        return $usuDenComent['nome'];
    }
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function getMensagemDenChat(int $cod_mensagem){

        $sql = "SELECT texto FROM conversa WHERE cod_mensagem = ".$cod_mensagem;
        $resultado = $this->conexao->query($sql);

        $mensagem = $resultado->fetch(PDO::FETCH_ASSOC);
        return $mensagem['texto'];
    }

    public function getPostagemDenForum(int $cod_postagem){

        $sql = "SELECT texto_postagem FROM postagens_forum WHERE cod_postagem = ".$cod_postagem;
        $resultado = $this->conexao->query($sql);

        $mensagem = $resultado->fetch(PDO::FETCH_ASSOC);
        return $mensagem['texto_postagem'];
    }

    public function getComentarioDenComent(int $cod_comentario){

        $sql = "SELECT texto_comentario FROM comentario WHERE cod_comentario = ".$cod_comentario;
        $resultado = $this->conexao->query($sql);

        $mensagem = $resultado->fetch(PDO::FETCH_ASSOC);
        return $mensagem['texto_comentario'];
    }


//    ARRUMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAR-------------------------------------------------------------------------------------------
    public function getPostagemDenForumFromComent(int $cod_comentario){

        $sql = "SELECT texto_postagem FROM postagens_forum, comentario WHERE postagens_forum.cod_postagem = comentario.postagem_cod_postagem AND comentario.cod_comentario =".$cod_comentario;
        $resultado = $this->conexao->query($sql);

        $mensagem = $resultado->fetch(PDO::FETCH_ASSOC);
        return $mensagem['texto_postagem'];
    }
//    ---------------------------------------------------------------------------------------------------------




    //DELETE DENUNCIAS -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function deleteDenunciaPostagem($cod_denuncia){

        $sql = "DELETE FROM den_forum WHERE cod_den_forum = ".$cod_denuncia;
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }
    }

    public function deleteDenunciaComent($cod_denuncia){

        $sql = "DELETE FROM den_coment WHERE cod_den_coment = ".$cod_denuncia;

        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }
    }

    public function deleteDenunciaChat($cod_denuncia){

        $sql = "DELETE FROM den_chat WHERE cod_den_chat = ".$cod_denuncia;
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e;
        }
    }




    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

}