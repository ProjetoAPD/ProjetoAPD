<?php

require_once("Mensagem.php");
require_once("DBConnection.php");
require_once("CrudUsuario.php");

class CrudMensagem
{
    private $conexao;
    public function __construct(){
        $this->conexao = DBConnection::getConexao();
    }

    public function insertMensagem(Mensagem $m){

        $sql = "INSERT INTO conversa (cod_usuario1, cod_usuario2, texto) VALUES ('{$m->getCodUsuario1()}','{$m->getCodUsuario2()}','{$m->getTexto()}')";
        $this->conexao->exec($sql);
    }

    public function getMensagens($cod_usuario1, $cod_usuario2){

        $sql = "SELECT * FROM conversa where cod_usuario1 = '{$cod_usuario1}' and cod_usuario2 = '{$cod_usuario2}' OR cod_usuario1 = '{$cod_usuario2}' and cod_usuario2 = '{$cod_usuario1}'";
        $resultado = $this->conexao->query($sql);

        $conversa = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $conversa;
    }

    public function verificaConversa($cod_usuario1, $cod_usuario2){

        $sql = "SELECT texto FROM conversa WHERE cod_usuario1 = '{$cod_usuario1}' and cod_usuario2 = '{$cod_usuario2}' OR cod_usuario1 = '{$cod_usuario2}' and cod_usuario2 = '{$cod_usuario1}'";
        $resultado = $this->conexao->query($sql);

        $convesas = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $count = count($convesas);


        if ($count != 0){
            return true;
        }else{
            return false;
        }

    }

}