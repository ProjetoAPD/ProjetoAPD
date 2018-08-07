<?php


class Postagem_forum
{
    private $titulo;
    private $texto;
    private $status;
    private $cod_postagem;
    private $cod_usuario;

    public function __construct($cod_usuario=null, $status=null, $texto=null, $titulo=null, $data=null, $cod_postagem=null){
        $this->cod_usuario = $cod_usuario;
        $this->status = $status;
        $this->texto = $texto;
        $this->titulo = $titulo;
        $this->data = $data;
        $this->cod_postagem = $cod_postagem;
    }

    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }


    public function getTexto(){
        return $this->texto;
    }
    public function setTexto($texto){
        $this->texto = $texto;
    }


    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }


    public function getData(){
        return $this->data;
    }
    public function setData($data){
        $this->data = $data;
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

}