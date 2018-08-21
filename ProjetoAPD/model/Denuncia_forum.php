<?php

class Denuncia_forum
{
    private $text_den_f;
    private $cod_postagem;
    private $cod_usuario;
    private $data_hora;

    public function __construct($text_den_f=null, $cod_postagem=null, $cod_usuario=null, $data_hora=null){
        $this->text_den_f = $text_den_f;
        $this->cod_postagem = $cod_postagem;
        $this->cod_usuario = $cod_usuario;
        $this->data_hora = $data_hora;
    }

    public function getTextDenF(){
        return $this->text_den_f;
    }
    public function setTextDenF($text_den_f){
        $this->text_den_f = $text_den_f;
    }


    public function getCodPostagem(){
        return $this->cod_postagem;
    }
    public function setCodPostagem($cod_postagem){
        $this->cod_postagem = $cod_postagem;
    }


    public function getCodUsuario(){
        return $this->cod_usuario;
    }
    public function setCodUsuario($cod_usuario){
        $this->cod_usuario = $cod_usuario;
    }


    public function getDataHora(){
        return $this->data_hora;
    }
    public function setDataHora($data_hora){
        $this->data_hora = $data_hora;
    }
}