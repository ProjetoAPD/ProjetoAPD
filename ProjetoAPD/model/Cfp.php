<?php

class Cfp
{
    private $registro;
    private $nome_psicologo;
    private $cpf;

    public function __construct($registro=null, $nome_psicologo=null, $cpf=null){
        $this->registro = $registro;
        $this->nome_psicologo = $nome_psicologo;
        $this->cpf = $cpf;
    }

    public function getRegistro(){
        return $this->registro;
    }
    public function setRegistro($registro){
        $this->registro = $registro;
    }

    public function getNomePsicologo(){
        return $this->nome_psicologo;
    }
    public function setNomePsicologo($nome_psicologo){
        $this->nome_psicologo = $nome_psicologo;
    }

    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
}