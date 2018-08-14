<?php

require_once("Usuario.php");
require_once("DBConnection.php");

class CrudUsuario
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = DBConnection::getConexao();
    }

    public function getUsuarios(){

        $sql = "SELECT * FROM usuario";


        $resultado = $this->conexao->query($sql);
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($usuarios as $usuario) {
            $cod = $usuario['cod_usuario'];
            $nome = $usuario['nome'];
            $email = $usuario['email'];
            $senha = $usuario['senha'];
            $tipo_usuario = $usuario['cod_tipo_usuario'];
            $obj = new Usuario( $nome, $email, $senha, $tipo_usuario, $cod);
            $listaUsuarios[] = $obj;
        }
        return $listaUsuarios;
    }

    public function getPsicologos(){

        $sql = "SELECT * FROM usuario WHERE cod_tipo_usuario = 2";


        $resultado = $this->conexao->query($sql);
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($usuarios as $usuario) {
            $cod = $usuario['cod_usuario'];
            $nome = $usuario['nome'];
            $email = $usuario['email'];
            $senha = $usuario['senha'];
            $tipo_usuario = $usuario['cod_tipo_usuario'];
            $obj = new Usuario( $nome, $email, $senha, $tipo_usuario, $cod);
            $listaUsuarios[] = $obj;
        }
        return $listaUsuarios;
    }

    public function getUsuario(int $cod_usuario)
    {

        $sql = 'select * from usuario where cod_usuario=' . $cod_usuario;
        $resultado = $this->conexao->query($sql);

        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);

        $objusu = new Usuario($usuario['nome'], $usuario['email'], $usuario['senha'], $usuario['cod_tipo_usuario'], $usuario['cod_usuario']);

        return $objusu;
    }

    public function insertUsuario(Usuario $usu)
    {

        $sql = "INSERT INTO usuario (nome, email, senha, cod_tipo_usuario) VALUES ('" . $usu->getNome() . "','" . $usu->getEmail() . "','" . $usu->getSenha() . "','" . $usu->getCodTipoUsuario() . "')";

        try {
            $this->conexao->exec($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateUsuario(Usuario $usu)
    {


        $userOld = $this->getUsuario($usu->getCodUsuario());

        $sql = "UPDATE usuario SET cod_usuario = '{$userOld->getCodUsuario()}', cod_tipo_usuario = '{$userOld->getCodTipoUsuario()}', nome = '{$usu->getNome()}', email = '{$userOld->getEmail()}' , senha = '{$usu->getSenha()}' WHERE cod_usuario ='{$usu->getCodUsuario()}'";

        try {
            $this->conexao->exec($sql);
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function deleteUsuario(int $codigo){


        $sql = "DELETE FROM usuario WHERE cod_usuario=" . $codigo;
        try {
            $this->conexao->exec($sql);
        } catch (PDOException $e) {
            return $e;
        }

    }

    public function loginUsuario(Usuario $user)
    {
        $sql = $this->conexao->prepare("SELECT * FROM usuario WHERE email = '{$user->getEmail()}' AND senha = '{$user->getSenha()}'");
        $sql->execute();
        $count = $sql->rowCount();

        $usu = $sql->fetch(PDO::FETCH_ASSOC);

        try {
            if ($count == 1) {
                session_start();

                $_SESSION['logado'] = 'sim';

                $_SESSION['usuario'] = $usu['nome'];
                $_SESSION['email'] = $usu['email'];
                $_SESSION['senha'] = $usu['senha'];
                $_SESSION['cod_tipo_usuario'] = $usu['cod_tipo_usuario'];
                $_SESSION['cod_usuario'] = $usu['cod_usuario'];


            } else {
                header('location: ../view/telas/login.php?erro=1');
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

