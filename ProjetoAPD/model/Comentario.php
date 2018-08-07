<?php

class Comentario
{
    private $texto_comentario;
    private $dt_comentario;
    private $postagem_cod_postagem;
    private $usuario_cod_usuario;
    private $cod_comentario;

    public function __construct($texto_comentario=null, $postagem_cod_postagem=null, $usuario_cod_usuario=null, $dt_comentario=null, $cod_comentario=null){
        $this->texto_comentario = $texto_comentario;
        $this->dt_comentario = $dt_comentario;
        $this->postagem_cod_postagem = $postagem_cod_postagem;
        $this->usuario_cod_usuario = $usuario_cod_usuario;
        $this->cod_comentario = $cod_comentario;
    }


    public function getTextoComentario(){
        return $this->texto_comentario;
    }
    public function setTextoComentario($texto_comentario): void{
        $this->texto_comentario = $texto_comentario;
    }


    public function getDtComentario(){
        return $this->dt_comentario;
    }
    public function setDtComentario($dt_comentario): void{
        $this->dt_comentario = $dt_comentario;
    }


    public function getPostagemCodPostagem(){
        return $this->postagem_cod_postagem;
    }
    public function setPostagemCodPostagem($postagem_cod_postagem): void{
        $this->postagem_cod_postagem = $postagem_cod_postagem;
    }


    public function getUsuarioCodUsuario(){
        return $this->usuario_cod_usuario;
    }
    public function setUsuarioCodUsuario($usuario_cod_usuario): void{
        $this->usuario_cod_usuario = $usuario_cod_usuario;
    }


    public function getCodComentario(){
        return $this->cod_comentario;
    }
    public function setCodComentario($cod_comentario): void
    {
        $this->cod_comentario = $cod_comentario;
    }

}