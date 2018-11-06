<?php
if (!isset($_SESSION['cod_usuario'])) {
    session_start();
} 
require_once("../../model/Usuario.php");
require_once("../../model/CrudUsuario.php");
require_once("../../model/CrudMensagem.php");
require_once("../../model/CrudDenuncias.php");
$id_usuario2 = $_GET['usuario2'];
function mensagens($id_usuario2){

    if (isset($id_usuario2)){
        $usuario1 = $_SESSION['cod_usuario'];
        $usuario2 = $id_usuario2;

        $c1 = new CrudMensagem();
        $mensagens = $c1->getMensagens($usuario1, $usuario2);

        $c2 = new CrudUsuario();
        $usuarioConversa = $c2->getUsuario($usuario2);
        $msg = "<div class=\"ui horizontal divider\" id=\"chatscroll\">
            <p id=\"nome\" class=\"middle aligned\"> ".$usuarioConversa->getNome()."
            </p>
    
        </div>
        <hr>";
        foreach ($mensagens as $mensagem):
            if ($mensagem['cod_usuario1'] == $usuario1){

                $msg.="<p id='enviada'>
                        $mensagem[texto]
                        </p>";
             }else{

                $msg.="
                <p id=\"recebida\">
                    $mensagem[texto]
                    <a href=\"../../controller/acoesChat.php?acao=denuncia&cod_mensagem=$mensagem[cod_mensagem]&cod_usuario=$usuario2 \"><button class=\"negative mini circular ui icon button\">
                            <i class=\"exclamation small triangle icon\"></i>
                     </button></a>
                </p>";
            }

        endforeach;
    }
    return $msg;
}

    $msg2 = mensagens($id_usuario2);
    echo $msg2;
?>

