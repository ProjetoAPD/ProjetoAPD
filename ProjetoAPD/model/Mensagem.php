<?php

class Mensagem{
    private $cod_usuario1;
    private $cod_usuario2;
    private $texto;
    private $dt_mensagem;
    private $cod_mensagem;

    public function __construct($cod_usuario1=null, $cod_usuario2=null, $texto=null, $dt_mensagem=null, $cod_mensagem=null){
        $this->cod_usuario1 = $cod_usuario1;
        $this->cod_usuario2 = $cod_usuario2;
        $this->texto = $texto;
        $this->dt_mensagem = $dt_mensagem;
        $this->cod_mensagem = $cod_mensagem;
    }

    public function getCodUsuario1(){
        return $this->cod_usuario1;
    }
    public function setCodUsuario1($cod_usuario1): void{
        $this->cod_usuario1 = $cod_usuario1;
    }


    public function getCodUsuario2(){
        return $this->cod_usuario2;
    }
    public function setCodUsuario2($cod_usuario2): void{
        $this->cod_usuario2 = $cod_usuario2;
    }


    public function getTexto(){
        return $this->texto;
    }
    public function setTexto($texto): void{
        $this->texto = $texto;
    }


    public function getDtMensagem(){
        return $this->dt_mensagem;
    }
    public function setDtMensagem($dt_mensagem): void{
        $this->dt_mensagem = $dt_mensagem;
    }


    public function getCodMensagem(){
        return $this->cod_mensagem;
    }
    public function setCodMensagem($cod_mensagem): void{
        $this->cod_mensagem = $cod_mensagem;
    }


}