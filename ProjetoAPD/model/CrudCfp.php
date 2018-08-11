<?php

require_once("Cfp.php");
require_once("DBConnection.php");

class CrudCfp{

    private $conexao;

    public function __construct()
    {
        $this->conexao = DBConnection::getConexao();
    }

    public function verificaCfp(Cfp $cfp)
    {
        $sql = $this->conexao->prepare("SELECT * FROM cfp WHERE registro = '{$cfp->getRegistro()}' AND cpf = '{$cfp->getCpf()}'");
        $sql->execute();
        $count = $sql->rowCount();

        try {
            if ($count == 1) {
                return true;
            } else {
                header('location: ../view/telas/cadastro.php?erro=2');
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}