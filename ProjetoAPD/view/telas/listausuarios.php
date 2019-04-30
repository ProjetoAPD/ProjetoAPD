<?php include "base/cabecalho_generico.php"; ?>

            <div class="ui comments">
                <table class="ui selectable unstackable table">
                    <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Tipo usuario</th>
                        <th class="right aligned">#</th>
                    </tr>
                    </thead>

                    <tr>
                        <?php foreach($listaUsuarios as $usuario): ?>
                        <td><?= $usuario->getCodUsuario() ?></td>
                        <td><?= $usuario->getNome() ?></td>
                        <td><?= $usuario->getEmail() ?></td>
                        <td>
                            <?php if ($usuario->getCodTipoUsuario() == 2){
                                echo "Psicólogo";
                            }
                            elseif($usuario->getCodTipoUsuario() == 3){
                                echo "Comum";
                            }
                            elseif($usuario->getCodTipoUsuario() == 1){
                                echo "Administrador";
                            }
                            ?>
                        </td>

                        <td class="right aligned"><a href="../../controller/acoesUsu.php?acao=delete&cod_usuario=<?= $usuario->getCodUsuario() ?>">Excluir</a></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>