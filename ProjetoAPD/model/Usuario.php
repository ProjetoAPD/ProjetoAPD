<?php

class Usuario
{
    private $nome;
    private $email;
    private $senha;
    private $cod_usuario;
    private $cod_tipo_usuario;

    public function __construct($nome=null, $email=null, $senha=null, $cod_tipo_usuario=null, $cod_usuario=null){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->cod_usuario = $cod_usuario;
        $this->cod_tipo_usuario = $cod_tipo_usuario;
    }


    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }


    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }


    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }


    public function getCodUsuario(){
        return $this->cod_usuario;
    }
    public function setCodUsuario($cod_usuario){
        $this->cod_usuario = $cod_usuario;
    }


    public function getCodTipoUsuario(){
        return $this->cod_tipo_usuario;
    }
    public function setCodTipoUsuario($cod_tipo_usuario){
        $this->cod_usuario = $cod_tipo_usuario;
    }

}