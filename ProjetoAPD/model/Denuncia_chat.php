<?php

class Denuncia_chat
{
    private $text_den_chat;
    private $conversa_cod_mensagem;
    private $cod_usuario;
    private $dt_den_chat;
    private $cod_den_chat;

    public function __construct($text_den_chat=null, $conversa_cod_mensagem=null, $cod_usuario=null, $dt_den_chat=null, $cod_den_chat=null){
        $this->text_den_chat = $text_den_chat;
        $this->conversa_cod_mensagem = $conversa_cod_mensagem;
        $this->cod_usuario = $cod_usuario;
        $this->dt_den_chat = $dt_den_chat;
        $this->cod_den_chat = $cod_den_chat;
    }

    public function getCodDenChat(){
        return $this->cod_den_chat;
    }
    public function setCodDenChat($cod_den_chat){
        $this->cod_den_chat = $cod_den_chat;
    }


    public function getTextDenChat(){
        return $this->text_den_chat;
    }
    public function setTextDenChat($text_den_chat){
        $this->text_den_chat = $text_den_chat;
    }


    public function getConversaCodMensagem(){
        return $this->conversa_cod_mensagem;
    }
    public function setConversaCodMensagem($conversa_cod_mensagem){
        $this->conversa_cod_mensagem = $conversa_cod_mensagem;
    }


    public function getCodUsuario(){
        return $this->cod_usuario;
    }
    public function setCodUsuario($cod_usuario){
        $this->cod_usuario = $cod_usuario;
    }


    public function getDtDenChat(){
        return $this->dt_den_chat;
    }
    public function setDtDenChat($dt_den_chat){
        $this->dt_den_chat = $dt_den_chat;
    }
}