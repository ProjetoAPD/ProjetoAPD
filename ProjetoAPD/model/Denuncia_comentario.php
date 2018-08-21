<?php

class Denuncia_comentario
{
    private $text_den_c;
    private $cod_comentario;
    private $cod_usuario;
    private $data_hora;

    public function __construct($text_den_c=null, $cod_comentario=null, $cod_usuario=null, $data_hora=null){
        $this->text_den_c = $text_den_c;
        $this->cod_comentario = $cod_comentario;
        $this->cod_usuario = $cod_usuario;
        $this->data_hora = $data_hora;
    }

    public function getTextDenC(){
        return $this->text_den_c;
    }
    public function setTextDenC($text_den_c){
        $this->text_den_c = $text_den_c;
    }


    public function getCodComentario(){
        return $this->cod_comentario;
    }
    public function setCodComentario($cod_comentario){
        $this->cod_comentario = $cod_comentario;
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