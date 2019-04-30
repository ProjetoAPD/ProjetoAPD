<?php include "base/cabecalho_login.php" ?>
<body>

  <div class="ui middle aligned center aligned grid">
    <div class="column">
      <h2 class="ui teal image header">
        <img src="assets/images/nome.png" class="image">
        <div class="content">
          Logue em sua conta
        </div>
      </h2>




      <form method="post" action="../../controller/acoesUsu.php?acao=login" class="ui large form">
        <div class="ui stacked segment">
          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="email" placeholder="Email">
            </div>
          </div>
          <div class="field">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input type="password" name="senha" placeholder="Senha">
            </div>
          </div>
            <button class="ui fluid large teal submit button" type="submit">Login</button>
            <?php if (isset($_GET['erro']) and $_GET['erro'] == 1){ ?>

                <h4 style="color: red">Erro ao validar os dados, tente novamente</h4>

            <?php } ?>
        </div>
      </form>
      
      <div class="ui message">
        Não cadastrado? <a href="cadastro.php">Cadastre-se</a>
      </div>
      <hr>
      <div class="ui message"><a href="index.php">Voltar a página inicial</a> </div>
    </div>
  </div>
</body>
</html>