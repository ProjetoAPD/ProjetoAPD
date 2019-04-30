<?php include "base/cabecalho_index.php"; ?>

        <div class="ui text container">
            <h1 class="ui inverted header">
                ProjetoAPD
            </h1>
            <h2>Ajuda psicológica online e gratuita!</h2>
        </div>
    </div>

    <div class="center aligned row">
        <br>
        <?php if (!isset($_SESSION['logado'])) { ?>
            
            <div id="aviso_nao_logado">
                <h1>Faça login ou cadastre-se para participar do nosso chat!</h1>
            </div>

        <?php } else { ?>

            <a href="chat.php">
                <div class="ui massive basic violet buttons">
                    
                    <button class="ui button"><?php
                    if ($user->getCodTipoUsuario() != 2) {
                        echo "Fale com um psicólogo";
                    }else{
                        echo "Ajude usuários"; } ?>  
                    </button>

                </div>
            </a>
        <?php } ?>

        <div class="center aligned row">
            <h4 class="ui horizontal divider">
                <i class="arrow down icon"></i>
                    Conheça nosso fórum
                <i class="arrow down icon"></i>
            </h4>
        </div>

        <div id="lforum">
            <div class="ui text container">
                <a href="forum.php">
                    <div class="ui segment">
                        <h3 class="ui header">
                            <i class="users icon"></i>Fórum
                        </h3>
                        <p>Aqui poderá ver debates, publicações e problemas que já foram solucionados ou precisam de soluções. Veja e tente ajudar alguém ou procure alguém que já tenha o mesmo problema que o seu!</p>
                </a>
            </div>
        </div>

        <br>
        <br>
        
    </div>
</div>

<?php include "base/rodape.php"; ?>