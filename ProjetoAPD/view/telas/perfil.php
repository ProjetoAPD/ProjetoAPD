<?php include "base/cabecalho_generico.php"; ?>
        
  </div>  
    <!-- corpo do formulario -->
		<div class="ui middle aligned center aligned grid" id="corpo_formulario">
		  <div class="column" style="width: 30em">
				 <div class="ui stacked segment">
					<div class="column">
						<div class="field">

						<div class="ui segment" id="ui_segment_perfil">
						  <i class="user icon">Email</i>
						  <h2 id="texto_email"><?= $user->getEmail() ?></h2>
						</div>

						<div class="ui segment" id="ui_segment_perfil">
							<i class="user outline icon">Usuario</i>
							<h2 id="texto_usuario"><?= $user->getNome() ?></h2>
						</div>

            <div class="ui segment" id="ui_segment_perfil">
							<i class="user outline icon">Tipo_usuario</i>
							<h2 id="texto_usuario"> 
                <?php 
                  if ($user->getCodTipoUsuario() == 2){
							         echo "Psicólogo";
							    }
							    elseif($user->getCodTipoUsuario() == 3){
							        echo "Comum";
                  }
                  elseif($user->getCodTipoUsuario() == 1){
                      echo "Administrador";
                  } ?>    
              </h2>
						</div>

              <br>
							<div class="ui center aligned two column grid" id="botoes">
								<div class="">
                  <a href="alteradados.php">
  									<button class="ui green icon button">
  										<h4>Alterar Dados
  											<i class="icon settings"></i>
  										</h4>
  									</button>
                  </a>

									<a href="../../controller/acoesUsu.php?acao=excluir&id=<?= $_SESSION['cod_usuario'] ?>">
									   <button class="ui red icon button" >
                        <h4>Excluir Conta
                          <i class="icon settings"></i>
                        </h4>
									   </button>
									</a>

								</div>
							</div>
						</div>
					</div>
				  </div>
				</div>
			</div>
	  </div>
	</div>
</div>


</body>

</html>








<!-- ______________________________________ 


<style>          
    @media only screen and (max-width: 700px) {
      .ui.fixed.menu {
        display: none !important;
      }
      .secondary.pointing.menu .item,
      .secondary.pointing.menu .menu {
        display: none;
      }
      .secondary.pointing.menu .toc.item {
        display: block;
      }
      .masthead.segment {
        min-height: 350px;
          
      }
      .masthead h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .masthead h2 {
        margin-top: 0.5em;
        font-size: 1.5em;
      }
    }

 </style>

-->





